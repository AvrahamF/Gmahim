@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') רשימת גמחים  @endslot
    @slot('parent') ראשי         @endslot
    @slot('active') גמחים        @endslot
  @endcomponent

  <hr>
  <a href="{{route('admin.article.create')}}" class="btn btn-outline-dark pull-right"> צור גמח <i class="fa
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
      @forelse ($articles as $article)
      <tr>
        <td>
          {{$article->title}}
        </td>
        <td>
          @if($article->published == 0)
            לא
          @else
            כן
          @endif
        </td>
        <td class="text-right">
          <form onsubmit="if(confirm('למחוק?')){ return true }else{ return false }" action="{{route('admin.article.destroy', $article)}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}

            <a class="btn btn-outline-dark" href="{{route('admin.article.edit', $article)}}"><i class="fa fa-edit"></i></a>

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
              {{$articles->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
