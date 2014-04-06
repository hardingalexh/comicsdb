<?php

require "../connect/dbconnect.php";


    if (isset($_POST['fname'])){
        /*inserting info from POST */
        if (isset($_POST['fname'])){
            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            } else {
                $fname = 'NULL';
        
            }
       if (isset($_POST['mname'])){     
           $mname = mysqli_real_escape_string($conn, $_POST['mname']);
        } else {
            $mname = 'NULL';
        
        }
        if (isset($_POST['lname'])){    
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        } else {
            $lname = 'NULL';
        }
        $query = 'insert into characters (fname, mname, lname) values ("'.$fname.'", "' .$mname.'", "'.$lname.'")';
        if ($conn->query($query) === false) {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
        
        } else {
            $last_inserted_id = $conn->insert_id;
            
            echo'<h1>Submission Successful</h1>';
            echo'<p>View entry for ' . $title . ' here: </p>';
            echo '<p><a href="../character.php?id=' . $last_inserted_id . '">'.$fname. ' '.$mname.' '.$lname.'</a></p>';
        }
              

    
    
    } else {
        ?>
        <h1>New Character</h1>
        <p>A character is the real name of a character, their actual identity. To add a new hero or villain's alias, see <a href="newalias.php">create new alias</a>. <b>PLEASE search the database for your character before adding to avoid duplicate entries.</b>
    <form name='character' action='newchar.php' method='post'>
        First Name: <input type='text' name='fname'><br />
        Middle Name: <input type='text' name='mname'><br />
        Last Name:  <input type='text' name='lname'><br />
            <input type='submit' value='submit'> <?php } ?>
        
        
        
