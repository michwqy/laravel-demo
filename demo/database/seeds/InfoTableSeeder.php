<?php

use Illuminate\Database\Seeder;

class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Shanghai');
        DB::table('info')->insert([
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'type'=> str_random(10),
            'name'=> str_random(10),
            'email'=> str_random(10),
            'connection'=> str_random(10),
            'placetype'=> str_random(10),
            'scale'=> str_random(10),
            'facility'=> str_random(10),
            'location'=> str_random(10),
            'organization'=> str_random(10),
            'field'=> str_random(10),
            'position'=> str_random(10),
            'need'=> str_random(100),
        ]);

        DB::table('info')->insert([
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'type'=> str_random(10),
            'name'=> str_random(10),
            'email'=> str_random(10),
            'connection'=> str_random(10),
            'placetype'=> str_random(10),
            'scale'=> str_random(10),
            'facility'=> str_random(10),
            'location'=> str_random(10),
            'organization'=> str_random(10),
            'field'=> str_random(10),
            'position'=> str_random(10),
            'need'=> str_random(100),
        ]);
    }
}
