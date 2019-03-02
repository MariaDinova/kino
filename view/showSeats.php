<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet/less" href="<?php BASE_PATH ?>css/style.less" type="text/css" >
    <script src="<?php BASE_PATH ?>js/less.js" ></script>

</head>
<body>


<form id="seats" action="<?php BASE_PATH ?>?target=tickets&action=buyTickets" method="post">
    <input type="hidden" name="programId" value="<?php echo $_GET["id"] ?>">
    <input type="hidden" name="slot" value="<?php echo $_GET["slot"] ?>">
    <input type="hidden" name="day" value="<?php echo $_GET["day"] ?>">
    <div class="checkbox">
    <table>
        <?php
//TODO make it smarty
        for ($i = 0; $i < $rows; $i++){
            ?>
            <tr>
                <?php
                for ($j = 0; $j < $seatsPerRow; $j++){
                    if(isset($takenSeats[$i][$j])){
                        echo '<td><input type="checkbox" id="checkbox_'.$i.'_'.$j.'"><label class="taken" for="checkbox_'.$i.'_'.$j.'"></label></td>';
                    }
                    else {
                        echo '<td><input type="checkbox" name="seat[]" id="checkbox_'.$i.'_'.$j.'" value="'.$i.':'.$j.'"><label for="checkbox_'.$i.'_'.$j.'"></label></td>';
                    }
                }
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
    <br />
    <br/>
    <input type="submit" name="buyTicket" value="Buy ticket">
</form>
</body>
</html>
