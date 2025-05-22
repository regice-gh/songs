<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandSeeder extends Seeder
{
    public function run(): void
    {
        $bands = [
            [
                'name' => 'The Beatles',
                'genre' => 'Rock',
                'founded' => '1960',
                'active_till' => '1970',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Black Eyed Peas',
                'genre' => 'Hip Hop/Pop',
                'founded' => '1995',
                'active_till' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Walk the Moon',
                'genre' => 'Alternative Rock',
                'founded' => '2006',
                'active_till' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kool & The Gang',
                'genre' => 'Funk/Soul',
                'founded' => '1964',
                'active_till' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'LMFAO',
                'genre' => 'Electronic/Hip Hop',
                'founded' => '2006',
                'active_till' => '2012',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($bands as $band) {
            DB::table('band')->insert($band);
        }
    }
}
