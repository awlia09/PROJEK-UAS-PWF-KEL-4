<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi',     'description' => 'Novel dan cerita rekaan'],
            ['name' => 'Non-Fiksi', 'description' => 'Buku berbasis fakta dan pengetahuan umum'],
            ['name' => 'Komik',     'description' => 'Buku cerita bergambar'],
            ['name' => 'Agama',     'description' => 'Buku keagamaan dan kerohanian'],
            ['name' => 'Dongeng',   'description' => 'Cerita rakyat dan dongeng anak'],
            ['name' => 'Biografi',  'description' => 'Kisah hidup tokoh'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}