title: Decoupling Repository Objects
slug: decoupling-repository-objects
status: published
date: July 29 2014 22:45
tags: php, laravel, doctrine
-------
So the thing that got me to write this post was [this tweet from Jeffrey Way](https://twitter.com/jeffrey_way/status/494207192250466304) where he asked if you'd pass an object directly to a repository function or an id. Responses were mixed with more leaning towards the former rather than the latter.

In my opinion you should always at least give the option to pass along the id and optionally the object if you really need it in that context. Let's take a look at a practical example.

First, let's take a look at our directory structure:

~~~
- Acme/
    - Users/
        - Doctrine/
            - User.php
            - DoctrineUserRepository.php
        - Eloquent/
            - User.php
            - EloquentUserRepository.php
        - UserRepository.php
~~~

Say I have a `UserRepository` interface (I never suffix my interfaces. They should be as readable as possible imo) with the following functions:

~~~php
<?php
namespace Acme\Users;

use Acme\Users\Eloquent\User;

interface UserRepository
{
    public function get($id);
    public function delete(User $user);
}
~~~

And we have an `EloquentUserRepository` implementation:

~~~php
<?php
namespace Acme\Users\Eloquent;

use Acme\Users\UserRepository;

class EloquentUserRepository implements UserRepository
{
    /**
     * Find a user
     *
     * @param int $id
     * @return \Acme\Users\Eloquent\User|null
     */
    public function get($id)
    {
        return User::find($id);
    }

    /**
     * Delete a user
     *
     * @param \Acme\Users\Eloquent\User $user
     */
    public function delete(User $user)
    {
        $user->delete();
    }
}
~~~

And of course we have our Eloquent model (I'm gonna keep this short for the sake of it):

~~~php
<?php
namespace Acme\Users\Eloquent;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    ...
}
~~~

The interface declares a clear contract for the repository so now we can do:

~~~php
<?php

$user = $userRepository->get(1);
$userRepository->delete($user);
~~~

But then, after a while, you start to feel that Eloquent isn't the best thing suited for your needs and want to switch to something else like Doctrine. Well tough luck, son. Since we hardcoded the type-hint for the Eloquent model in our interface we're stuck with Eloquent no matter what.

How do we fix that? By removing the type-hint of course:

~~~php
<?php
namespace Acme\Users;

interface UserRepository
{
    public function get($id);
    public function delete($user);
}
~~~

Now that we've removed the type-hint we can accept any sort of object through out `delete` method. Since we removed the type-hint from our `UserRepository` interface, our contract changed and we should remove it from our `EloquentUserRepository` as well.


~~~php
<?php
namespace Acme\Users\Eloquent;

use Acme\Users\UserRepository;

class EloquentUserRepository implements UserRepository
{
    ...

    /**
     * Delete a user
     *
     * @param \Acme\Users\Eloquent\User $user
     */
    public function delete($user)
    {
        $user->delete();
    }
}
~~~

See how we removed the type-hint to make sure we adhere our contract set in our `UserRepository`? Now that we removed the type-hint from our interface we can easily create a `DoctrineUserRepository` and still conform to our contract but instead work with Doctrine Entities rather than Eloquent Models. Let's create our Doctrine repo and our user entity:

~~~php
<?php
namespace Acme\Users\Doctrine;

use Acme\Users\UserRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    /**
     * Find a user
     *
     * @param int $id
     * @return \Acme\Users\Doctrine\User|null
     */
    public function get($id)
    {
        return $this->find($id);
    }

    /**
     * Delete a user
     *
     * @param \Acme\Users\Doctrine\User $user
     */
    public function delete($user)
    {
        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush($user);
    }
}
~~~

And now our entity (again, I'm not going to write all of the object's body):

~~~php
<?php
namespace Acme\Users\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Acme\Users\Doctrine\DoctrineProductRepository")
 * @ORM\Table(name="users")
 */
class User
{
    ...
}
~~~

We've now set up our Doctrine repository and our User entity to work happily side by side and adhering the `UserRepository` contract.

So the first thing that we learn out of all this above is:

> Never type-hint for a specific object in your interfaces or repository methods

Because it'll tightly couple our objects to our repositories.

Now onwards to the next issue. Up till now we've always passed along our object directly to our delete method. This means we always need to have an object ready outside of our repositories before we can work with it. This is bad. What if we only had the object's id? We'd first have to fetch the object from our repository before we could pass it along to our `delete` function. Why let the developer do all of that work while we can solve it one time in our repositories? We should be able to pass along just that id and let our repositories do the work for us.

First, let's rework our contract. Because we want to use id's as well I'm going to rename our variable which we pass along to our `delete` function to `$id`. I prefer `$id` because i'd like to keep things concise in my interface's methods and I believe that accepting an id should take priority over accepting a user object (hence, the point I'm trying to make with this blog post). I'm going to change the variable naming from `$user` to `$id` now.

~~~php
<?php
namespace Acme\Users;

use Acme\Users\Eloquent\User;

interface UserRepository
{
    public function get($id);
    public function delete($id);
}
~~~

Now that we've changed our contract again, let's rework our repositories' `delete` functions:

~~~php
<?php
namespace Acme\Users\Eloquent;

use Acme\Users\UserRepository;

class EloquentUserRepository implements UserRepository
{
    ...

    /**
     * Delete a user
     *
     * @param \Acme\Users\Eloquent\User|int $id
     */
    public function delete($id)
    {
        $user = $id instanceof User ? $id : $this->get($id);

        $user->delete();
    }
}
~~~

~~~php
<?php
namespace Acme\Users\Doctrine;

use Acme\Users\UserRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    ...

    /**
     * Delete a user
     *
     * @param \Acme\Users\Doctrine\User|int $id
     */
    public function delete($id)
    {
        $user = $id instanceof User ? $id : $this->get($id);

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush($user);
    }
}
~~~

You see what we did here? We've now made it a lot easier for us to use our delete function. We now no longer have to retrieve our object from outside our repository before we can work with it. If we, say, get the id from an url we can immediately pass it along to our delete function and our repository will do the rest.

We've now learned to:

> Always allow to pass both an id and object to your repository functions

Now before we finish, one quick thing: the above example of the `delete` function is just a small example to demonstrate why it's important to accept both an id and object. It's not that because we're not doing a lot with our object in our delete function that we wouldn't do so in other repository specific methods. What I'd really do in real life for the delete method is just delete the object immediately instead of retrieving it first.

For example, in the `EloquentUserRepository` I'd do this:

~~~php
<?php
namespace Acme\Users\Eloquent;

use Acme\Users\UserRepository;

class EloquentUserRepository implements UserRepository
{
    ...

    /**
     * Delete a user
     *
     * @param \Acme\Users\Eloquent\User|int $id
     */
    public function delete($id)
    {
        if ($id instanceof User) {
            $user->delete();
        } else {
            User::destroy($id);
        }
    }
}
~~~

This way we don't need to retrieve the user object again if we only passed an id.

Anyway, I hope this helped you to understand my point of view a little bit better. If you have any questions or remarks then please post them in the comments :-)

PS.: We now get an Entity or Model back depending on which repository implementation we're using. That's not good. Our codebase shouldn't be aware of that because it tightly couples our code to one of the implementations. In the next post in this series I'll show you how we can solve that.
