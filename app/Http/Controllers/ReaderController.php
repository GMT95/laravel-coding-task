<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function purchaseBook(Request $request) {
        $request->validate([
            'book_id' => 'required|exists:books,id'
        ]);

        $user = Auth::guard('api')->user();
        $book = Book::find($request->book_id);

        $userHasPurchased = $user->books()->where('id', $book->id)->exists();

        if($userHasPurchased === true) {
            return response()->json(['message' => "You already have purchased the book with name {$book->name}"], 422);
        }

        $user->books()->attach([$request->book_id]);

        return response()->json(['message' => "{$book->name} successfully purchased by {$user->name}"], 200);

    }

    public function getAllReadersWithBooks() {
        $readersWithBooks = User::with('books')->paginate(5);

        return response()->json(['readers' => $readersWithBooks], 200);
    }
}
