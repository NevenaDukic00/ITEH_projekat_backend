<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderedBook;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\OrderedBookResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderedBookController extends Controller
{
    public function index()
    {
    

        $orderedBooks = OrderedBook::get()->where('user_id', Auth::user()->id);


        if (sizeof($orderedBooks) == 0) {
            return response()->json(['response' => "You don't have any book ordered!"]);
        }


       

        return OrderedBookResource::collection($orderedBooks);
    

      
      
   

    }
    public function store(Request $request)
    {
      
        $validator = Validator::make(
            $request->all(),
            [
                'amount' => 'required|max:40',
                'user_id' => 'required',
                'book_id'=>'required'
            ]
        );
       
        
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        
        $orderedBook = OrderedBook::create([
            'amount' => $request->amount,
            'user_id'=> $request->user_id,
            'book_id' => $request->book_id
            
        ]);
        
        
        return response()->json(['response' => 'You have successfully created new OrderedBook!']);
    
    }

}
