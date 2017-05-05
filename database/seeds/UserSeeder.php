<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 查找管理员
        $admin = Role::where('name', 'admin')->first();
        // 创建管理员
        $user = new User();
        $user->name = '串猪神';
        $user->email = 'chuanzhushen@163.com';
        $user->password = bcrypt('zuowoziji123');
        $user->save();

        $user->attachRole($admin);

        // 创建普通会员
        $user = new User();
        $user->name = 'test';
        $user->email = 'test@163.com';
        $user->password = bcrypt('zuowoziji123');
        $user->save();
    }
}
