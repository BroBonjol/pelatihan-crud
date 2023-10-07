<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //query get data
        $post = Post::orderBy('id', 'ASC')->get();

        return view ('posts.index', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //validasi kolom
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        //insert ke tabel post
        Post::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('post.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ],[
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi'
        ]);

        //insert ke tabel post
        Post::findOrFail($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('post.index')->with('success', 'Berhasil mengupdate data Post');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Berhasil menghapus data Post');
    }
}
