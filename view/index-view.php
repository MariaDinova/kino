<?php

//TODO buttons for: cinemas - on click show all cinemas with their location,
// login - show login page with link to register page,
// programs - show all cinemas and when choose some -> show program for it
//TODO slider with 5 movie images with buttons to buy tickets on every image
//TODO 3 search field - for cinema, movie and date and 1 field to input movie and search for it.
// Can't enter next field if not add something in previous. Date must be calendar with active future days for choosen movie
//TODO list all movie images if hover on image show 3 buttons - for movie info, trailer and add to favorite movies
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>
<body>


<?php

if(!isset($_SESSION["user"])){ ?>

    <a href="<?php echo BASE_PATH ?>?target=user&action=register">Register now</a> <br>
    <a href="<?php echo BASE_PATH ?>?target=user&action=login">Log in</a><br>

<?php }
else { ?>

    <a href="<?php echo BASE_PATH?>?target=user&action=logout">Logout</a><br>

<?php }?>

<a href="<?php echo BASE_PATH ?>?target=cinema&action=list">List all cinema</a> <br>
<a href="<?php echo BASE_PATH ?>?target=movieCategory&action=list">List all movie categories</a> <br>
<a href="<?php echo BASE_PATH ?>?target=ageRestriction&action=list">List all restrictions</a> <br>
<a href="<?php echo BASE_PATH ?>?target=halls&action=list">List all halls</a> <br>
<a href="<?php echo BASE_PATH ?>?target=movie&action=list">List all movies</a> <br>

</body>
</html>
