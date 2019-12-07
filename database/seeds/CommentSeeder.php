<?php

use Illuminate\Database\Seeder;

class CommentSeesder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->insert([
            ['user_id'=>1,'post_id'=>"1",'content'=>"comment content one"],
            ['user_id'=>2,'post_id'=>"2",'content'=>"comment content two"],
            ['user_id'=>3,'post_id'=>"3",'content'=>"comment content three"]
        ]);
    }
}
