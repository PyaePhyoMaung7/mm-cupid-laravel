<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form action="{{ route('login') }}" method="POST" style="width: 500px; margin: 0 auto;">
        @csrf
        <label for="email"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" value="{{ old('username') }}">
        @if($errors->has('username'))
            <span style="color: red;">{{$errors->first('username')}}</span><br/>
        @endif

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password">
        @if($errors->has('password'))
            <span style="color: red;">{{$errors->first('password')}}</span><br/>
        @endif

        <button type="submit" class="registerbtn">Login</button>
    </form>
</div>

</body>
</html>
