<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;
use App\Category;
use App\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.articles.index', [
          'articles' => Article::orderBy('created_at', 'desc')->where('created_by', Auth::user()->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        return view('user.articles.create', [
          'article'    => $article,
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'user'       => User::with('articles')->where('id', Auth::user()->id)->get(),
          'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        // Categories
        if($request->input('categories')) :
          $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('user.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    public function createDonation(Article $article)
    {
      return view('user.donations.from.create', [
        'donation'   => new Donation(),
        'article'    => Article::find($article->id)
        //באמצע פיתוח
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('user.articles.edit', [
          'article'    => $article,
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'user'       => User::with('articles')->get(),
          'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->except('slug'));

        // Categories
        $article->categories()->detach();
        if($request->input('categories')) :
          $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('user.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('user.article.index');
    }
}
