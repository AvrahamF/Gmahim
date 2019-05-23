@extends('user.layouts.app_user')

@section('content')

<div class="container">

  @component('user.components.breadcrumb')
    @slot('title') שינוי גמח @endslot
    @slot('parent') ראשי @endslot
    @slot('active') גמחים @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('user.article.update', $article)}}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('user.articles.partials.form')

    <input type="hidden" name="modified_by" value="{{Auth::id()}}">
  </form>
</div>

@endsection
