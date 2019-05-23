@extends('user.layouts.app_user')
@section('content')
<div class="container">
  @component('user.components.breadcrumb')
    @slot('title') רשימת קטגוריות @endslot
    @slot('parent') ראשי           @endslot
    @slot('active') קטגוריות       @endslot
  @endcomponent

  <hr>
  <a href="{{route('user.category.create')}}" class="btn btn-outline-dark pull-right"> צור קטגוריה <i class="fa
    fa-plus-square-o"></i>
  </a>

  <table class="table table-striped">
    <thead>
      <th>
        שם
      </th>
      <th>
        מפורסם באתר
      </th>
      <th class="text-right">
        פעולות
      </th>
    </thead>
    <tbody>
      @forelse ($categories as $category)
      <tr>
        <td>
          {{$category->title}}
        </td>
        <td>
          @if($category->published == 0)
            לא
          @else
            כן
          @endif
        </td>
        <td class="text-right">
          <form onsubmit="if(confirm('למחוק?')){ return true }else{ return false }" action="{{route('user.category.destroy', $category)}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}

            <a class="btn btn-outline-dark" href="{{route('user.category.edit', $category)}}"><i class="fa fa-edit"></i></a>

            <button type="submit" class="btn btn-outline-dark"><i class="fa fa-trash-o"></i></button>
          </form>
        </td>
      </tr>
      @empty
        <td colspan="3" class="text-center">
          <h2>
            אין נתונים
          </h2>
        </td>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          <ul class="pagination justify-content-center">
              {{$categories->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
