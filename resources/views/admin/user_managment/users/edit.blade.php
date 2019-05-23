@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') שינוי משתמש @endslot
    @slot('parent') ראשי     @endslot
    @slot('active') משתמשים    @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('admin.user_managment.user.update', $user)}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT')}}

    {{-- Form include --}}
    @include('admin.user_managment.users.partials.form')

  </form>
</div>

@endsection
