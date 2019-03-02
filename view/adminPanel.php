<?php
$movies = \model\dao\AdminDao::getAllMovies();
$movie_types = \model\dao\MovieCategoryDao::getAll();
$restrictions = \model\dao\AgeRestrictionDao::getAll();
$halls = \model\dao\AdminDao::getAllHalls();
$cinemas = \model\dao\CinemaDao::getAll();
$periods= \model\dao\PeriodsDao::getAllPeriods();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="view/css/adminPanelCss.css">
</head>
<body>

<div class="container">
    <h1>Admin Panel</h1>
    <br><br>
    <div>
        <form action="?target=admin&action=logout" method="post">
            <input type="submit" name="logout" value="Log out">
        </form>
    </div>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item active">
            <a class="nav-link" data-toggle="tab" href="#movie_list">List all movies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#movie-insert">Insert Movie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#insertInDB">Insert In DB</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#insertProgram">Insert Program</a>
        </li>

    </ul>
    <div class="tab-content">
        <div id="movie-insert" class="container tab-pane fade">
            <h2>Insert Movie</h2>
            <br>
            <form action="?target=admin&action=insertMovie" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Movie Name</td>
                        <td><input type="text" name="movie_name" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="desc" id="textarea" cols="30" rows="10" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Movie Type</td>
                        <td>
                            <select name="movie_type" id="movie_type">
                                <?php foreach($movie_types as $movie_type){  ?>
                                <option value="<?php echo $movie_type->getCategoryId(); ?>"><?php echo $movie_type->getMovieType(); ?></option>
                             <?php   }  ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td>Trailer</td>
                        <td><input type="text" name="trailer" required></td>
                    </tr>
                    <tr>
                        <td>Age Restriction</td>
                        <td>
                            <select name="age_rest" id="" required>
                                <?php foreach ($restrictions as $restriction)  {    ?>
                                <option value="<?php echo $restriction->getAgeRestId();?>"><?php echo $restriction->getRestriction();?></option>
                                <?php }   ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input name="price" type="number" min="0", max="50" required></td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td><input name="duration" type="number" min="0" max="5" required></td>
                    </tr>
                    <tr>
                        <td>Slot</td>
                        <td><input name="slot" type="number" min="0" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="insertMovie" value="Insert Movie"></td>
                    </tr>
                </table>
            </form>
        </div>

        <div id="insertInDB" class="container tab-pane fade">
            <form action="?target=admin&action=insertRestriction" method="post">
                <h2>Insert Age Restriction</h2>
                <br><br>
                <table>
                    <tr>
                        <td>Insert Restriction</td>
                        <td><input type="text" name="restriction" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="insertRestriction" value="Insert Restriction" placeholder="like A, C, D"></td>
                    </tr>
                </table>
            </form>
            <br>
            <form action="?target=admin&action=insertHallType" method="post">
                <table>
                    <tr>
                        <td>Insert Hall Type</td>
                        <td><input type="text" name="hall_type" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="insertHallType" value="Insert Hall Type" placeholder=" like 2D, 3D, IMAX.."></td>
                    </tr>
                </table>
            </form>
            <br>
            <form action="?target=admin&action=insertPeriod" method="post">
                <table>
                    <tr><th>Projection period</th></tr>
                    <tr>
                        <td>Insert Projection start date</td>
                        <td><input type="date" name="start_date" required></td>
                    </tr>
                    <tr>
                        <td>Insert Projection end date</td>
                        <td><input type="date" name="end_date" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="insertPeriod" value="Insert Period" placeholder=" like 2D, 3D, IMAX.."></td>
                    </tr>
                </table>
            </form>
        </div>

        <div  id="movie_list" class="container tab-pane active">
            <h2>Movies</h2>
            <br>
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
                <?php foreach ($movies as $movie) { ?>
                    <tr>
                        <td><?php echo $movie->getName(); ?></td>
                        <td><?php echo $movie->getDescription(); ?></td>
                        <td><?php echo $movie->getMovieType(); ?></td>
                        <td>
                            <img width="100px" src="<?php echo $movie->getImageUri(); ?>" alt="Film-image">
                        </td>
                        <td>
                            <iframe width="450" height="225" src="<?php echo $movie->getTrailerUri(); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </td>
                        <td><?php echo $movie->getAgeRest(); ?></td>
                        <td><?php echo $movie->getPrice(); ?></td>
                        <td><?php echo $movie->getDuration(); ?></td>
                        <td><?php echo $movie->getSlot(); ?></td>
                        <td>
                            <form action="?target=admin&action=deleteMovie" method="post">
                                <input type="hidden" name="movieId" value="<?php echo $movie->getMovieId(); ?>">
                                <input type="submit" name="deleteMovie" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div  id="insertProgram" class="container tab-pane fade">
            <h2>Insert Program</h2>
            <br>
            <form action="?target=admin&action=insertProgram" method="post">
                <table>
                    <tr>
                        <td>Select Hall</td>
                        <td><select name="hall_id" id="">
                            <?php foreach ($halls as $hall){  ?>
                                <option value="<?php echo $hall->getHallId();?>"> <?php echo $hall->getHallId() . "-" . $hall->getHallType(). "-" . $hall->getCinema();?></option>
                            <?php  }  ?>
                        </td>
                        </select>
                    </tr>
                    <tr>
                        <td>Select Movie</td>
                        <td><select name="movie_id" id="">
                                <?php foreach ($movies as $movie){  ?>
                                    <option value="<?php echo $movie->getMovieId(); ?>"> <?php echo $movie->getName();?></option>
                                <?php  }  ?>
                        </td>
                        </select>
                    </tr>
                    <tr>
                        <td>Hour Start</td>
                        <td><input type="time" name="hourStart"></td>
                    </tr>
                    <tr>
                        <td>Period</td>
                        <td>
                            <select name="period_id" id="">
                                <?php foreach ($periods as $period){ ?>
                                    <option value="<?php echo $period->getPeriodId(); ?>"> <?php echo $period->getStartDate() . " - " . $period->getEndDate();?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Screening</td>
                        <td>
                            <input type="number" name="screening" min="0">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="insertProgram" value="Insert Program">
                        </td>
                    </tr>
                </table>

            </form>
        </div>

    </div>
</div>


</body>
</html>

