@extends('user.layouts.app_user')
@section('content')
<div class="container">

  <div class="row">
    <div class="col-sm-6">
      <a class="btn btn-outline-dark btn-lg btn-block" href="{{route('user.category.create')}}">צור קטגוריה</a>
      @foreach ($categories as $category)
        <a class="list-group-item" href="{{route('user.category.edit', $category)}}">
          <h4 class="list-group-item-heading">{{$category->title}}</h4>
          <p class="list-group-item-text">
            {{$category->articles()->count()}}
          </p>
        </a>
      @endforeach
    </div>
    <div class="col-sm-6">
      <a class="btn btn-outline-dark btn-lg btn-block" href="{{route('user.article.create')}}">צור גמח</a>
      @foreach ($articles as $article)
        <a class="list-group-item" href="{{route('user.article.edit', $article)}}">
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
