@foreach ($categories as $category)

  @if (count($category->children->where('published', 1))  > 0)

  <li class="dropdown-submenu">
    <a class="dropdown-item" href="{{url("/gmah/category/$category->slug")}}"><i class="fa fa-chevron-left"></i> {{$category->title}}</a>
    <ul class="dropdown-menu text-right">
      @include('layouts.top_menu', ['categories' => $category->children])
    </ul>
  </li>

  @else

    <a class="dropdown-item" href="{{url("/gmah/category/$category->slug")}}">{{$category->title}}</a>

  @endif

@endforeach
