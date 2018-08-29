<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Shanghai');
        DB::table('articles')->insert([
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'author'=> str_random(10),
            'title'=> str_random(50),
            'content'=> str_random(1000),
        ]);
    }
}
