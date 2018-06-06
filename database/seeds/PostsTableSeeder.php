<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $x=0;
	    while ($x<50) {
		    $x++;
		    DB::table('posts')->insert( [
			    'author_id' => 1,
			    'category_id' => rand(1,10),
			    'published' => 1,
			    'title' => 'Тестовая новость ' . $x,
			    'content' => '<p>'.
							'контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент'.
							'контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент'.
							'контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент'.
							'контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент'.
							'контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент'.
							'контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент'.
							'контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент'.
							'контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент'.
							'</p>',
			    'image' => '1527680191.jpg',
			    'created_at' => '2018-05-18 20:54:29',
			    'updated_at' => '2018-05-18 20:54:29',
		    ] );
	    }
    }
}