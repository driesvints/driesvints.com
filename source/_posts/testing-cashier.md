---
extends: _layouts.post
section: content
title: Testing Cashier
date: 2020-04-04
---
One of the most asked questions I get about Cashier is how you start testing your billing integration of your app. So let's check out a couple of ways how you'd tackle that.

## Stripe API

The best way to test Cashier and your billing integration is to actually hit the Stripe API. Doing so will give you the confidence that your billing integration is actually working as expected. In fact, [we added a section to the docs yesterday](https://laravel.com/docs/7.x/billing#testing) that details just that.

To get started, add the **testing** version of your Stripe secret to your `phpunit.xml` file:

```xml
<env name="STRIPE_SECRET" value="sk_test_<your-key>"/>
```

Now, whenever you interact with Cashier while testing, it will send actual API requests to your Stripe testing environment. For convenience, you should pre-fill your Stripe testing account with subscriptions / plans that you may then use during testing.

Hitting the Stripe API will cause your tests to run slowly but usually you wouldn't be running these tests very often, maybe just right before you do a deploy. Therefor it's best to separate these tests into a separate directory in your test suite.

In order to test different kind of scenarios in your test suite you can make use of a vast range of [Stripe testing tokens](https://stripe.com/docs/testing).

If you want to look at an example of doing these kind of tests, have a look at [Cashier's own test suite](https://github.com/laravel/cashier/tree/10.0/tests/Integration).

### stripe-mock

Stripe is currently developing a library called ["stripe-mock"](https://github.com/stripe/stripe-mock) which will allow to mock these expensive HTTP calls when testing. Unfortunately the library currently is stateless and Cashier relies on persisted state in Stripe a lot. When this library eventually implements persistence, we'll update Cashier's own test suite and update these docs so you can make use of it.

## Hiding Behind An Interface

A second option is to hide Cashier calls behind an interface. In fact, in one app I took this approach and it worked very well. The apps's tests ran very fast. Let's see how we'd tackle this.

We'll start off by defining an interface for our subscriptions:

```php
<?php

namespace App\Billing\Subscriptions;

use App\User;
use Laravel\Cashier\Subscription;

interface SubscriptionRepository
{
    public function subscribe(User $customer, string $plan, string $paymentMethod): Subscription;
}
```

Then implement the actual Stripe calls which we'll use in our app:

```php
<?php

namespace App\Billing\Subscriptions;

use App\User;
use Laravel\Cashier\Subscription;

final class StripeSubscriptionRepository implements SubscriptionRepository
{
    public function subscribe(User $customer, string $plan, string $paymentMethod): Subscription
    {
        return $customer->newSubscription('main', $plan)->create($paymentMethod);
    }
}
```

And the `TestSubscriptionRepository` which contains our testing implementation:

```php
<?php

namespace App\Billing\Subscriptions;

use App\User;
use Illuminate\Support\Str;
use Laravel\Cashier\Subscription;

final class TestingSubscriptionRepository implements SubscriptionRepository
{
    public function subscribe(User $customer, string $plan, string $paymentMethod): Subscription
    {
        return $customer->subscriptions()->create([
            'name' => 'main',
            'stripe_id' => Str::random(),
            'stripe_status' => 'active',
            'stripe_plan' => $plan,
            'quantity' => 1,
        ]);
    }
}
```

After this you can register the implementations in the `register` method of your `AppServiceProvider`:

```php
$this->app->singleton(SubscriptionRepository::class, function ($app) {
    if ($app->environment('testing')) {
        return new TestingSubscriptionRepository;
    }

    return new StripeSubscriptionRepository;
});
```

And now your Stripe calls will be replaced during your tests and they'll run much faster.

There are a couple of downsides to this approach. First of all, you're trading part of the confidence you get when actually hitting the Stripe API. The other downside is that you'll have to partially re-implement Cashier's behavior. And depending on how much functionality you use from Cashier that could potentially be a lot. Of course you'd only replace the parts which make Stripe calls. 

### Mocking

The third one is an obvious one when unit testing. You could use a library like [Mockery](https://github.com/mockery/mockery) to mock those expensive API calls. Let's see how that works.

Imagine we have the following job:

```php
<?php

namespace App\Jobs;

use App\User;

final class SubscribeCustomer
{
    private User $customer;

    private string $plan;

    private string $paymentMethod;

    public function __construct(User $customer, string $plan, string $paymentMethod)
    {
        $this->customer = $customer;
        $this->plan = $plan;
        $this->paymentMethod = $paymentMethod;
    }

    public function handle(): void
    {
        $this->customer->newSubscription('main', $this->plan)
            ->create($this->paymentMethod);
    }
}

```

We could write the following test where we mock the actual Cashier calls:

```php
<?php

namespace Tests\Unit\Jobs;

use App\User;
use App\Jobs\SubscribeCustomer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Cashier\SubscriptionBuilder;
use Mockery;
use PHPUnit\Framework\TestCase;

class SubscribeCustomerTest extends TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();

        Mockery::close();
    }

    /** @test */
    public function it_can_process_a_new_subscription()
    {
        $subscriptionBuilder = Mockery::mock(SubscriptionBuilder::class);
        $subscriptionBuilder->shouldReceive('create')
            ->with('foo-method');

        $customer = Mockery::mock(User::class);
        $customer->expects('newSubscription')
            ->with('main', 'plan-1')
            ->andReturn($subscriptionBuilder);

        (new SubscribeCustomer($customer, 'plan-1', 'foo-method'))->handle();
    }
}
```

And thus no Stripe API calls are made. Of course this only mocks the calls but doesn't re-implements the behavior like our interface example. The above technique is ideal for unit tests but not so much for feature tests.

### Conclusion

We've seen three different techniques when it comes to testing Cashier and while each one holds a benefit and a downside I'd still recommend to make actual Stripe HTTP calls if you want to be entirely sure your billing integration works as expected. If stripe-mock ever gets persistency we can solve the speed issue that way. But definitely don't be afraid to use the other two techniques. Use what works best for your situation.
