<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="margin: auto; border:1px solid #000;">
        @auth
        <h1>You are logged in.</h1>
        

          <form id='post-form' action="/new_post" method='post'>
            @csrf
          <input type="text" name="title" placeholder="Title" required>
          <input type="text" name="body" placeholder="Body" required>
          <button type='submit'>Create Post</button>
        </form>

        <form id='login-form' action="/logout" method='post'>
          @csrf
          <button type='submit'>Logout</button>
          
        </form>

        @else
<form id='login-form' action="/login" method='post'>
    @csrf
  <input type="text" name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type='submit'>Login</button>
</form>
<form id='register-form' action="/register" method='post'>
    @csrf
  <input type="text" name="name" placeholder="Username">
  <input type="email" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <input type="password" name="repassword" placeholder="Re Password">
  <button type='submit'>Register</button>
  <label for='form-switch'>Already Member ? Sign In Now..</label>
</form>


@endauth
    </div>
</body>
</html>