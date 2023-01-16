<h1>edit view</h1>
<form action="{{route('posts.update',$post->id)}}" method="post">
    @method('PUT')
    @csrf
<input type="text" name="title" value='{{$post->title}}'/><br><br>
<input type="text" name = "description" value='{{$post->description}}'/><br><br>
<button type="submit">update</button>
</form>