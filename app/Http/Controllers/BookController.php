<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function add(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publisher' => 'required|string|max:255',
                'shortDescription' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required',
                'genre_id' => '',
                'amount' => '',
                'url' => 'required',

            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $book = Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'shortDescription' => $request->shortDescription,
            'description' => $request->description,
            'price' => $request->price,
            'genre_id' =>  $request->genre_id,
            'amount' => 0,
            'url' => $request->url
        ]);

        //$book->save();
        // $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['success' => 'true', 'response' => 'Book successfully added!', new BookResource($book)]);
    }


    public function index()
    {
        $books = Book::all();


        return BookResource::collection($books);
    }


    public function update(Request $request, Book $book)
    {




        $validator = Validator::make(
            $request->all(),
            [
                'price' => 'required|string'


            ]
        );


        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $book->price = $request->price;

        $book->save();


        return response()->json(['response' => 'You have successfully changed book!']);
    }


    public function destroy($bookid)
    {

        if (Auth::user()->email != "admin@gmail.com") {
            return response()->json(['response' => "You cannot delete the theatre because you are not an admin!"]);
        }

        $b = Book::find($bookid);
        if ($b == null) {
            return response()->json(['response' => 'Book does not exsist!']);
        }
        //$t = Theatre::find($theatreid);
        if ($b->delete()) {
            return response()->json(['response' => 'Book has been successfully deleted!']);
        } else {
            return response()->json(['response' => 'Deleting book has failed!']);
        }
    }
}
