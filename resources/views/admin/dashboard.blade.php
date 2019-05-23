@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="jumbotron">
        <h1 class="text-center">
          <span class="badge btn-outline-dark">0 קטגוריות</span>
        </h1>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron">
        <h1 class="text-center">
          <span class="badge btn-outline-dark">0 חומר</span>
        </h1>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron">
        <h1 class="text-center">
          <span class="badge btn-outline-dark">0 משתמשים</span>
        </h1>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="jumbotron">
        <h1 class="text-center">
          <span class="badge btn-outline-dark">0 היום</span>
        </h1>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <a class="btn btn-outline-dark btn-lg btn-block" href="{{route('admin.category.create')}}">צור קטגוריה</a>
      @foreach ($categories as $category)
        <a class="list-group-item" href="{{route('admin.category.edit', $category)}}">
          <h4 class="list-group-item-heading">{{$category->title}}</h4>
          <p class="list-group-item-text">
            {{$category->articles()->count()}}
          </p>
        </a>
      @endforeach
    </div>
    <div class="col-sm-6">
      <a class="btn btn-outline-dark btn-lg btn-block" href="{{route('admin.article.create')}}">צור גמח</a>
      @foreach ($articles as $article)
        <a class="list-group-item" href="{{route('admin.article.edit', $article)}}">
          <h4 class="list-group-item-heading">{{$article->title}}</h4>
          <p class="list-group-item-text">
            {{$article->categories()->pluck('title')->implode(', ')}}
          </p>
        </a>
      @endforeach
    </div>
  </div>

</div>

@endsection
