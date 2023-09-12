<!-- GAME FORM -->

<!DOCTYPE html>
<html>
    <head>
        <title>Kids Guessing Game</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
      <div class="moving-background">
        <div class="header">
          <h2>GUESSING GAME</h2>
        </div>


        <form method="post" action="game_action.php">
            
            <p>The System will generate 5 <b>random</b> numbers<br><b>Your mission:</b><br>&emsp;&emsp;&emsp; Select 5 different number bettweenn 0 to 12 to guess them.<br><br></p>   
            
            <!-- Select Option -->
            
            <?php
                
                for($i=0;$i<5;++$i) {
                    
                    $optName = strval($i+1); 

                    // to name the <select name = "..">
                    // ".." will be ($i + 1)
                    // names of option fields will be "1", "2", "3", "4". "5"
                    echo "<select class = 'custom-select' ";
                    echo "name = $optName>";

                    // to generate the value from 0 t0 12
                    for($n=0;$n<13;++$n) {
                        echo "<option>$n</option>";
                    } 
                    
                    echo "</select>"; 
                }
                
                echo "<br><br>";
            ?>
            
            <!-- Buttons -->
            <div class="details">
            <button type="submit" class="btn" name="check">Check</button>
            </div>
            <p>
                For Log-Out
                <a href="login_form.php"><input name="user_login" type="button"class="btn" value= "Logout"/></a>
                <br/>
               
            </p>
        
            
        </form>
      </div>

      
        

        
        
    </body>
</html>

