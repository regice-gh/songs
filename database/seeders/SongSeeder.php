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
        // Get album IDs for reference
        $beatlesAlbumId = DB::table('album')->whereIn('name', ['Hey Jude'])->first()->id;
        $blackEyedPeasAlbumId = DB::table('album')->whereIn('name', ['The E.N.D.'])->first()->id;
        $walkTheMoonAlbumId = DB::table('album')->whereIn('name', ['Talking Is Hard'])->first()->id;
        $koolAndGangAlbumId = DB::table('album')->whereIn('name', ['Celebration!'])->first()->id;
        $lmfaoAlbumId = DB::table('album')->whereIn('name', ['Sorry for Party Rocking'])->first()->id;

        $songs = [
            [
                'title' => 'Happy',
                'artist' => 'Pharrell Williams',
                'album_id' => null,
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
                'album_id' => $koolAndGangAlbumId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'I Gotta Feeling',
                'artist' => 'The Black Eyed Peas',
                'album_id' => $blackEyedPeasAlbumId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Party Rock Anthem',
                'artist' => 'LMFAO',
                'album_id' => $lmfaoAlbumId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Shut Up and Dance',
                'artist' => 'Walk the Moon',
                'album_id' => $walkTheMoonAlbumId,
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
                'album_id' => $beatlesAlbumId,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($songs as $song) {
            DB::table('songs')->insert($song);
        }
    }
}
