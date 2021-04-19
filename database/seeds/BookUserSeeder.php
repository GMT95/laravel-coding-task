<?php

use App\Book;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::first()->id;
        $bookIds = Book::all()->pluck('id');

        DB::table('book_user')->insert([
            [
                'user_id' => $userId,
                'book_id' => $bookIds[0],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => $userId,
                'book_id' => $bookIds[1],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
