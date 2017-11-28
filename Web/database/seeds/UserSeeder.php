<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
          'first_name' => 'Johnny',
          'last_name' => 'Smith',
          'email' => 'johnny.smith@jobr.com',
          'password' => '123'
        ]);

        User::create([
          'first_name' => 'Franky',
          'last_name' => 'Somethinger',
          'email' => 'franky.somethinger@jobr.com',
          'password' => '123'
        ]);

        User::create([
          'first_name' => 'Sofia',
          'last_name' => 'Cox',
          'email' => 'sofia.cox@jobr.com',
          'password' => '123'
        ]);
    }
}
