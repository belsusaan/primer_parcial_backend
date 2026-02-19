<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classics = [
            ['title' => 'Don Quijote de la Mancha', 'description' => 'Aventuras de un caballero loco', 'isbn' => '9788424115531', 'total_copies' => 5, 'available_copies' => 5],
            ['title' => 'Cien años de soledad', 'description' => 'Historia de la familia Buendía', 'isbn' => '9780307350435', 'total_copies' => 3,  'available_copies' => 3],
            ['title' => 'Orgullo y Prejuicio', 'description' => 'Novela de costumbres y amor', 'isbn' => '9788467040418', 'total_copies' => 4,  'available_copies' => 4],
            ['title' => 'Crimen y Castigo', 'description' => 'Dilemas morales y justicia', 'isbn' => '9788420651330', 'total_copies' => 2,'available_copies' => 2],
            ['title' => 'El Principito', 'description' => 'Relato corto sobre la vida', 'isbn' => '9780156013987', 'total_copies' => 10, 'available_copies' => 10],
            ['title' => '1984', 'description' => 'Distopía política y vigilancia',   'isbn' => '9788466332514', 'total_copies' => 6,  'available_copies' => 6],
            ['title' => 'La Odisea','description' => 'Viaje épico de Ulises', 'isbn' => '9788424924515', 'total_copies' => 3,  'available_copies' => 3],
            ['title' => 'El Gran Gatsby', 'description' => 'El sueño americano en los años 20', 'isbn' => '9788467036411', 'total_copies' => 4,  'available_copies' => 4],
            ['title' => 'Rayuela', 'description' => 'Novela experimental de Cortázar', 'isbn' => '9788420431321', 'total_copies' => 2,  'available_copies' => 2],
            ['title' => 'Hamlet',                   
            'description' => 'Tragedia de venganza y duda','isbn' => '9788437600123', 'total_copies' => 5, 'available_copies' => 5],
        ];

        foreach ($classics as $book) {
            Book::create(array_merge($book, ['status' => true]));
        }

        Book::factory(90)->create();
    }
}
