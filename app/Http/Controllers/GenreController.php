<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Resources\GenreCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class GenreController extends Controller
{
    public function index()
    {
        if ( Auth::user()->email!="admin@gmail.com") {
            return response()->json(['response' => "You cannot enter a new theatre because you are not an admin!"]);
        } 

        $genres = Genre::all();
        return new GenreCollection($genres);
    }
}
