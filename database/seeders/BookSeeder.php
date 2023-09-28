<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $book = new Book();
        // $book->name = 'Belajar Laravel';
        // $book->category = 'Pemrograman';
        // $book->save();
        Book::factory(10)->create();
    }
}