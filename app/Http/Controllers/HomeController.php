<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $trendingNews = Article::with("category")->orderBy("views", "DESC")->limit(3)->get();
        $recentNews = Article::with("category")->latest()->limit(8)->get();

        return view('layouts.homes', [
            'recentNews' => $recentNews,
            'trendingNews' => $trendingNews,
        ]);
    }

    public function test()
    {
        $trendingNews = Article::with("category")->orderBy("views", "DESC")->limit(9)->get();
        $recentNews = Article::with("category")->latest()->limit(9)->get();
        return view('homes.index', [
            'trendingNews' => $trendingNews,
            'recentNews' => $recentNews,
        ]);
    }

    public function about()
    {
        return view('homes.about', [
            'image' => 'zulijra.jfif',
            'name' => 'Zul Ijra Saryendy',
            'email' => 'saryendyzulijra@gmail.com',
        ]);
    }

    public function blogs()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        $category = Category::with('articles')->get();
        $recentNews = Article::with("category")->latest()->limit(4)->get();
        return view('homes.blogs', [
            "articles" => Article::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString(),
            "category" => $category,
            "recentNews" => $recentNews,
        ]);
    }

    public function show(Article $article)
    {
        $article->views++;
        $article->save();
        $category = Category::with('articles')->get();
        $recentNews = Article::with("category")->latest()->limit(4)->get();
        $random = Article::select('title' ,'slug')->where("id", "!=", $article->id)->inRandomOrder()->limit(2)->get();
        return view('homes.articles', [
            "article" => $article,
            "category" => $category,
            "recentNews" => $recentNews,
            "random" => $random,
        ]);
    }

    public function storeComment(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);
        $data = [
            "article_id" => $article->id,
            "user_id" => auth()->user()->id,
            "body" => $validatedData["comment"],
        ];
        Comment::create($data);

        return redirect("/articles/$article->slug")->with('success', 'Comment berhasil ditambahkan');
    }
}
