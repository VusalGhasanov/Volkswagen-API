<?php

use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
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
                'number_1'=>' *7788',
                'number_2'=>' (+99455) 555 77 88',
                'number_3'=>'+99455 336 7788',
                'email_1'=>'office@volkswagen.az',
                'email_2'=>'servis@volkswagen.az',
                'address'=>'Babək pr., 35A',
                'facebook'=>'https://www.facebook.com/VolkswagenAZ/',
                'instagram'=>'https://www.instagram.com/volkswagen_azerbaijan/',
                'youtube'=>'https://www.youtube.com/channel/UCjyly7HeTNVTF6VWwbhPMGA',
                'twitter'=>''
            ]
        ];
        foreach ($datas as $data)
        {
            Config::updateOrCreate(['id'=>$data['id']],$data);
        }
    }
}
