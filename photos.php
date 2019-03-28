<?php
include 'config.php';
include "enrollBAckend.php";

/*GET all images*/
function fetch_images($conn)
{
	$sql = 'SELECT * FROM `carousel_pics` WHERE `show`="1"';
	$query = mysqli_query($conn, $sql);
	if ($query) {
		$images = '';
		if (mysqli_num_rows($query) > 0) {

			while ($row = mysqli_fetch_assoc($query)){
				$images .= '<div class="col-lg-3 col-md-4 col-sm-3 col-xs-12 images" >
                                <img src="admin/'.$row['file_path'].'" 
                                    class="img-responsive" style="height: 200px;" id="'.$row['id'].'" onclick="show('.$row['id'].');">
                                <span class="caption" id="caption'.$row['id'].'">'.$row['pic_caption'].'</span>
                            </div>
                            
                            <div id="myModal'.$row['id'].'" class="modal">

                                <!-- The Close Button -->
                                <span class="close" onclick="document.getElementById(\'myModal'.$row['id'].'\').style.display=\'none\'">&times;</span>

                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img'.$row['id'].'">

                                <!-- Modal Caption (Image Text) -->
                                <div id="caption2'.$row['id'].'"></div>
                            </div>
                            ';
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
?>

<!doctype html>
<html>
<head>

	<title>Gallery</title>
    <?php require_once 'links.php';?>
    <script type="text/javascript">
    /* ########################### phpotos.php ##############*/
    
    // Get the modal
    var id;
    function show(id){
        var modal = document.getElementById('myModal'+id);

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById(id);
        var modalImg = document.getElementById("img"+id);
        var captionText = document.getElementById("caption"+id);
        var captionText2 = document.getElementById("caption2"+id);
            modal.style.display = "block";
            modalImg.src = img.src;
            modalImg.alt = img.alt;
            captionText2.innerHTML=captionText.innerHTML;

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }
    }
    </script>
</head>
<body>
<?php
include "header.php";
?>
    <ul class="breadcrumb">
            <li><a href="index">Home</a></li>
            <li class="active">Downloads</li>
        </ul>
<div class="row">
    <?php
                 echo fetch_images($conn);
    ?>
</div>
<?php
include "footer.php";
?>
<script type="text/javascript" src="main.js"><script>
</body>
</html>