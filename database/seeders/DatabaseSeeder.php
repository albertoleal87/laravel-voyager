<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
                
    	$this->call([
			MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            CategoriesTableSeeder::class,
            PostsTableSeeder::class,
            PagesTableSeeder::class,
	    ]);
        Schema::enableForeignKeyConstraints();
    }
}
