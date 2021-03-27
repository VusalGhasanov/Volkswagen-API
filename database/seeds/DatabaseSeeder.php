<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(LocaleSeeder::class);
         $this->call(MenuSeeder::class);
         $this->call(MenuTranslateSeeder::class);
         $this->call(ComponentSeeder::class);
         $this->call(ComponentDetailSeeder::class);
         $this->call(ConfigSeeder::class);
         $this->call(ForumSeeder::class);
    }
}
