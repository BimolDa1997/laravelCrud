<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/edit-post/{{$post->id}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="title" placeholder="Title" value="{{$post->title}}" required>
        <input type="text" name="body" placeholder="Body" value="{{$post->body}}" required><br>
        <button type='submit'>Save Changes</button>
    </form>
</body>
</html>