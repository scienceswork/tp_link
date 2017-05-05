<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// 填充数据
    	$datas = [
    		["create-keyword", "添加关键字", "管理员添加关键字"],
    		["edit-keyword", "修改关键字", "管理员修改关键字"],
    		["del-keyword", "删除关键字", "管理员删除关键字"],
    		["edit-user", "修改用户", "管理员修改用户"],
    		["del-user", "删除用户", "管理员删除用户"],
    	];
    	// 使用foreach遍历填充数据
    	foreach ($datas as $data) {
    		$permission = new Permission();
    		$permission->name = $data[0];
    		$permission->display_name = $data[1];
    		$permission->description = $data[2];
    		$permission->save();
    	}
    }
}
