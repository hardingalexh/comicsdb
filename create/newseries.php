<?php

require "../connect/dbconnect.php";


    if (isset($_POST['title'])){
        /*inserting info from POST */
        $title = mysqli_real_escape_string($conn, $_POST['title']);
       $pub = mysqli_real_escape_string($conn, $_POST['publisher']);
        $query = 'insert into series(title, pub_id) values ("' . $title . '", ' . $pub . ')';
        if ($conn->query($query) === false) {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
        
        } else {
            $last_inserted_id = $conn->insert_id;
            
            echo'<h1>Submission Successful</h1>';
            echo'<p>View entry for ' . $title . ' here: </p>';
            echo '<p><a href="../series.php?id=' . $last_inserted_id . '">'.$title.'</a></p>';
        }
              

    
    
    } else {
        ?>
        <h1>New Series</h1>
    <form name='series' action='newseries.php' method='post'>
        Title: <input type='text' name='title'><br />
         Publisher: <select name='publisher'>
        <!-- PHP to create list of publishers -->
        <?php 
            $query = 'select * from publisher';
            $rs = $conn->query($query);
            if ($rs === false) {
                trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error. E_USER_ERROR);
            } else {
            while ($row = $rs->fetch_assoc()) {
                echo '<option value="'.$row['ID'].'">'.$row['name'].'</option>';
            }} echo '</select>';
        ?>
    <input type='submit' value='submit'> <?php
        
        
        
    }
