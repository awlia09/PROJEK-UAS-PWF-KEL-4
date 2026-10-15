<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');

        $books = [
            ['Fiksi', 'Laskar Pelangi', 'Andrea Hirata', 2005, 5],
            ['Fiksi', 'Bumi Manusia', 'Pramoedya Ananta Toer', 1980, 3],
            ['Non-Fiksi', 'Atomic Habits', 'James Clear', 2018, 4],
            ['Non-Fiksi', 'Sapiens', 'Yuval Noah Harari', 2011, 2],
            ['Komik', 'Doraemon Vol. 1', 'Fujiko F. Fujio', 1974, 6],
            ['Komik', 'Detektif Conan Vol. 1', 'Gosho Aoyama', 1994, 5],
            ['Agama', 'Kisah Para Nabi', 'Ibnu Katsir', 2010, 3],
            ['Agama', 'Iman Kristen', 'Dr. Harun Hadiwijono', 1991, 2],
            ['Dongeng', 'Si Malin Kundang', 'Watiek Ideo', 2021, 4],
            ['Dongeng', 'Si Kancil Yang Cerdik', 'Endyas Wiguna', 2010, 5],
            ['Biografi', 'B.J. Habibie: Sebuah Biografi', 'Fatimah Fayrus', 2018, 3],
            ['Biografi', 'Albert Einstein: His Life and Universe', 'Walter Isaacson', 2007, 2],
        ];

        foreach ($books as [$category, $title, $author, $year, $stock]) {
            Book::create([
                'category_id' => $categories[$category],
                'title' => $title,
                'author' => $author,
                'year' => $year,
                'stock' => $stock,
            ]);
        }
    }
}