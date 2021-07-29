<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.post.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);

        if(isset($request->visible))
            $request->visible = 1;
        else {
            $request->visible = 0;
        }

       $data = $request->all();

       $post = Post::create($data);

        return redirect()->route('post.index')->with('success', 'Статья добавлена');
    }



    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.post.edit', compact('post'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if($request->has('visible'))
            $request->request->add(['visible' => 1]);
        else{
            $request->request->add(['visible' => 0]);
        }

        $post = Post::find($id);
        $data = $request->all();

        $post->update($data);

        return redirect()->route('post.index')->with('success', 'Изменения сохранены');


    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Статья удалена');
    }
}
