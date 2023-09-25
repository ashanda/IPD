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


        ];

    

        foreach ($users as $key => $user) {

            User::create($user);

        }

    }

}