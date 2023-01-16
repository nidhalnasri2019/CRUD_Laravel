<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud with eloquent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <h1>All posts</h1>
  <a type="button" class="btn btn-success"  href="posts/create">create post</a>
  <a type="button" class="btn btn-primary"  href="posts/show">history</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
     
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>
          <a type="button" class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">edit</a>
         
          <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @method('DELETE')
            @csrf
              <button type='submit' class="btn btn-danger" >delete</button>
          </form>
     </td>
    </tr>
    @endforeach()
    
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>