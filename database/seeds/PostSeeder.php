<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            ['user_id'=>1,'title'=>"post one",'content'=>"post content one"],
            ['user_id'=>2,'title'=>"post two",'content'=>"post content two"],
            ['user_id'=>3,'title'=>"post three",'content'=>"post content three"]
        ]);
    }
}
