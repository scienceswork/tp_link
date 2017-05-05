<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*导入权限*/
        $this->call(PermissionSeeder::class);
        /*导入角色*/
        $this->call(RoleSeeder::class);
        /*模拟用户*/
        $this->call(UserSeeder::class);
        /*关键字*/
        $this->call(KeywordSeeder::class);
        /*平台*/
        $this->call(PlatformSeeder::class);
    }
}
