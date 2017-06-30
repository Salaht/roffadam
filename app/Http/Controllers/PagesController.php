<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Post;
use App\User;
use App\Comment;

class PagesController extends Controller
{

    /* Home pagina met een overzicht van alle posts in desc order*/
    public function home()
    {
        $artists = Artist::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', ['posts'=>$posts], ['artists'=>$artists]);
    }   

    /* De geselecteerde post tonen in de show pagina*/
    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        return view('pages.post.show', compact('post'));

    } 
    /* Artisten pagina tonen met alle arties gegevens*/
   	public function artist()
    {
        $artists = Artist::all();
        return view('pages.artist', ['artists'=>$artists]);
    }

    public function showArtist($id)
    {
        $artist = Artist::findOrFail($id);
        return view('pages.artist.show', compact('artist'));

    } 

    public function admin()
    {
        $artist_count = Artist::get()->count();
        $post_count = Post::get()->count();
        $user_count = User::get()->count();
        $comment_count = Comment::get()->count();

        return view('admin.index', compact('artist_count', 'post_count', 'user_count', 'comment_count'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

}
