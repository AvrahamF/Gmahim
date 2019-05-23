@extends('user.layouts.app_user')
@section('content')
<div class="container">

  @component('user.components.breadcrumb')
    @slot('title') יצירת קטגוריה @endslot
    @slot('parent') ראשי          @endslot
    @slot('active') קטגוריות     @endslot
  @endcomponent

<hr />

  <form class="form-horizontal" action="{{route('user.category.store', $category)}}" method="post">

    {{ csrf_field() }}

    {{-- Form include --}}
    @include('user.categories.partials.form')

    <input type="hidden" name="created_by" value="{{Auth::id()}}">
  </form>
</div>

@endsection
