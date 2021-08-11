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
        $user1 = User::create([
            'name' => 'Tài',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt(12345678)
        ]);
        $user2 = User::create([
            'name' =>'Anh',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt(12345678)
        ]);
    }
}
