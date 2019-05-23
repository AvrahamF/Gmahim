@extends('user.layouts.app_user')
@section('content')
<div class="container">

  @component('user.components.breadcrumb')
    @slot('title') שינוי קטגוריה @endslot
    @slot('parent') ראשי          @endslot
    @slot('active') קטגוריות     @endslot
  @endcomponent

<hr />

  <form class="form-horizontal" action="{{route('user.category.update', $category)}}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('user.categories.partials.form')

  </form>
</div>

@endsection
