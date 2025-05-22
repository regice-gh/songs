<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Order is important due to relationships
        $this->call([
            BandSeeder::class,    // First create bands
            AlbumSeeder::class,   // Then create albums (needs bands)
            SongSeeder::class,    // Finally create songs (needs albums)
        ]);
    }
}
