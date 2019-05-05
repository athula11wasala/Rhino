<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $objUser = new User();
        $objUser->password = Hash::make('123456');
        $objUser->email = "admin@gmail.com";
        $objUser->name = "admin";
        $objUser->user_level = 1;
        $objUser->save();
    }

}
