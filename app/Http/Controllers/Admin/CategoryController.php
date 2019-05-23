<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (User::isAdmin())
        return view('admin.categories.index', [
          'categories' => Category::paginate(10)
        ]);
      else
        return view('user.categories.index', [
          'categories' => Category::where('created_by', Auth::user()->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
      if (User::isAdmin())
        return view('admin.categories.create', [
          'category'   => $category,
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'user'       => User::with('categories')->where('id', Auth::user()->id)->get(),
          'delimiter'  => ''
        ]);
      else
        return view('user.categories.create', [
          'category'   => $category,
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'user'       => User::with('categories')->where('id', Auth::user()->id)->get(),
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
        Category::create($request->all());

        if (User::isAdmin())
          return redirect()->route('admin.category.index');
        else
          return redirect()->route('user.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      if (User::isAdmin())
        return view('admin.categories.edit', [
          'category'   => $category,
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'user'       => User::with('categories')->get(),
          'delimiter'  => ''

        ]);
      else
        return view('user.categories.edit', [
          'category'   => $category,
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'user'       => User::with('categories')->get(),
          'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $category->update($request->except('slug'));
        if (User::isAdmin())
          return redirect()->route('admin.category.index');
        else
          return redirect()->route('user.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        if (User::isAdmin())
          return redirect()->route('admin.category.index');
        else
          return redirect()->route('user.category.index');
      }
  }
