<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
    <form  method="post">
        @csrf
      user  <input type="text" name="user">
       pass  <input type="password" name="pass">
        <input type="submit" value="log" name="LogIn">
    </form>
</body>
</html>