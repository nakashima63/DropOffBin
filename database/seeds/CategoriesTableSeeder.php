<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'ファッション'
        ]);
        
        DB::table('categories')->insert([
            'category' => 'インテリア'
        ]);
        
        DB::table('categories')->insert([
            'category' => '家電'
        ]);
        
        DB::table('categories')->insert([
            'category' => 'スポーツ'
        ]);
        
        DB::table('categories')->insert([
            'category' => '本・音楽・ゲーム'
        ]);
        
        DB::table('categories')->insert([
            'category' => 'おもちゃ・ホビー・グッズ'
        ]);
        
        DB::table('categories')->insert([
            'category' => 'その他'
        ]);
    }
}
