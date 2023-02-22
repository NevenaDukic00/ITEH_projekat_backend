<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookCollection;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
       

        return new BookCollection($books);
    }
}
