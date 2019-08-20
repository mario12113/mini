<?php

if(isset($_GET["source"])) {  
    
   $source = $_GET["source"];
    
}else {
    
    $source = "";  
    
}

switch ($source) {
    case "view_videos_admin":
        include "view_videos_admin.php";
        break;
    default:
        include "view_videos_admin.php";
        break;
}

?>