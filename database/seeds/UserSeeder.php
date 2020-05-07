<?php

declare(strict_types=1);

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create(['email' => 'dries@vints.io']);
    }
}
