<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;

use DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {

        DB::table('menu_items')->truncate();
        DB::table('menus')->truncate();

        Menu::firstOrCreate([
            'name' => 'admin',
        ]);
    }
}
