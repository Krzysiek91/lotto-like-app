<!DOCTYPE html>
<html>
    <head>
        <title>LOTTERY</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>

    <body>
    <div class="container">

        <div class="col-xs-12 text-center well">
            <h1>Lottery</h1>
        </div>

        <div class='col-md-6 col-sm-12 well'>

        <h3>Draw six numbers</h3>

        <form action="" method="post" style="font-family: monospace; margin-top: 20px;">
            <?php
            // chosen numbers by player
            for ($i = 1; $i < 50; $i++) {
                //add space after '-> ', to make single-digit numbers to be in one column with double digits
                if ($i < 10) {
                    echo $i . '-> ' . '<input type="checkbox" name="chosenNumbers[]" value="' . $i . '" style="position:relative; top:4px; margin-right: 20px;">';
                    if ($i % 7 == 0) {
                        echo "<br>";
                    }
                } else {
                    echo $i . '->' . '<input type="checkbox" name="chosenNumbers[]" value="' . $i . '" style="position:relative; top:4px; margin-right: 20px;">';
                    if ($i % 7 == 0) {
                        echo "<br>";
                    }
                }
            }
            ?>

            <button class="btn btn-info" style="margin-top: 15px">Send your numbers</button>
        </form>
        </div>

        <div class='col-md-5 col-md-offset-1 col-sm-12 well'>
            <h3>Result:</h3>

        <?php
        // Getting POST values
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['chosenNumbers']) && count($_POST['chosenNumbers'])==6){

                $chosenNumbers = $_POST['chosenNumbers'];

                //numbers chosen by lottery
                $rangeOfNumbers = range(1, 49);
                shuffle($rangeOfNumbers);
                $lotteryNumbers = array_slice($rangeOfNumbers, 0, 6);

                //compering player numbers with lottery numbers
                $matchingNumbers = 0;
                foreach ($chosenNumbers as $value){
                    if(in_array($value, $lotteryNumbers)){
                        $matchingNumbers++;
                    }
                }
                //result
                echo "<h4>Your Numbers: </h4>";
                echo implode(', ', $chosenNumbers);

                echo "<h4>Lottery Numbers: </h4>";
                echo implode(', ', $lotteryNumbers);

                echo "<h4>Number of hits: $matchingNumbers </h4>";

            }else{
                echo '<h5 style="color: red;">you have selected wrong quantity of numbers</h5>';
            }
        }
        ?>
        </div>
    </div>
    </body>
</html>


<?php
// other way (first idea) of compering player numbers with lottery numbers
//$matchingNumbers = 0;
//for ($i = 0; $i < 6; $i++) {
//for ($j = 0; $j < 6; $j++) {
//  if ($chosenNumbers[$i] == $lotteryNumbers[$j]) {
//     $matchingNumbers++;
//  }
// }
//  }