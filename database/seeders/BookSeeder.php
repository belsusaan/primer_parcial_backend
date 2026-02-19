<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(database_path('data/libros.csv'), 'r');
        $header = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            $data = array_combine($header, $row);
            Book::create([
                'title'            => $data['title'],
                'description'      => $data['description'],
                'isbn'             => $data['isbn'],
                'total_copies'     => (int) $data['total_copies'],
                'available_copies' => (int) $data['available_copies'],
                'status'           => $data['status'] === 'disponible',
            ]);
        }

        fclose($file);

        Book::factory(90)->create();
    }
}
