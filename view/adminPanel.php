<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>
<body>
    <div>
        <form action="?target=admin&action=insertMovie" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Movie Name</td>
                    <td><input type="text" name="movie_name"></td>
                </tr>
                <tr>
                    <td>Descrioption</td>
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


</body>
</html>

