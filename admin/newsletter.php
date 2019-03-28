<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 09/02/2019
 * Time: 13:48
 */

include "../config.php";

if (isset($_REQUEST['message'])){
	$newsletter =mysqli_real_escape_string($conn,$_REQUEST['message']);
	$sql     = 'INSERT INTO `newsletter`(`message`,`sent_on`) VALUES("' . $newsletter . '","'.time().'")';
	$query   = mysqli_query( $conn, $sql );
	if ( ! $query ) {
		# code...
		include '../errorLog.php';
	} else {
		if ( mysqli_affected_rows( $conn ) ) {
			$_SESSION['UPDATE_OK'] = '
                    <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        newsletter page has been updated
                    </div>';
			header( 'location:newsletter' );
			exit();
		}
	}
}

function newsletters($conn){
	$sql = 'SELECT * FROM `newsletter`';
	$query = mysqli_query($conn, $sql);
	if (mysqli_error($conn)){
		include "../errorLog.php";
	}
	else{
		if (mysqli_num_rows($query)){
			$messages = '';
			while ($row = mysqli_fetch_assoc($query)){
				$messages .= '<div class="messages panel panel-info">
								<div class="panel-heading">
									'.$row['subject'].'
								</div>
								<div class="panel-body">
									'.$row['message'].'
								</div>
							 </div>';
			}
			return $messages;
		}
	}
	return null;
}
?>

<!doctype html>
<html>
<head>
	<?php
	include "admin-links.php";
	?>
	<title>Newsletter</title>
</head>
<body>
<?php
include "admin-head.php";
if(isset($_SESSION['UPDATE_OK'])){
echo $_SESSION['UPDATE_OK'];
unset($_SESSION['UPDATE_OK']);
}
?>
<div class="dash-content">
<button class="btn btn-success" id="activate-newsletter">
	<i class="fa fa-envelope"></i>
	Compose newsletter
</button>


<div id="newsletter">
<div class="alert alert-info" align="center">
	Message written here will be sent as a broadcast to all your clients
</div>

<form action="newsletter" method="POST" enctype="multipart/form-data">
	<input type="text" name="subject" placeholder="Message subject..." class="form-control">
	<textarea name="message" id="ckeditor" rows="10" cols="80" placeholder="write the message here...">
		Dear client,
	</textarea>
	<br><br>
	<button class="btn btn-success col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-2" type="submit" name="newsletter">
		<i class="fa fa-upload"></i> send newsletter
	</button>
</form>
</div>
<div id="all-newsletters">
	<?php
	echo newsletters($conn);
	?>
</div>
</div>

	<script src="adminJS.js"></script>
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
