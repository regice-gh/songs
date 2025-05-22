<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            [
                'name' => 'Hey Jude',
                'release_date' => '1970-02-26',
                'timer_sold' => '11000000',
                'band_id' => DB::table('band')->where('name', 'The Beatles')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The E.N.D.',
                'release_date' => '2009-06-09',
                'timer_sold' => '3000000',
                'band_id' => DB::table('band')->where('name', 'The Black Eyed Peas')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Talking Is Hard',
                'release_date' => '2014-12-02',
                'timer_sold' => '500000',
                'band_id' => DB::table('band')->where('name', 'Walk the Moon')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Celebration!',
                'release_date' => '1980-09-29',
                'timer_sold' => '2000000',
                'band_id' => DB::table('band')->where('name', 'Kool & The Gang')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sorry for Party Rocking',
                'release_date' => '2011-06-21',
                'timer_sold' => '1000000',
                'band_id' => DB::table('band')->where('name', 'LMFAO')->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($albums as $album) {
            DB::table('album')->insert($album);
        }
    }
}
