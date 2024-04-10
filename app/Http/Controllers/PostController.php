<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class PostController extends Controller
{
    public function index() {
        $movies = Movie::all();
        return view('movie', compact('movies'));
    }

    // admin/movies/createが画面表示
    public function create() {
        return view('createMovie');
    }

    // admin/movies/createが画面表示
    public function store(Request $request) {

        $validated = $request->validate([
            'title' => 'required|unique:movies,title',
            'image_url' => 'required|url',
            'published_year' => 'required|max:20',
            'description' => 'required|max:200',
            'is_showing' => 'required|boolean',
        ]);

        try {
            $movie = Movie::create($validated);
            $request->session()->flash('message', '保存しました');
            return redirect()->route('movie.index'); // 成功した場合のリダイレクト先

        } catch (QueryException $e) {

            $request->session()->flash('error', '保存に失敗しました: ' . $e->getMessage());
            return back(); // 入力フォームに戻る
        }
    }

    public function edit($id) {
        $movie = Movie::findOrFail($id);
        return view('editMovie', compact('movie'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|unique:movies,title',
            'image_url' => 'required|url',
            'published_year' => 'required|max:20',
            'description' => 'required|max:200',
            'is_showing' => 'required|boolean',
        ]);

        try {
            $movie = Movie::findOrFail($id);
            $movie->update($validated);

            return redirect()->route('movie.index')->with('message', '投稿が更新されました。');
        } catch (QueryException $e) {
            $request->session()->flash('error', '保存に失敗しました: ' . $e->getMessage());
            return back(); // 入力フォームに戻る
        }
    }
}
