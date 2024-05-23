<?php

namespace Database\Seeders;

use App\Models\Article\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(50)->create();
    }
}
