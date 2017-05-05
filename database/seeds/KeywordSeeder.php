<?php

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Keyword;

class KeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 加载虚拟数据
        $filePath = 'storage/imports/keyword.xlsx';
        Excel::load($filePath, function ($reader) {
            // 读取数据，并且转换为数组，数据格式为一列
            $data = $reader->all()->toArray();
            // 遍历数组
            foreach ($data as $k => $v) {
                $keyword = new Keyword();
                $keyword->value = current($v);
                $keyword->save();
            }
        });
    }
}
