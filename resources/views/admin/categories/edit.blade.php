@extends('admin.layouts.app_admin')
@section('content')
<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') שינוי קטגוריה @endslot
    @slot('parent') ראשי          @endslot
    @slot('active') קטגוריות     @endslot
  @endcomponent

<hr />

  <form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.categories.partials.form')

    <input type="hidden" name="modified_by" value="{{Auth::id()}}">
  </form>
</div>

@endsection
