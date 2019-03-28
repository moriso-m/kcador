<?php
 include "../config.php";
//check for incoming data from the server
if(isset($_REQUEST['editor'])) {
	$content = $_REQUEST['editor'];
	$content = mysqli_real_escape_string( $conn, $content );
	$query   = mysqli_query( $conn, 'UPDATE `services` SET `status`="0"' );
	$sql     = 'INSERT INTO `services`(`content`,`status`) VALUES("' . $content . '","1")';
	$query   = mysqli_query( $conn, $sql );
	if ( ! $query ) {
		# code...
		include '../errorLog.php';
	} else {
		if ( mysqli_affected_rows( $conn ) ) {
			$_SESSION['UPDATE_OK'] = '
                    <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        services page has been updated
                    </div>';
			header( 'location:services' );
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'admin-links.php';
        ?>
        <title>kcador|services</title>
    
    </head>
    <body>
    <?php
    include "admin-head.php";
    ?>
    <p>Enter content to display on the services in the text area below</p>
        <form action="services" method="POST" enctype="multipart/form-data">
        <?php
       if(isset($_SESSION['UPDATE_OK'])){
           echo $_SESSION['UPDATE_OK'];
           unset($_SESSION['UPDATE_OK']);
       }
       /*GET THE content that is currently displayed on the customers end and show it on the text area*/
        $sql='SELECT * FROM services WHERE `status`="1"';
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
                <textarea name="editor" id="ckeditor" rows="10" cols="80" placeholder="write the contents of the services page here...">
                
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