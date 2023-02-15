<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;

 
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        role::create(['name' => 'Developer',
                'description' => '...']);

        role::create(['name' => 'Admin',
                'description' => 'Company Owner']);  

        role::create(['name' => 'Customer',
                'description' => 'Buyer']);
    }
}
