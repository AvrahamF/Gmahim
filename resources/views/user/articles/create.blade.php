@extends('user.layouts.app_user')

@section('content')

<div class="container">

  @component('user.components.breadcrumb')
    @slot('title') יצירת גמח @endslot
    @slot('parent') ראשי     @endslot
    @slot('active') גמחים    @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('user.article.store', $article)}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('user.articles.partials.form')

    <input type="hidden" name="created_by" value="{{Auth::id()}}">
  </form>
</div>

@endsection
