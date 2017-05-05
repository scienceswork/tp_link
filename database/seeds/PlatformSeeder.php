<?php

use Illuminate\Database\Seeder;
use App\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 加载虚拟数据
        $filePath = 'storage/imports/platform.xlsx';
        Excel::load($filePath, function ($reader) {
            // 读取数据，并且转换为数组，数据格式为一列
            $data = $reader->all()->toArray();
            // 遍历数组
            foreach ($data as $k => $v) {
                $platform = new Platform();
                $platform->name = $v['name'];
                $platform->url = $v['url'];
                $platform->save();
            }
        });
    }
}
