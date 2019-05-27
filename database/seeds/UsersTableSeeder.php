<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->states('senior')->create();
        factory(User::class, 1)->states('junior')->create();
        factory(User::class, 1)->states('user')->create();
        factory(User::class, 25)->create();
    }
}
