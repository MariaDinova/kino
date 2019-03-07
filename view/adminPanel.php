<?php
if($_SESSION["user"]->getIsAdmin() == 0){
    header("Location: ".BASE_PATH);
}else{
    include_once URI . "view/adminPanel.php";
}
$tickets = \model\dao\AdminDao::getAllTickets();
$movies = \model\dao\AdminDao::getAllMovies();
$movie_types = \model\dao\MovieCategoryDao::getAll();
$restrictions = \model\dao\AgeRestrictionDao::getAll();
$halls = \model\dao\AdminDao::getAllHalls();
$hall_types = \model\dao\AdminDao::getAllHallTypes();
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
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
<br>
<img id="logo" src="./img/logo.png" alt="" class="mx-auto d-block">
<br>

<div class="container">
    <h1>Admin Panel</h1>
    <h2>Welcome, <?php echo $_SESSION["user"]->getFirstName(); ?></h2>
    <div>
        <form action="?target=admin&action=logout" method="post">
            <input type="submit" name="logout" value="Log out">
        </form>
    </div>
    <br>

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
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#editMovie">Edit Movie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#boughtTickets">Bought Tickets</a>
        </li>

    </ul>
    <div class="tab-content">

        <div id="movie-insert" class="container tab-pane fade">
            <h2>Insert Movie</h2>
            <br>
            <form action="?target=admin&action=insertMovie" method="post" enctype="multipart/form-data">
                <table class="table-bordered">
                    <tr>
                        <td class="text-warning">Movie Name</td>
                        <td><input type="text" name="movie_name" required></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Description</td>
                        <td><textarea name="desc" id="textarea" cols="30" rows="10" required></textarea></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Movie Type</td>
                        <td>
                            <select name="movie_type" id="movie_type">
                                <?php foreach($movie_types as $movie_type){  ?>
                                <option value="<?php echo $movie_type->getCategoryId(); ?>"><?php echo $movie_type->getMovieType(); ?></option>
                             <?php   }  ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-warning">Image</td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Trailer</td>
                        <td><input type="text" name="trailer" required></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Age Restriction</td>
                        <td>
                            <select name="age_rest" id="" required>
                                <?php foreach ($restrictions as $restriction)  {    ?>
                                <option value="<?php echo $restriction->getAgeRestId();?>"><?php echo $restriction->getRestriction();?></option>
                                <?php }   ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-warning">Price</td>
                        <td><input name="price" type="number" min="0", max="50" required></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Duration</td>
                        <td><input name="duration" type="number" min="0" required></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Slot</td>
                        <td><input name="slot" type="number" min="0" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-warning" type="submit" name="insertMovie" value="Insert Movie"></td>
                    </tr>
                </table>
            </form>
        </div>

        <div id="insertInDB" class="container tab-pane fade">
            <br>
            <form action="?target=admin&action=insertRestriction" method="post">
                <table class="table-bordered">
                    <tr>
                        <td colspan="2">Restrictions: <?php foreach ($restrictions as $restriction) {
                                echo $restriction->getRestriction() . ", ";
                            }?></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Insert Restriction</td>
                        <td><input type="text" name="restriction" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-warning" type="submit" name="insertRestriction" value="Insert Restriction"></td>
                    </tr>
                </table>
            </form>
            <br><br>
            <form action="?target=admin&action=insertHallType" method="post">
                <table class="table-bordered">
                    <tr>
                        <td colspan="2">Hall Types: <?php foreach ($hall_types as $hall_type) {
                               echo $hall_type->getType() . ", ";
                            }?></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Insert Hall Type</td>
                        <td><input type="text" name="hall_type" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-warning" type="submit" name="insertHallType" value="Insert Hall Type" placeholder=" like 2D, 3D, IMAX.."></td>
                    </tr>
                </table>
            </form>
            <br>
            <form action="?target=admin&action=insertPeriod" method="post">
                <table class="table-bordered">
                    <tr><th class="text-warning">Projection period</th></tr>
                    <tr>
                        <td colspan="2">Periods:
                           <?php foreach ($periods as $period){
                               echo $period->getStartDate() . "--" . $period->getEndDate() . " , ";
                           } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-warning">Insert Projection start date</td>
                        <td><input type="date" name="start_date" required></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Insert Projection end date</td>
                        <td><input type="date" name="end_date" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-warning"><input class="btn btn-warning" type="submit" name="insertPeriod" value="Insert Period"></td>
                    </tr>
                </table>
            </form>
        </div>

        <div  id="movie_list" class="container tab-pane active">
            <h2>Movies</h2>
            <br>
            <table id="admin-movies-list" class="table-bordered">
                <tr>
                    <th class="text-warning">Name</th>
                    <th class="text-warning">Description</th>
                    <th class="text-warning">Type</th>
                    <th class="text-warning">Image</th>
                    <th class="text-warning">Trailer</th>
                    <th class="text-warning">Restriction</th>
                    <th class="text-warning">Price</th>
                    <th class="text-warning">Duration</th>
                    <th class="text-warning">Slot</th>
                    <th class="text-warning">Delete</th>
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
                            <iframe width="250" height="150" src="<?php echo $movie->getTrailerUri(); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </td>
                        <td><?php echo $movie->getAgeRest(); ?></td>
                        <td><?php echo $movie->getPrice(); ?></td>
                        <td><?php echo $movie->getDuration(); ?></td>
                        <td><?php echo $movie->getSlot(); ?></td>
                        <td>
                            <form action="?target=admin&action=deleteMovie" method="post">
                                <input type="hidden" name="movieId" value="<?php echo $movie->getMovieId(); ?>">
                                <input type="submit" name="deleteMovie" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div id="editMovie" class="container tab-pane fade">
            <h4>Edit Movie</h4>
            <?php foreach ($movies as $item) { ?>
                <form action="?target=admin&action=updateMovie" method="post" class="float-left edit_movies">
                    <table class="table-bordered">
                        <tr>
                            <td class="text-warning">Movie name</td>
                            <td><input  class="form-control" type="text" name="name" value="<?php echo $item->getName();?>"></td>
                        </tr>
                        <tr>
                            <td class="text-warning">Movie description</td>
                            <td><input class="form-control" type="text" name="description" value="<?php echo $item->getDescription();?>"></td>
                        </tr>
                        <tr>
                            <td class="text-warning">Movie type</td>
                            <td>
                                <select  class="form-control" name="movie_type" id="movie_type">
                                    <?php foreach($movie_types as $movie_type){  ?>
                                        <option value="<?php echo $movie_type->getCategoryId(); ?>"><?php echo $movie_type->getMovieType();?></option>
                                    <?php   }  ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-warning">Movie trailer</td>
                            <td><input  class="form-control" type="text" name="trailer" value="<?php echo $item->getTrailerUri();?>"></td>
                        </tr>
                        <tr>
                            <td class="text-warning">Age restriction</td>
                            <td>
                                <select name="age_rest" id="" class="form-control">
                                    <?php foreach ($restrictions as $restriction){ ?>
                                        <option value="<?php echo $restriction->getAgeRestId();?>"><?php echo $restriction->getRestriction();?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-warning">Price</td>
                            <td><input  class="form-control" type="number" name="price" value="<?php echo $item->getPrice();?>"></td>
                        </tr>
                        <tr>
                            <td class="text-warning">Movie duration</td>
                            <td><input class="form-control" type="number" name="duration" value="<?php echo $item->getDuration();?>"></td>
                        </tr>
                        <tr>
                            <td class="text-warning">Slot</td>
                            <td><input class="form-control" type="text" name="slot" value="<?php echo $item->getSlot();?>"></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="movie_id" value="<?php echo $item->getMovieId()?>">
                                <input type="submit" value="Edit Movie" name="updateMovie" class="btn btn-warning"></td></tr>
                    </table>
                </form>
            <?php } ?>
        </div>

        <div  id="insertProgram" class="container tab-pane fade">
            <h2>Insert Program</h2>
            <br>
            <form action="?target=admin&action=insertProgram" method="post">
                <table class="table-bordered">
                    <tr>
                        <td class="text-warning">Select Hall</td>
                        <td><select name="hall_id" id="">
                            <?php foreach ($halls as $hall){  ?>
                                <option value="<?php echo $hall->getHallId();?>"> <?php echo $hall->getHallId() . "-" . $hall->getHallType(). "-" . $hall->getCinema();?></option>
                            <?php  }  ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-warning">Select Movie</td>
                        <td>
                            <select name="movie_id" id="">
                                <?php foreach ($movies as $movie){  ?>
                                    <option value="<?php echo $movie->getMovieId(); ?>"> <?php echo $movie->getName();?></option>
                                <?php  }  ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-warning">Hour Start</td>
                        <td><input type="time" name="hourStart" required></td>
                    </tr>
                    <tr>
                        <td class="text-warning">Period</td>
                        <td>
                            <select name="period_id" id="">
                                <?php foreach ($periods as $period){ ?>
                                    <option value="<?php echo $period->getPeriodId(); ?>"> <?php echo $period->getStartDate() . " - " . $period->getEndDate();?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-warning">Screening</td>
                        <td>
                            <input type="number" name="screening" min="0">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="btn btn-warning" type="submit" name="insertProgram" value="Insert Program">
                        </td>
                    </tr>
                </table>

            </form>
        </div>

        <div id="boughtTickets" class="container tab-pane fade">
            <h2>Bought Tickets</h2>
            <br>
            <table class="table-bordered">
                <tr>
                    <th class="text-warning">Name</th>
                    <th class="text-warning">Bought Tickets</th>
                    <th class="text-warning">Ticket Price</th>
                    <th class="text-warning">Cinema</th>
                    <th class="text-warning">Movie</th>
                    <th class="text-warning">Hall</th>
                    <th class="text-warning">Cancel Reservation</th>
                </tr>
                <?php foreach ($tickets as $ticket) { ?>
                    <tr>
                        <td><?php echo $ticket["name"]; ?></td>
                        <td><?php echo $ticket["tickets"]; ?></td>
                        <td><?php echo $ticket["ticket_price"]; ?></td>
                        <td><?php echo $ticket["cinema_name"]; ?></td>
                        <td><?php echo $ticket["movie"]; ?></td>
                        <td><?php echo $ticket["hall_id"]; ?></td>
                        <td >
                            <form action="?target=admin&action=cancelReservation" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $ticket["user_id"]; ?>">
                                <input type="submit" class="btn btn-danger" name="cancelReservation" value="Cancel Reservation">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>

    </div>
</div>


</body>
</html>

