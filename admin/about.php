<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 31/01/2019
 * Time: 01:32
 */

include "../config.php";
//check for incoming data from the server
if(isset($_REQUEST['editor'])){
$content=$_REQUEST['editor'];
echo $content;
$content= mysqli_real_escape_string($conn,$content);

// @deprecated
// if(get_magic_quotes_gpc()){

// }
// else{
//     $content=addslashes($content);
// }

/*
$query=mysqli_query($conn,'SELECT * FROM `about`;');
if(!$query){
include '../errorLog';
}
else{
//if there exists some data in the database UPDATE it else INSERT new data
if(mysqli_num_rows($query)>0){
$query=mysqli_query($conn,'UPDATE `about` SET `content`="'.$content.'" status="1"');
if (!$query) {
# code...
include '../errorLog.php';
}
}
else{
*/
$query=mysqli_query($conn, 'UPDATE `about` SET `status`="0"');
$sql='INSERT INTO `about`(`content`,`status`) VALUES("'.$content.'","1")';
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
    data successfully uploaded
</div>';
header('location:about');
exit();
}
}
//closing tag for SELECT QUERY
// }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'admin-links.php';
    ?>
    <title>kcador|about</title>

</head>
<body>
<?php
include "admin-head.php";
?>
<p>Enter content to display on the about in the text area below</p>
<form action="about" method="POST" enctype="multipart/form-data">
    <?php
    if(isset($_SESSION['UPDATE_OK'])){
        echo $_SESSION['UPDATE_OK'];
        unset($_SESSION['UPDATE_OK']);
    }
    /*GET THE content that is currently displayed on the customers end and show it on the text area*/
    $sql='SELECT * FROM about WHERE `status`="1"';
    $query=mysqli_query($conn,$sql);
    if($query){
        if(mysqli_num_rows($query)>0){
            $row=mysqli_fetch_assoc($query);
            # code...
            echo '
                    <textarea name="editor" id="ckeditor" rows="10" cols="80">
                    '.$row['content'].'
                    </textarea>';

        }
        else {
            ?>
            <textarea name="editor" id="ckeditor" rows="10" cols="80" placeholder="write the contents of the about page here...">

            </textarea>
            <?php
        }
    }
    else{
        if(mysqli_error($conn)){
            include '../errorLog.php';
            if(isset($error)){
                echo $error;
            }
        }
    }
    ?>
    <br><br>
    <button class="btn btn-success" type="submit">
        <i class="fa fa-upload"></i> Update content
    </button>
</form>
<!-- Make sure the path to CKEditor is correct. -->
<script src="../../ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    var editor = CKEDITOR.replace( 'ckeditor');
    CKFinder.setupCKEditor( editor );
</script>
</body>
</html>
