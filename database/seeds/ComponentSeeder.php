<?php

use Illuminate\Database\Seeder;
use App\Models\Component;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['id'=>1,'name'=>'Header'],
            ['id'=>2,'name'=>'Teaser'],
            ['id'=>3,'name'=>'Subscribe'],
            ['id'=>4,'name'=>'Heading'],
            ['id'=>5,'name'=>'3Video'],
            ['id'=>6,'name'=>'2Video'],
            ['id'=>7,'name'=>'1Video'],
            ['id'=>8,'name'=>'2ColumnText'],
            ['id'=>9,'name'=>'ImageText'],
            ['id'=>10,'name'=>'Accordion'],
            ['id'=>11,'name'=>'GallerySpace'],
            ['id'=>12,'name'=>'GalleryAdjacent'],
            ['id'=>13,'name'=>'PhotoIconText'],
            ['id'=>14,'name'=>'3Card'],
            ['id'=>15,'name'=>'2Card'],
        ];
        foreach ($datas as $data)
        {
            Component::updateOrCreate(['id'=>$data['id']],$data);
        }
    }
}
