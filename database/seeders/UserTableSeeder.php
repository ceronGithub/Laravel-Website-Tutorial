<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
            'name' => 'Super-Admin',
            'email' => 'superadmin@test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1,
            'remember_token' => Str::random(10), 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //php artisan db:seed --class=UserTableSeeder
    }
}
