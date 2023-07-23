<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Score;
use Illuminate\Http\Request;
use Throwable;

class ScoreController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   public function add(Request $request,$id)
   {
      try{
         Score::create([
            'score' => $request->input('score'),
            'user_id' => auth()->user()->id,
            'book_id' => $id,
           ]);
      } catch(Throwable $e)
      {
         $error = 'شما قبلا نظر داده اید';
         return $error;
      }  
      $scores = Score::where('book_id','=',$id)->get();
      $scoreavg=$scores->avg('score');
      $book = Book::findOrFail($id);
      $book->score = round($scoreavg,2);
      $book->save();  
      return back();
   }

   public function comment(Request $request,$id)
   {
         $validate_data = $request->validate(
            [
               'comment' => 'required'
            ]);
            Comment::create([
               'comment' => $request->input('comment'),
               'user_id' => auth()->user()->id,
               'book_id' => $id
            ]);
            return back();
    }
}
