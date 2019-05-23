@extends('admin.layouts.app_admin')
@section('content')
<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') יצירת קטגוריה @endslot
    @slot('parent') ראשי          @endslot
    @slot('active') קטגוריות     @endslot
  @endcomponent

<hr />

  <form class="form-horizontal" action="{{route('admin.category.store', $category)}}" method="post">

    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.categories.partials.form')
    
    <input type="hidden" name="created_by" value="{{Auth::id()}}">
  </form>
</div>

@endsection
