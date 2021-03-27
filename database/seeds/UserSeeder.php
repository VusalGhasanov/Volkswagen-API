<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
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
               'name'=>'Admin',
               'email'=>'admin@admin.az',
               'password'=>Hash::make('123'),
               'created_at'=>Carbon::now(),
           ]
        ];

        foreach ($datas as $data)
        {
            User::updateOrCreate(['id'=>$data['id']],$data);
        }
    }
}
