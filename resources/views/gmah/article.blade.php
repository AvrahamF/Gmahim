@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)


@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-10">
				<h1>{{$article->title}}</h1>
				<p>{!!$article->description!!}</p>
			</div>
			<div class="col-sm-2">
				<p>{{$article->id}}</p>
					<a class="btn btn-outline-dark btn-lg btn-block" href="{{route('create.donation', $article)}}">תרום</a>
			</div>
		</div>
	</div>
@endsection
