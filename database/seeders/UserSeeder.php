<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
                    [
                        'name'      => 'admin',
                        'email'     => 'admin@concert.com',
                        'password'  => \bcrypt('secret')
                    ],
                    [
                        'name'      => 'checker',
                        'email'     => 'checker@concert.com',
                        'password'  => \bcrypt('secret')
                    ],
                ];

        $count = 0;
        foreach($user as $u){
            $us = User::Create($u);
            if($count == 0){
                $role = Role::find(1);
                $us->roles()->attach($role);
            }
            if($count == 1){
                $role = Role::find(2);
                $us->roles()->attach($role);
            }

            $count++;
        }
    }
}
