<?php

use Illuminate\Database\Seeder;
use App\Models\MenuTranslate;

class MenuTranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['id'=>1,'menu_id'=>1,'locale'=>'az','name'=>'Avtomobil Modelləri'],
            ['id'=>2,'menu_id'=>1,'locale'=>'en','name'=>'Avtomobil Modelləri'],
            ['id'=>3,'menu_id'=>1,'locale'=>'ru','name'=>'Avtomobil Modelləri'],

            ['id'=>4,'menu_id'=>2,'locale'=>'az','name'=>'Passat'],
            ['id'=>5,'menu_id'=>2,'locale'=>'en','name'=>'Passat'],
            ['id'=>6,'menu_id'=>2,'locale'=>'ru','name'=>'Passat'],

            ['id'=>7,'menu_id'=>3,'locale'=>'az','name'=>'Polo'],
            ['id'=>8,'menu_id'=>3,'locale'=>'en','name'=>'Polo'],
            ['id'=>9,'menu_id'=>3,'locale'=>'ru','name'=>'Polo'],

            ['id'=>10,'menu_id'=>4,'locale'=>'az','name'=>'Touareg'],
            ['id'=>11,'menu_id'=>4,'locale'=>'en','name'=>'Touareg'],
            ['id'=>12,'menu_id'=>4,'locale'=>'ru','name'=>'Touareg'],

            ['id'=>13,'menu_id'=>5,'locale'=>'az','name'=>'Servis xidmətləri'],
            ['id'=>14,'menu_id'=>5,'locale'=>'en','name'=>'Servis xidmətləri'],
            ['id'=>15,'menu_id'=>5,'locale'=>'ru','name'=>'Servis xidmətləri'],

            ['id'=>16,'menu_id'=>6,'locale'=>'az','name'=>'Test Drive'],
            ['id'=>17,'menu_id'=>6,'locale'=>'en','name'=>'Test Drive'],
            ['id'=>18,'menu_id'=>6,'locale'=>'ru','name'=>'Test Drive'],

            ['id'=>19,'menu_id'=>7,'locale'=>'az','name'=>'Xəbərlər'],
            ['id'=>20,'menu_id'=>7,'locale'=>'en','name'=>'Xəbərlər'],
            ['id'=>21,'menu_id'=>7,'locale'=>'ru','name'=>'Xəbərlər'],

            ['id'=>22,'menu_id'=>8,'locale'=>'az','name'=>'Showroom'],
            ['id'=>23,'menu_id'=>8,'locale'=>'en','name'=>'Showroom'],
            ['id'=>24,'menu_id'=>8,'locale'=>'ru','name'=>'Showroom'],
        ];

        foreach ($datas as $data)
        {
            MenuTranslate::updateOrCreate(['id'=>$data['id']],$data);
        }
    }
}
