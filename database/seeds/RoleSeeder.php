<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// 查找权限
    	$create_keyword = Permission::where('name', 'create-keyword')->first();
    	$edit_keywod = Permission::where('name', 'edit-keyword')->first();
    	$del_keyword = Permission::where('name', 'del-keyword')->first();
    	$edit_user = Permission::where('name', 'edit-user')->first();
    	$del_user = Permission::where('name', 'del-user')->first();
        // 管理员
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "管理员";
        $admin->description = "网站管理员";
        $admin->save();
        $admin->attachPermissions([$create_keyword, $edit_keywod, $del_keyword, $edit_user, $del_user]);
        // 会员
        $owner = new Role();
        $owner->name = "owner";
        $owner->display_name = "会员";
        $owner->description = "网站会员";
        $owner->save();
    }
}
