<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([[
            'location_id' => 'PST',
            'lokasi' => 'intan Pusat',
            'alamat' => 'Jakarta Pusat',
            'created_at' => Carbon::now(),
        ],[
            'location_id' => 'BNT',
            'lokasi' => 'intan Bintara',
            'alamat' => 'Jakarta Timur',
            'created_at' => Carbon::now(),
        ]]);
    }
}
