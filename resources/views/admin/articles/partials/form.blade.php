<label for="">סטטוס</label>
<select class="form-control" id="published" name="published">
  @if (isset($article->id))
    <option value="0" @if ($article->published == 0) selected="" @endif>לא מפורסם</option>
    <option value="1" @if ($article->published == 1) selected="" @endif>מפורסם</option>
  @else
    <option value="0">לא מפורסם</option>
    <option value="1">מפורסם</option>
  @endif
</select>

<label for="">שם גמח</label>
@if (isset($article->title))
  <input type="text" class="form-control" id="title" name="title" placeholder="שם גמח"
  value="{{$article->title}}" required>
@else
  <input type="text" class="form-control" id="title" name="title" placeholder="שם גמח"
  value="{{""}}" required>
@endif

<label for="">slug</label>
@if (isset($article->slug))
  <input type="text" class="form-control" id="slug" name="slug" placeholder="שדה אוטומטי"
  value="{{$article->slug}}" readonly>
@else
  <input type="text" class="form-control" id="slug" name="slug" placeholder="שדה אוטומטי"
  value="{{""}}" readonly>
@endif

<label for="">נוצר על ידי</label>
<select class="form-control" id="created_by" name="created_by" disabled>
  <option value="{{$user[0]->id}}">{{$user[0]->name}} | {{$user[0]->email}}</option>
</select>

<label for="">שיוך לקטגוריה</label>
<select class="form-control" name="categories[]" multiple="">
  @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="">תקציר פעילות הגמח</label>
@if (isset($article->description_short))
  <textarea class="form-control" id="description_short" name="description_short">{{$article->description_short}}</textarea>
@else
  <textarea class="form-control" id="description_short" name="description_short">{{""}}</textarea>
@endif

<label for="">פעילות הגמח בתאור נרחב</label>
@if (isset($article->description))
  <textarea class="form-control" id="description" name="description">{{$article->description}}</textarea>
@else
  <textarea class="form-control" id="description" name="description">{{""}}</textarea>
@endif

<hr />

<label for="">תגיות (Meta Tag)</label>
@if (isset($article->meta_title))
  <input type="text" class="form-control" name="meta_title" placeholder="תגיות" value="{{$article->meta_title}}">
@else
  <input type="text" class="form-control" name="meta_title" placeholder="תגיות" value="{{""}}">
@endif

<label for="">תאור תגיות (Meta description)</label>
@if (isset($article->meta_description))
  <input type="text" class="form-control" name="meta_description" placeholder="תאור תגיות" value="{{$article->meta_description}}">
@else
  <input type="text" class="form-control" name="meta_description" placeholder="תאור תגיות" value="{{""}}">
@endif

<label for="">מילות מפתח (Meta keyword)</label>
@if (isset($article->meta_keyword))
  <input type="text" class="form-control" name="meta_keyword" placeholder="מילות מפתח - חלוקה באמצעות סימן פסיק" value="{{$article->meta_keyword}}">
@else
  <input type="text" class="form-control" name="meta_keyword" placeholder="מילות מפתח - חלוקה באמצעות סימן פסיק" value="{{""}}">
@endif
<hr />

<input class="btn btn-outline-dark" type="submit" value="שמור">
