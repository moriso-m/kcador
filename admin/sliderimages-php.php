<?php
/**
 * Created by PhpStorm.
 * User: moriso
 * Date: 08/02/2019
 * Time: 23:48
 */
include "../config.php";
if(isset($_SESSION['UPDATE_OK'])){
	echo $_SESSION['UPDATE_OK'];
	unset($_SESSION['UPDATE_OK']);
}
if (isset($_FILES['image'])){
	$file = basename($_FILES['image']['name']);
	$target_dir = 'uploads/carousel/';
	if (!is_dir($target_dir)){
		if(!mkdir($target_dir,0777,true)){
			$error = 'error creating folder to hold images inside the server';
		}
	}
	$file_path = $target_dir.$file;
	$upload_status = 0;
//    file type
	$file_type = pathinfo($file,PATHINFO_EXTENSION);
	if ($file_type != 'jpg' && $file_type != 'gif' && $file_type != 'png' && $file_type != 'JPG'){
		$upload_status = 0;
		$error = 'File is not an image'.$file_type;
	}
	else {
		if (file_exists('uploads/carousel/' . $file)) {
			$error = 'This image exists already or it has a similar name with the one stored';
		} else {
			chmod($target_dir, 777);
			if (move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
				$file_path = mysqli_real_escape_string($conn, $file_path);
				$query = mysqli_query($conn, 'INSERT INTO `carousel_pics`(`file_path`)VALUE("' . $file_path . '")');
				if (!empty($_REQUEST['caption'])) {
					$caption = $_REQUEST['caption'];
					mysqli_query($conn, 'UPDATE `carousel_pics` SET `pic_caption`="' . $caption . '" WHERE `file_path`="' . $file_path . '"');
					if (mysqli_error($conn)) {
						include "../errorLog.php";
					}
				}
				if (mysqli_error($conn)) {
					include "../errorLog.php";
				} else {
					$success = 'The image ' . $file . ' has been successfully uploaded';
				}
			} else {
				$error = 'Some error occurred while trying to upload the image please try again';
			}
		}
	}
}
/*GET all images*/
function fetch_images($conn)
{
	$sql = 'SELECT * FROM `carousel_pics` WHERE `show`="1"';
	$query = mysqli_query($conn, $sql);
	if ($query) { 
		$images = '';
		if (mysqli_num_rows($query) > 0) {

			while ($row = mysqli_fetch_assoc($query)){
				$images .= '<div class="col-lg-3 col-md-4 col-sm-3 col-xs-12" >
                                <img src="'.$row['file_path'].'" class="img-responsive" style="height: 200px;">
                                <a href="deleteImage.php?q=' .$row['id']. '">
                                	<i class="fa fa-trash delete" style="color: #ff1d1b;font-size: 1.2em;"></i>
                                </a>
                                <span class="caption">'.$row['pic_caption'].'</span>
                                <form>
                                    <input type="hidden" value="'.$row['id'].'" id="id">
                                </form>
                            </div>';
			}
			return $images;
		} else {
			$images = '<div class="alert alert-info">
                            <em>There are no images currently uploaded for the carousel</em>
                       </div>';
			return $images;
		}
	} else {
		if (mysqli_error($conn)) {
			include '../errorLog.php';
			if (isset($error)) {
				echo $error;
			}
		}
	}
	return null;
}
