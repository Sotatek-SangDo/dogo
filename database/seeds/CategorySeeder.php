<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_products')->truncate();
        $data = [
            [
                'code_id' => 'tu_go',
                'name'    => 'Tủ gỗ'
            ],
            [
                'code_id' => 'ban_ghe',
                'name'    => 'Bàn ghế'
            ]
        ];
        DB::table('category_products')->insert($data);
    }
}
