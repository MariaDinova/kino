<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Please Login</title>
</head>
<body>
<form action="<?php BASE_PATH ?>?target=user&action=login" method="post">
    <table>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" placeholder="your email">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" placeholder="your password">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="Log in">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
