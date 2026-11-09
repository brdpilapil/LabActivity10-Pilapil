<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();
        $kagawad = Author::where('email', 'LIKE', 'kagawad.%')->first();

        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Pilapil Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'Join our community clean-up drive this weekend! Let us keep our purok clean, safe, and healthy.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-09-23 08:00:00',
            'views' => 0,
        ]);
    }
}