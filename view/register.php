<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


<form action="<?php BASE_PATH ?>?target=user&action=register" method="post">

    <label for="firstName">First name: </label>
    <input type="text" name="firstName" id="firstName"> <br>

    <label for="lastName">Last name: </label>
    <input type="text" name="lastName" id="lastName"> <br>

    <label for="email">E-mail: </label>
    <input type="text" name="email" id="email"> <br>

    <label for="password">Password: </label>
    <input type="password" name="password" id="password"> <br>

    <label for="age">Age: </label>
    <input type="number" name="age" id="age"> <br>

    <input type="submit" name="register" value="Register now"><br>


</form>
</body>
</html>