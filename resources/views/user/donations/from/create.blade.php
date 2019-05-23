@extends('user.layouts.app_user')

@section('content')

<div class="container">

  @component('user.components.breadcrumb')
    @slot('title') יצירת תרומה @endslot
    @slot('parent') ראשי     @endslot
    @slot('active') גמחים    @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('user.donationfrom.store', $donation)}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('user.donations.from.partials.form')

    <input type="hidden" name="created_by" value="{{Auth::id()}}">
  </form>
</div>

@endsection
