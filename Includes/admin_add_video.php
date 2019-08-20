
<?php
include "../db_config.php";
include "head_navbar.html";
if(isset($_POST["add_video"])) {
    $video_name = $_POST["video_name"];
    $video_location = $_POST["video_location"];
    $meta_id = $_POST["meta_id"];
    $video_description = $_POST["video_description"];
    $post_content = $_POST["post_content"];
    $upload_video = $_FILES["upload_video"]["name"];
    $video_temp = $_FILES["upload_video"]["tmp_name"];
    
   
        move_uploaded_file($upload_video, "../Video/$upload_video");
    
        $query = "INSERT INTO video(video_name, video_location, meta_id_fk) ";
            
        $query .= "VALUES('{$video_name}', '{$video_location}', {$meta_id} ) ";
    
        $create_post = mysqli_query($connection, $query);
    if(!$create_post) {
        die ("Query failed! " .mysqli_error($connection));
    }
}
?>
<h1>escalla Admin - Add New Video</h1>
<hr>
<p></p>
    <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">
        <input type="text" class="form-control" name="video_name" placeholder="Add video name">
     </div>
     <div class="form-group">
        <input type="text" class="form-control" name="video_location" placeholder="Add video URL">
     </div>
     <div class="form-group">
        <input type="text" class="form-control" name="meta_id" placeholder="Add meta ID">
     </div>
          <div class="form-group">
        <input type="text" class="form-control" name="video_description" placeholder="Add video description">
     </div>
     <div class="form-group">
       <input type="file" class="form-control" name="upload_video">
     </div>
     <div class="form-group">
      <label for="post_content">Post Content</label>
       <textarea id="" class="form-control" name="post_content" cols="30" rows="10"></textarea> 
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-primary" name="add_video" value="Publish this">
     </div>
    </form>