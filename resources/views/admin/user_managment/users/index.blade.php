@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') רשימת משתמשים  @endslot
    @slot('parent') ראשי           @endslot
    @slot('active') משתמשים        @endslot
  @endcomponent

  <hr>
  <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-outline-dark pull-right"> צור משתמש <i class="fa
    fa-plus-square-o"></i>
  </a>

  <table class="table table-striped">
    <thead>
      <th>
        שם
      </th>
      <th>
       כתובת דואר אלקטרוני
      </th>
      <th class="text-right">
        פעולות
      </th>
    </thead>
    <tbody>
      @forelse ($users as $user)
      <tr>
        <td>
          {{$user->name}}
        </td>
        <td>
          {{$user->email}}
        <td class="text-right">
          <form onsubmit="if(confirm('למחוק?')){ return true }else{ return false }" action="{{route('admin.user_managment.user.destroy', $user)}}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <a class="btn btn-outline-dark" href="{{route('admin.user_managment.user.edit', $user)}}"><i class="fa fa-edit"></i></a>

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
              {{$users->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
