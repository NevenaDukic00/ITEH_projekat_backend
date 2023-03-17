<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Resources\GenreResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class GenreController extends Controller
{
    public function index()
    {
      
        $genres = Genre::all();
        
        return GenreResource::collection($genres);
    }
}
