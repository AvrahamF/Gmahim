<label for="" hidden>סטטוס</label>
<select class="form-control" id="published" name="published" hidden>
  @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>לא מפורסם</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>מפורסם</option>
  @else
    <option value="0">לא מפורסם</option>
    <option value="1">מפורסם</option>
  @endif
</select>

<label for="">שם קטגוריה</label>
@if (isset($category->title))
  <input type="text" class="form-control" id="title" name="title" placeholder="שם קטגוריה"
  value="{{$category->title}}" required>
@else
  <input type="text" class="form-control" id="title" name="title" placeholder="שם קטגוריה"
  value="{{""}}" required>
@endif

<label for="" hidden>slug</label>
@if (isset($category->slug))
  <input type="text" class="form-control" id="slug" name="slug" placeholder="שדה אוטומטי"
  value="{{$category->slug}}" hidden>
@else
  <input type="text" class="form-control" id="slug" name="slug" placeholder="שדה אוטומטי"
  value="{{""}}" hidden>
@endif

<label for="">נוצר על ידי</label>
<select class="form-control" id="created_by" name="created_by" hidden>
  <option value="{{$user[0]->id}}">{{$user[0]->name}} | {{$user[0]->email}}</option>
</select>

<label for="">קטגוריית אב</label>
<select class="form-control" id="parent_id" name="parent_id">
  <option value="0">- - ללא קטגוריית אב - -</option>
  @include('user.categories.partials.categories', ['categories' => $categories])
</select>
<hr />

<input class="btn btn-outline-dark" type="submit" value="שמור">
