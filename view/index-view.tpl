<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

{if $isLoggedIn}
    <a href="{$BASE_PATH}?target=user&action=logout">Logout</a><br>
{else}
    <a href="{$BASE_PATH}?target=user&action=register">Register now</a> <br>
    <a href="{$BASE_PATH}?
    target=user&action=login">Log in</a><br>
{/if}

{include file="helpers/headerLinks.tpl"}

</body>
</html>
