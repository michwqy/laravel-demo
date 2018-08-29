<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'michwqy',
            'email'=>'michwqy@sina.com',
            'password' => Hash::make('123456'),
            'status'=>1,
            'type'=>1
            ]);

        User::create([
            'name' => 'michwqy2',
            'email'=>'michwqy2@sina.com',
            'password' => Hash::make('123456'),
            'status'=>1,
            'type'=>0
            ]);
    }
}
