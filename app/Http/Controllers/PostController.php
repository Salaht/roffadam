<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Artist;
use Auth;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', ['posts'=>$posts]);
    }

    public function search(Request $request)
    {
        $query = $request->search;
        $artists = Artist::all();
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')->paginate(10);
        return view('home', ['posts'=>$posts], ['artists'=>$artists]);
    }

    public function admin_search(Request $request)
    {
        $query = $request->search;
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')->paginate(10);
        return view('admin.post.index', ['posts'=>$posts]);
    }

    public function deleteComment($id)
    {
        // check welke id geselecteerd is
        $comment = Comment::findOrFail($id);
        // verwijderd de comment
        $comment->delete();
        // gaat terug naar de show post pagina met de comments
        return redirect()->action('PagesController@showPost', ['id' => $comment->Post->id]);
    }

    public function comment($id, Request $request)
    {
        $comment = new Comment;
        $comment->text = $request->text;
        $comment->post_id = $id;
        $comment->user_id = Auth::id();
        $comment->save();
        
        return redirect()->action('PagesController@showPost', ['id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();
        return view('admin.post.create', compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        
        if (empty($request->image)) {
            $post->image = "http://localhost:8000/images/placeholder.jpg";
        } else {
            $post->image = $request->image;
        }
        $post->user_id = Auth::id();
        $post->artist_id = $request->artist;
        
        $post->save();
        
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $artists = Artist::all(); 
        return view('admin.post.edit', compact('post', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $request->image;
        $post->artist_id = $request->artist;
        $post->save();
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/admin/posts');
    }
}
