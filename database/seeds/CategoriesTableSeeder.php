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
        DB::table('categories')->truncate();
		
		DB::table('categories')->insert([
			[
				'title'=>'Web design',
				'slug'=> 'web-design'
			],
			[
				'title'=>'Programação',
				'slug'=>'programacao'
			],
			[
				'title'=> 'Internet',
				'slug'=> 'internet'
			],
			[
				'title'=> 'Social Marketing',
				'slug'=> 'social-marketing'
			],
			[
				'title'=> 'Photograph',
				'slug'=> 'photograph'
			]
		]);
		
		for($post_id=1; $post_id <=10; $post_id++){
			$category_id = rand(1,5);
			
			DB::table('posts')
				->where('id', $post_id)
				->update(['category_id'=> $category_id]);
		}
    }
}
