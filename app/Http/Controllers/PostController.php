<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDashboard(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    public function createPost(Request $request){
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }

        return redirect()
                ->route('dashboard')
                ->with(['message' => $message]);

    } // end createPost()

    public function deletePost($post_id){
        $post = Post::where('id', $post_id)->first();

        if (Auth::user() != $post->user){
            return redirect()->back();
        }

        $post->delete();

        return redirect()
                ->route('dashboard')
                ->with(['message' => 'Successfully Deleted']);
    }

    public function editPost(Request $req){
        $this->validate($req, [
            'body' => 'required'
        ]);

        $post = Post::find($req['postId']);

        // Checking Is user is authorized to update it
        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->body = $req['body'];
        $post->update();

        return response()->json(['new_body' => $post->body], 200);
    }


}
