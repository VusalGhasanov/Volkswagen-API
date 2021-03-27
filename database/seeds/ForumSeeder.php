<?php

use Illuminate\Database\Seeder;
use App\Models\Forum;
use App\Models\Suggest;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i=0;$i<5;$i++)
        {
            Forum::create([
               'name'=>$faker->name(),
               'surname'=>$faker->firstName(),
               'phone'=>$faker->phoneNumber,
               'email'=>$faker->email,
               'message'=>$faker->text,
               'status'=>'unread',
                'created_at'=>\Carbon\Carbon::now()
            ]);
            Suggest::create([
                'name'=>$faker->name(),
                'surname'=>$faker->firstName(),
                'phone'=>$faker->phoneNumber,
                'email'=>$faker->email,
                'message'=>$faker->text,
                'status'=>'unread',
                'created_at'=>\Carbon\Carbon::now()
            ]);
        }
    }
}
