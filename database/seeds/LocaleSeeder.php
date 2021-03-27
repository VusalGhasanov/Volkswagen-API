<?php

use Illuminate\Database\Seeder;
use App\Models\Locale;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'id'=>1,
                'code'=>'az'
            ],
            [
                'id'=>2,
                'code'=>'en'
            ],
            [
                'id'=>3,
                'code'=>'ru'
            ]
        ];
        foreach ($datas as $data)
        {
            Locale::updateOrCreate(['id'=>$data['id']],$data);
        }
    }
}
