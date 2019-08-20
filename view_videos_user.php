<?php
   
     // include Header
            include "./Includes/head_navbar.html";
    
?>
 

<BR>    
<h1>Office 365 mini videos</h1>

<p>Welcome to your collection of Office 365 mini video tutorials.</p>

    
        <table class="table">
        <thead>
          <tr>
              <th>Video Id</th>
              <th>Video Title</th>
            <th>Video location</th>
          <th>View</th>
          </tr>
        </thead>
        <tbody>
            
          
        <?php
          
          //conect to database 
            include "db_config.php";
        
          // select info from video table
        
            $query = "SELECT * FROM video";
            $select_videos = mysqli_query($connection, $query);
                
          //loop through results
          $count = 0;
            while($row = mysqli_fetch_assoc($select_videos)) {                           
            $video_id = $row["video_id"];
            $video_name = $row["video_name"];
            $video_location = $row ["video_location"];
                $count = $count +1;
            
        
            //display video ID and name from video table 
              
            echo "<tr>";
            echo "<td>{$video_id}</td>";
            echo "<td>{$video_name}</td>";
            echo "<td>{$video_location}</td>";
            echo "<td> <a href='".$video_location."'>View </a></td>";
            echo "<td>{$count}</td>";
                 echo "</tr>";  
            }
           ?>
              
    </tbody>                      
  </table>

        <?php

         //delete video from database
              
         if(isset($_GET['delete'])) {
         $id_to_delete = $_GET['delete'];
        
         $query = "DELETE FROM video WHERE video_id = {$id_to_delete} ";
         $delete_query = mysqli_query($connection, $query);
         confirm_query($delete_query);
         header("Location: posts.php");
         }

         ?>
