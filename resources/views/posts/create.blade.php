<h1>create view</h1>
<!-- @if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
       <li>{{$error}}</li>
    @endforeach   
    </ul> 
</div>
@endif -->
<form action="{{route('posts.store')}}" method="post">
    @csrf
<input id ="text" type="text" name="title" class="@error('title') is-invalid @enderror" value="{{old('title')}}"  placeholder="enter title">
@error('title')
<div class="alert alert-danger">{{$message}}</div>
@enderror
<br><br>
<input id ="description" type="text" name="description" class="@error('description') is-invalid @enderror" value="{{old('description')}}" placeholder="enter description">
@error('description')
<div class="alert alert-danger">{{$message}}</div>
@enderror<br><br>
<button type="submit">submit</button>
</form>