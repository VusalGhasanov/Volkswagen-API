<?php

use Illuminate\Database\Seeder;
use App\Models\ComponentDetail;

class ComponentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['id'=>4,'component_id'=>1,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>5,'component_id'=>1,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>6,'component_id'=>1,'field'=>'link','element'=>'input','type'=>'link'],
            ['id'=>7,'component_id'=>1,'field'=>'image','element'=>'input','type'=>'file'],

            ['id'=>8,'component_id'=>2,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>9,'component_id'=>2,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>10,'component_id'=>2,'field'=>'link','element'=>'input','type'=>'link'],
            ['id'=>11,'component_id'=>2,'field'=>'image','element'=>'input','type'=>'file'],
            ['id'=>12,'component_id'=>2,'field'=>'title2','element'=>'input','type'=>'text'],
            ['id'=>13,'component_id'=>2,'field'=>'description2','element'=>'textarea','type'=>'text'],
            ['id'=>14,'component_id'=>2,'field'=>'link2','element'=>'input','type'=>'link'],
            ['id'=>15,'component_id'=>2,'field'=>'image2','element'=>'input','type'=>'file'],

            ['id'=>20,'component_id'=>3,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>21,'component_id'=>3,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>22,'component_id'=>3,'field'=>'link','element'=>'input','type'=>'link'],

            ['id'=>23,'component_id'=>4,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>24,'component_id'=>4,'field'=>'description','element'=>'textarea','type'=>'text'],

            ['id'=>25,'component_id'=>5,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>26,'component_id'=>5,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>27,'component_id'=>5,'field'=>'video','element'=>'input','type'=>'file'],
            ['id'=>28,'component_id'=>5,'field'=>'title2','element'=>'input','type'=>'text'],
            ['id'=>29,'component_id'=>5,'field'=>'description2','element'=>'textarea','type'=>'text'],
            ['id'=>30,'component_id'=>5,'field'=>'video2','element'=>'input','type'=>'file'],
            ['id'=>31,'component_id'=>5,'field'=>'title3','element'=>'input','type'=>'text'],
            ['id'=>32,'component_id'=>5,'field'=>'description3','element'=>'textarea','type'=>'text'],
            ['id'=>33,'component_id'=>5,'field'=>'video3','element'=>'input','type'=>'file'],

            ['id'=>34,'component_id'=>6,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>35,'component_id'=>6,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>36,'component_id'=>6,'field'=>'video','element'=>'input','type'=>'file'],
            ['id'=>37,'component_id'=>6,'field'=>'title2','element'=>'input','type'=>'text'],
            ['id'=>38,'component_id'=>6,'field'=>'description2','element'=>'textarea','type'=>'text'],
            ['id'=>39,'component_id'=>6,'field'=>'video2','element'=>'input','type'=>'file'],

            ['id'=>40,'component_id'=>7,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>41,'component_id'=>7,'field'=>'description','element'=>'input','type'=>'text'],
            ['id'=>42,'component_id'=>7,'field'=>'video','element'=>'input','type'=>'file'],

            ['id'=>43,'component_id'=>8,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>44,'component_id'=>8,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>45,'component_id'=>8,'field'=>'description2','element'=>'textarea','type'=>'text'],

            ['id'=>46,'component_id'=>9,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>47,'component_id'=>9,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>48,'component_id'=>9,'field'=>'image','element'=>'input','type'=>'file'],
            ['id'=>49,'component_id'=>9,'field'=>'img_width','element'=>'input','type'=>'default'],
            ['id'=>50,'component_id'=>9,'field'=>'img_position','element'=>'input','type'=>'default'],

            ['id'=>51,'component_id'=>10,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>52,'component_id'=>10,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>53,'component_id'=>10,'field'=>'image','element'=>'input','type'=>'file'],
            ['id'=>54,'component_id'=>10,'field'=>'title2','element'=>'input','type'=>'text'],
            ['id'=>55,'component_id'=>10,'field'=>'description2','element'=>'textarea','type'=>'text'],
            ['id'=>56,'component_id'=>10,'field'=>'image2','element'=>'input','type'=>'file'],
            ['id'=>57,'component_id'=>10,'field'=>'title3','element'=>'input','type'=>'text'],
            ['id'=>58,'component_id'=>10,'field'=>'description3','element'=>'textarea','type'=>'text'],
            ['id'=>59,'component_id'=>10,'field'=>'image3','element'=>'input','type'=>'file'],
            ['id'=>60,'component_id'=>10,'field'=>'title4','element'=>'input','type'=>'text'],
            ['id'=>61,'component_id'=>10,'field'=>'description4','element'=>'textarea','type'=>'text'],
            ['id'=>62,'component_id'=>10,'field'=>'image4','element'=>'input','type'=>'file'],
            ['id'=>63,'component_id'=>10,'field'=>'title5','element'=>'input','type'=>'text'],
            ['id'=>64,'component_id'=>10,'field'=>'description5','element'=>'textarea','type'=>'text'],
            ['id'=>65,'component_id'=>10,'field'=>'image5','element'=>'input','type'=>'file'],

            ['id'=>82,'component_id'=>11,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>66,'component_id'=>11,'field'=>'image','element'=>'input','type'=>'file'],
            ['id'=>67,'component_id'=>11,'field'=>'image2','element'=>'input','type'=>'file'],
            ['id'=>68,'component_id'=>11,'field'=>'image3','element'=>'input','type'=>'file'],

            ['id'=>69,'component_id'=>12,'field'=>'image','element'=>'input','type'=>'file'],
            ['id'=>70,'component_id'=>12,'field'=>'image2','element'=>'input','type'=>'file'],
            ['id'=>71,'component_id'=>12,'field'=>'image3','element'=>'input','type'=>'file'],

            ['id'=>72,'component_id'=>13,'field'=>'icon','element'=>'input','type'=>'file'],
            ['id'=>73,'component_id'=>13,'field'=>'title','element'=>'input','type'=>'text'],
            ['id'=>74,'component_id'=>13,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>75,'component_id'=>13,'field'=>'icon2','element'=>'input','type'=>'file'],
            ['id'=>76,'component_id'=>13,'field'=>'title2','element'=>'input','type'=>'text'],
            ['id'=>77,'component_id'=>13,'field'=>'description2','element'=>'textarea','type'=>'text'],
            ['id'=>78,'component_id'=>13,'field'=>'icon3','element'=>'input','type'=>'file'],
            ['id'=>79,'component_id'=>13,'field'=>'title3','element'=>'input','type'=>'text'],
            ['id'=>80,'component_id'=>13,'field'=>'description3','element'=>'textarea','type'=>'text'],
            ['id'=>81,'component_id'=>13,'field'=>'image','element'=>'input','type'=>'file'],

            ['id'=>82,'component_id'=>14,'field'=>'image','element'=>'input','type'=>'file'],
            ['id'=>83,'component_id'=>14,'field'=>'link','element'=>'input','type'=>'text'],
            ['id'=>84,'component_id'=>14,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>85,'component_id'=>14,'field'=>'image2','element'=>'input','type'=>'file'],
            ['id'=>86,'component_id'=>14,'field'=>'link2','element'=>'input','type'=>'text'],
            ['id'=>87,'component_id'=>14,'field'=>'description2','element'=>'textarea','type'=>'text'],
            ['id'=>88,'component_id'=>14,'field'=>'image3','element'=>'input','type'=>'file'],
            ['id'=>89,'component_id'=>14,'field'=>'link3','element'=>'input','type'=>'text'],
            ['id'=>90,'component_id'=>14,'field'=>'description3','element'=>'textarea','type'=>'text'],

            ['id'=>91,'component_id'=>15,'field'=>'image','element'=>'input','type'=>'file'],
            ['id'=>93,'component_id'=>15,'field'=>'description','element'=>'textarea','type'=>'text'],
            ['id'=>94,'component_id'=>15,'field'=>'image2','element'=>'input','type'=>'file'],
            ['id'=>96,'component_id'=>15,'field'=>'description2','element'=>'textarea','type'=>'text'],
        ];

        foreach ($datas as $data)
        {
            ComponentDetail::updateOrCreate(['id'=>$data['id']],$data);
        }
    }
}
