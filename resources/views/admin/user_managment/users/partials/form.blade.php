@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

<label for="">שם משתמש</label>
@if (isset($user->name))
  <input type="text" class="form-control" id="name" name="name" placeholder="שם משתמש"
  value="@if(old('name')){{old('name')}}@else{{$user->name}}@endif" required>
@else
  <input type="text" class="form-control" id="name" name="name" placeholder="שם משתמש"
  value="@if(old('name')){{old('name')}}@else{{""}}@endif" required>
@endif

<label for="">כתובת דואר אלקטרוני</label>
@if (isset($user->email))
  <input type="email" class="form-control" id="email" name="email" placeholder="כתובת דואר אלקטרוני"
  value="@if(old('email')){{old('email')}}@else{{$user->email}}@endif" required>
@else
  <input type="email" class="form-control" id="email" name="email" placeholder="כתובת דואר אלקטרוני"
  value="@if(old('email')){{old('email')}}@else{{""}}@endif" required>
@endif

<label for="">סיסמה</label>
  <input type="password" class="form-control" id="password" name="password" placeholder="סיסמה" required>

<label for="">אימות סיסמה</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="אימות סיסמה" required>

<label for="">תפקיד</label>
<select class="form-control" id="role" name="role">
  @if (isset($user->role->role))
    <option value=2 @if ($user->role->role == 0) selected="" @endif>משתמש רגיל</option>
    <option value=1 @if ($user->role->role == 1) selected="" @endif>מנהל</option>
  @else
    <option value=2>משתמש רגיל</option>
    <option value=1>מנהל</option>
  @endif
</select>
<hr />

<input class="btn btn-outline-dark" type="submit" value="שמור">
