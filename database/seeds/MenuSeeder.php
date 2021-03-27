<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['id'=>1,'parent_id'=>0,'order'=>1,'page_id'=>0],
            ['id'=>2, 'parent_id'=>1, 'order'=>1],
            ['id'=>3, 'parent_id'=>1,'order'=>2],
            ['id'=>4, 'parent_id'=>1,'order'=>3],
            ['id'=>5, 'parent_id'=>0,'order'=>5,'link'=>'/service','active'=>1],
            ['id'=>6, 'parent_id'=>0,'order'=>6,'link'=>'/forms/test-drive','active'=>1],
            ['id'=>7, 'parent_id'=>0,'order'=>7,'link'=>'/news','active'=>1],
            ['id'=>8, 'parent_id'=>0,'order'=>8,'link'=>'/showroom','active'=>1],
        ];

        foreach ($datas as $data)
        {
            Menu::updateOrCreate(['id'=>$data['id']],$data);
        }
    }
}
