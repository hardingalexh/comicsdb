<?php

require "../connect/dbconnect.php";


    if (isset($_POST['fname'])){
        /*inserting info from POST */
        if (isset($_POST['fname'])){
            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            } else {
                $fname = 'NULL';
        
            }
       if (isset($_POST['bio'])){     
           $bio = mysqli_real_escape_string($conn, $_POST['bio']);
        } else {
            $bio = 'NULL';
        
        }
        if (isset($_POST['lname'])){    
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        } else {
            $lname = 'NULL';
        }
        $query = 'insert into creator (fname, lname, bio) values ("'.$fname.'", "' .$lname.'", "'.$bio.'")';
        if ($conn->query($query) === false) {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
        
        } else {
            $last_inserted_id = $conn->insert_id;
            
            echo'<h1>Submission Successful</h1>';
            echo'<p>View entry for ' . $fname.' '.$lname. ' here: </p>';
            echo '<p><a href="../character.php?id=' . $last_inserted_id . '">'.$fname. ' ' .$lname.'</a></p>';
        }
              

    
    
    } else {
        ?>
        <h1>New Creator</h1>
        <p>A creator is any contributor to the creation of a comic, whether it be creative or editorial. To add a new role for a creator to fill, see <a href="newrole.php">create new role</a>. <b>PLEASE search the database for your creator before adding to avoid duplicate entries.</b>
    <form name='character' action='newchar.php' method='post'>
        First Name: <input type='text' name='fname'><br />
        Last Name:  <input type='text' name='lname'><br />
        Biography:<br /> <textarea name="bio" rows=10 cols=50 ></textarea><br />
            <input type='submit' value='submit'> <?php } ?>
        
        
    
