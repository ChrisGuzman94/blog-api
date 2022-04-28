<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $allPosts = Post::all();
 
        return $allPosts;
    }

   public function show($id)
   {
       $post = Post::find($id);

       return response()->json(["result" => $post], 201);
       

   }

   public function store(Request $request)
   {
       
       $post = new Post;
       

       $post->title = $request->title;
       $post->description = $request->description;
       $post->author = $request->author;
       if($request->hasFile('cover_image')) {
        $post->cover_image = $request->file('cover_image')->store('cover_images', 'public');
     }
   
     

       $post->save();

       return response()->json(["result" => "ok"], 201);
   }

   public function update(Request $request, $id)
{   
    
    $postUpdtade = Post::find(id);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->author = $request->author;

    $post->save();

    return response()->json(["result" => "Post Updated"], 200);


}


   public function destroy($id)
   {
       $post = Post::find($id);
       
       
       $post->delete();
       return response()->json(["result" => "Post removed"], 201);
   }

}