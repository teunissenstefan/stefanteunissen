<?php

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
        $admin = new \App\User();
        $admin->name = "Admin";
        $admin->email = "admin@admin.admin";
        $admin->password = \Illuminate\Support\Facades\Hash::make('admin');
        $admin->save();
    }
}
