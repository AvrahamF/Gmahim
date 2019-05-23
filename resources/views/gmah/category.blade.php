@extends('layouts.app')

@section('title', $category->title . " - גמחים")


@section('content')

	<div class="container">
		@forelse ($articles as $article)
			<div class="row">
				<div class="col-sm-10">
					<h2><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
					<p>{!!$article->description_short!!}</p>
				</div>
				<div class="col-sm-2">
					<a class="btn btn-outline-dark btn-lg btn-block" href="{{route('create.donation', $article)}}">תרום</a>
				</div>
			</div>
			<hr>
		@empty
			<h2 class="text-center">ריק</h2>
		@endforelse

		{{$articles->links()}}
	</div>

@endsection
