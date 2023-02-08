<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'user')->latest()->get();


        $authorsClassement = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->selectRaw('users.name as user_name, count(posts.id) as post_count')
            ->groupBy('users.name')
            ->orderByDesc('post_count')
            ->take(5)
            ->get();

        $mostPopularCategories = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->selectRaw('categories.name as category_name, count(posts.id) as post_count')
            ->groupBy('categories.name')
            ->orderByDesc('post_count')
            ->take(5)
            ->get();

        $lastPost = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'users.name as user_name', 'categories.name as category_name')
            ->orderByDesc('posts.created_at')
            ->first();
        

        return view('post.index', compact('posts', 'authorsClassement', 'mostPopularCategories', 'lastPost') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $imageName = $request->image->store('posts');

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
        ]);

        return redirect()->route('dashboard')->with('success', 'Votre post a été crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }

        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));

    }

    public function likePost($id)
    {
        $post = Post::find($id);
        $post->like();
        $post->save();
        return redirect()->route('posts.index')->with('message','Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();
        return redirect()->route('posts.index')->with('message','Post Like undo successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
         $arrayUpdate = [
            'title' => $request->title,
            'content' => $request->content,
         ];

         if ($request->image != null) {
            $imageName = $request->image->store('post');
            $arrayUpdate = array_merge($arrayUpdate, [
                'image' => $imageName
            ]);
         }
         $post->update($arrayUpdate);

        return redirect()->route('dashboard')->with('success', 'Votre post a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (! Gate::allows('destroy-post', $post)) {
            abort(403);
        }
        
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Votre post a été supprimé');

    }
}
