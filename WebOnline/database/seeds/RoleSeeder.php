<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::where('email','admin1gmail.com')->first();
        $user2 = User::where('email','admin2gmail.com')->first();
        $role1 = Role::create([
            'name' => 'Boss',
            'slug' => 'boss',
            'permission' => json_encode([
                'view-home' =>true
            ]),
        ]);
        $role2 = Role::create([
            'name' => 'NhanVien',
            'slug' => 'nhanvien',
            'permission' => json_encode([
                'update-post' =>true,
                
            ]),
        ]);
        $role1->users()->attach($user1);
        $role2->users()->attach($user2);
    }
}
