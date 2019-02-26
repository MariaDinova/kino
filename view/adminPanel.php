<?php
$movies = \model\dao\AdminDao::getAllMovies();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="view/css/adminPanelCss.css">
</head>
<body>
<h1>Admin Panel</h1>
    <div class="panels">
        <h2>Insert Movie</h2>
        <form action="?target=admin&action=insertMovie" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Movie Name</td>
                    <td><input type="text" name="movie_name"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="desc" id="textarea" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>Movie Type</td>
                    <td>
                        <select name="movie_type" id="movie_type">
                            <option value="1">Action</option>
                            <option value="2">Animation</option>
                            <option value="3">Comedy</option>
                            <option value="4">Drama</option>
                            <option value="5">Adventure</option>
                            <option value="6">Horror</option>
                            <option value="7">Romance</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Trailer</td>
                    <td><input type="text" name="trailer"></td>
                </tr>
                <tr>
                    <td>Age Restriction</td>
                    <td>
                        <select name="age_rest" id="">
                            <option value="1">B-Kids</option>
                            <option value="2">C-Kids up to 16 years</option>
                            <option value="3">D-Adults over 18 years</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input name="price" type="number"></td>
                </tr>
                <tr>
                    <td>Duration</td>
                    <td><input name="duration" type="number"></td>
                </tr>
                <tr>
                    <td>Slot</td>
                    <td><input name="slot" type="number"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="insertMovie" value="Insert Movie"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="panels">
        <form action="?target=admin&action=insertRestriction" method="post">
            <h2>Insert Age Restriction</h2>
            <table>
                <tr>
                    <td>Insert Restriction</td>
                    <td><input type="text" name="restriction"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="insertRestriction" value="Insert Restriction"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="panels">
        <h2>Movies</h2>
        <table id="admin-movies-list">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Image</th>
                <th>Trailer</th>
                <th>Restriction</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Slot</th>
                <th>Delete</th>
            </tr>
            <?php foreach($movies as $movie) {  ?>
                <tr>
                    <td><?php echo $movie->getName();?></td>
                    <td><?php echo $movie->getDescription();?></td>
                    <td><?php echo $movie->getMovieType();?></td>
                    <td>
                        <img width="100px" src="<?php echo $movie->getImageUri();?>" alt="Film-image">
                    </td>
                    <td>
                        <iframe src="<?php echo $movie->getTrailerUri();?>"></iframe>
                    </td>
                    <td><?php echo $movie->getAgeRest();?></td>
                    <td><?php echo $movie->getPrice();?></td>
                    <td><?php echo $movie->getDuration();?></td>
                    <td><?php echo $movie->getSlot();?></td>
                    <td>
                        <form action="?target=admin&action=deleteMovie" method="post">
                            <input type="hidden" name=movieId" value="<?php echo $movie->getMovieId(); ?>">
                            <input type="submit" name="deleteMovie" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>


</body>
</html>

