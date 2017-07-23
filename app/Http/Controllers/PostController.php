<?php

namespace App\Http\Controllers;

use App\Like;
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
    } // end editPost()

    public function likePost(Request $req){


        $post_id = $req['postId'];
        $is_like = $req['isLike'] == 'true';

        $update = false;
        $post = Post::find($post_id);
        if(!$post){
            return null;
        }

        $user = Auth::user();

        $like = $user->likes()->where('post_id', $post_id)->first();
        //return response()->json(['body' => $like], 200);



        if($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post_id;
        if($update){
            $like->update();
        } else {
            $like->save();
        }
        return null;



    }


}
