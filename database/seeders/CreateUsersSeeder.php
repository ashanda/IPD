<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

  
class CreateUsersSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run(): void

    {

        $users = [

            [

               'fname'=>'Admin User',
               'lname'=>'User',
               'email'=>'admin@ipd.com',
               'contact_number' =>'0772597766',
               'type'=>1,
               'password'=> bcrypt('IPD$5577a'),
            ],

            [

               'fname'=>'Instructor',
               'lname'=>'User',
               'email'=>'instructor@instructor.com',
               'contact_number' =>'1234567890',
               'type'=> 2,
               'password'=> bcrypt('123456'),

            ],

            [

               'fname'=>'Student',
               'lname'=>'User',
               'email'=>'user@user.com',
               'contact_number' =>'0712440342',
               'type'=>0,
               'password'=> bcrypt('123456'),

            ],

        ];

    

        foreach ($users as $key => $user) {

            User::create($user);

        }

    }

}