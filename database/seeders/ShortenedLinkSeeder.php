<?php

namespace Database\Seeders;

use App\Models\ShortenedLink;
use Illuminate\Database\Seeder;

class ShortenedLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShortenedLink::factory()->count(50)->create();
    }
}
