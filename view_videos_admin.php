
<?php

session_start(); 

	if (!isset($_SESSION['email'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login/login.php');
	}

?>

<head>
        
        <title>  </title>
        
          
               
    <style>
        
        #adminbtn {
            
            float:right;
            margin-right:45px;
            margin-bottom: 20px;
            font-size: 12px;
            color: white;
            
        }
        
        P, H1 {
            margin-left: 45px;
            
        }
        
        
        
        </style>
        
    </head>
            
<?php
   
     // include Header
    include "./Includes/head_navbar.html";        
    
?>
 

<BR>    
<h1>Add, view and delete videos - Admin</h1>

<p>Welcome to your collection of Office 365 mini video tutorials.</p>

    <BR>
    <button type="button" class="btn btn-success bmd-btn-fab" id="adminbtn" onclick="addvid()">
  <i class="material-icons">Add New Video</i>
        
</button>
  <script>
    function addvid() {
        window.location ="Includes/admin_add_video.php"
        
    }
    
    </script>
    
        <table class="table">
        <thead>
          <tr>
              <th>Video Id</th>
              <th>Video Title</th>
            <th>Video location</th>
          <th>View</th>
              <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            
          
        <?php
          
          //conect to database 
            include "DB_config.php";
        
          // select info from video table
        
            $query = "SELECT * FROM video";
            $select_videos = mysqli_query($connection, $query);
                
          //loop through results
          
            while($row = mysqli_fetch_assoc($select_videos)) {                           
            $video_id = $row["video_id"];
            $video_name = $row["video_name"];
            $video_location = $row ["video_location"];
                
            
        
            //display video ID and name from video table 
              
            echo "<tr>";
            echo "<td>{$video_id}</td>";
            echo "<td>{$video_name}</td>";
            echo "<td>{$video_location}</td>";
            echo "<td> <a href='".$video_location."'>View </a></td>";
            echo "<td><a href='vids.php?delete={$video_id}'>Delete</a></td>";
                
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
         echo "<br>  Success! Video deleted!";
        // header("Location: view_videos_admin.php");
                     
         }

         ?>
