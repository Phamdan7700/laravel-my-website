<?php

namespace App\Http\Controllers;

use App\Models\Comment as MainModel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request)
    {
        $items = MainModel::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'name' => $request->name,
        ]);
        $items->save();
        return back();
    }

 
    public function destroy($id)
    {
        //
    }
}
