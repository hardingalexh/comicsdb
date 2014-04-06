<?php

require "../connect/dbconnect.php";


    if (isset($_POST['name'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);        
        $query = 'insert into alias (name) values ("'.$name.'")';
        if ($conn->query($query) === false) {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
        
        } else {
            $last_inserted_id = $conn->insert_id;
            	
            echo'<h1>Submission Successful</h1>';
            echo'<p>View entry for ' . $title . ' here: </p>';
            echo '<p><a href="../alias.php?id=' . $last_inserted_id . '">'.$name.'</a></p>';
        }
              

    
    
    } else {
        ?>
        <h1>New Alias</h1>
        <p>An alias is a character's name as a hero or villain. To add a new hero or villain's real character identity, see <a href="newchar.php">create new character</a>. <b>PLEASE search the database for your alias before adding to avoid duplicate entries.</b>
    <form name='alias' action='newalias.php' method='post'>
        Name: <input type='text' name='name'><br />
            <input type='submit' value='submit'> <?php } ?>
        
        
