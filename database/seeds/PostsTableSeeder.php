<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $titles = ['朝','昼','夜'];
        $contents = ['おはよう','こんにちは','こんばんは'];

        foreach ($titles as $title) {
            foreach ($contents as $content) {
                DB::table('posts')->insert([
                    'title' => $title,
                    'content' => $content,
                    'user_id' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
