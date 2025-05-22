<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            [
                'title' => 'Happy',
                'artist' => 'Pharrell Williams',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Uptown Funk',
                'artist' => 'Mark Ronson ft. Bruno Mars',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cant Stop the Feeling!',
                'artist' => 'Justin Timberlake',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Celebration',
                'artist' => 'Kool & The Gang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'I Gotta Feeling',
                'artist' => 'The Black Eyed Peas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Party Rock Anthem',
                'artist' => 'LMFAO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Shut Up and Dance',
                'artist' => 'Walk the Moon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sweet Caroline',
                'artist' => 'Neil Diamond',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'I Wanna Dance with Somebody',
                'artist' => 'Whitney Houston',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Hey Jude',
                'artist' => 'The Beatles',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($songs as $song) {
            DB::table('songs')->insert($song);
        }
    }
}
