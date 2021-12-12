<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        User::factory()->count(30)->make()->each(function ($user) {
            $user->save();
            $user->profile()->save(Profile::factory()->make());
        });
    }
}
