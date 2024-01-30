<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'category_id' => 'KTG01',
            'kategori' => 'Komputer Rakitan',
            'created_at' => Carbon::now(),
        ],[
            'category_id' => 'KTG02',
            'kategori' => 'Printer',
            'created_at' => Carbon::now(),
        ]]);
    }
}
