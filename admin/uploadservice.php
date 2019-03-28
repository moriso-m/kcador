<?php
 include "../config.php";
//check for incoming data from the server
if(isset($_REQUEST['editor'])){
    $content=$_REQUEST['editor'];
   $content= mysqli_real_escape_string($conn,$content);
   echo $content;
    // @deprecated
    // if(get_magic_quotes_gpc()){
        
    // }
    // else{
    //     $content=addslashes($content);
    // }
    
    /*
    $query=mysqli_query($conn,'SELECT * FROM `services`;');
    if(!$query){
        include '../errorLog';
    }
    else{
        //if there exists some data in the database UPDATE it else INSERT new data
        if(mysqli_num_rows($query)>0){
            $query=mysqli_query($conn,'UPDATE `services` SET `content`="'.$content.'" status="1"');
            if (!$query) {
                # code...
                include '../errorLog.php';
            }
     }
        else{
    */
    $sql='INSERT INTO `services`(`content`,`status`) VALUES("'.$content.'","1")';
    $query=mysqli_query($conn,$sql);
    if (!$query) {
        # code...
        include '../errorLog.php';
    }
    else{
// }
        if(mysqli_affected_rows($conn)){
            $_SESSION['UPDATE_OK']= '
            <div class="alert alert-success">
                <a href="#" data-dismiss="alert" class="close">&times;</a>
                Services page has been updated
            </div>';
            // header('location:services');
            // exit();
        }
    }
//closing tag for SELECT QUERY
// }
}
?>