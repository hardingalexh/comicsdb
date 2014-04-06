<?php

require "../connect/dbconnect.php";


    if (isset($_POST['name'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);        
        $query = 'insert into publisher (name) values ("'.$name.'")';
        if ($conn->query($query) === false) {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
        
        } else {
            $last_inserted_id = $conn->insert_id;
            	
            echo'<h1>Submission Successful</h1>';
            echo'<p>View entry for ' . $title . ' here: </p>';
            echo '<p><a href="../publisher.php?id=' . $last_inserted_id . '">'.$name.'</a></p>';
        }
              

    
    
    } else {
        ?>
        <h1>New Publisher</h1>
        <p>A publisher is a company that publishes comics. <b>PLEASE search the database for your publisher before adding to avoid duplicate entries.</b>
    <form name='publisher' action='newpublisher.php' method='post'>
        Name: <input type='text' name='name'><br />
            <input type='submit' value='submit'> <?php } ?>
        
        ?>
