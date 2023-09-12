<?php
    session_start();

    if (isset($_POST['check'])) {
        
        
        // GET an array of 5 Random numbers
        $randNumbers = array();
        for ($i=0;$i<5;++$i) {
            $n = mt_rand(0,12);
            array_push($randNumbers,$n);
        }


        // GET an array of 5 selected options
        $selectedNumbers = array();
        for ($i=0;$i<5;++$i) {
            $num = $_POST[strval($i+1)];
            array_push($selectedNumbers,$num);
        }

        // remove duplicates in the answers
        $selectedNumers = array_unique($selectedNumbers); 

        // Present the numbers generated
        echo "We generate the numbers: ";
        foreach($randNumbers as $randNum){
            echo $randNum . ",\n";
        }
        echo "<br><br>";

        // Display the numbers selected
        echo "You guessed the numbers: ";
        foreach($selectedNumbers as $selectedNum){
            echo $selectedNum . ",\n";
        }
        echo "<br><br>";

        // COMPARE 2 arrays
        $result = array_diff($randNumbers,$selectedNumbers);
        $count = count($result);
        
        
        if ($count == 0) {

            echo "Result: You guessed <b>all</b> the numbers we generated!</br>";
            echo "You're an <b>EXCELLENT</b> guesser!";
        }

        else if ($count == 5) {

            echo "Result : You guessed <b>none</b> of number we generated!</br>";
            echo "You're an <b>APPRENTICE</b> guesser! Try again!";
        }

        else {
            $numOfCorrects = (5 - $count);
            echo "Result : You guessed <b>$numOfCorrects</b> of the numbers we generated!</br>";
            echo "You're an <b>GOOD</b> guesser!";
        }

        echo "<br><br><link rel='stylesheet' type='text/css' href='styles.css'>
        <p>
        <a href='game.php'><input name='game' type='button'class='btn' value= 'Play Again'/></a>";
    }
    
    
?>