<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 31/01/2019
 * Time: 00:36
 */

include "sliderimages-php.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'admin-links.php';
    ?>
    <title>kcador|images</title>

</head>
<body>
<?php
include "admin-head.php";
?>
<ul class="breadcrumb">
    <li><a href="#">Home</a> </li>
    <li>slide show images</li>
</ul>
<button class="btn btn-success" type="button" style="margin: 10px;" data-toggle="modal" data-target="#pickImage">
    <i class="fa fa-photo "></i>
    New image
</button><br>
<?php
if (isset($success)) {
    echo '<div class="alert alert-info">
            <em>image succesfully uploaded</em>
        </div>';
}
if (isset($error)) {
    echo '<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <em>'.$error.'</em>
        </div>';
}
if (isset($_SESSION['DELETED'])){
	echo '<div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <em>'.$_SESSION['DELETED'].'</em>
        </div>';
	unset($_SESSION['DELETED']);
}
?>
<!--      upload image modal-->
<div class="modal fade" id="pickImage" role="dialog">
    <div class="modal-dialog">
        <!-- modal content-->
        <div class="modal-content">
            <div class="modal-title">
                <b>
                    <i class="fa fa-file-movie-o"></i>
                    select file:</b>
            </div>
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="close">&times;</a>
            </div>
            <div class="modal-body">
                <form class="form" action="sliderimages" method="post" enctype="multipart/form-data">
                    <label for="caption">Image caption:</label>
                    <input type="text" name="caption" placeholder="write some description for the video here" class="form-control col-lg-5"><br>
                    <label for="video">image:</label>
                    <input type="file" class="form-control col-lg-4" name="image"><br><br><br>
                    <button type="submit" class="btn btn-success form-control">
                        <i class="fa fa-upload"></i>
                        Upload
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<div class="row images">
    <?php
    $images = fetch_images($conn);
    echo $images;
    ?>
</div>
<script type="text/javascript">
    /*
    $('.delete').click(function () {
        id = $('#id').val();
        $.post(
            "deleteImage.php",
            {
                id: id
            },
            function (data, status) {
                if (status === 'success')
                    $(".images").html(data);
                if (status == 'error')
                    $(".dash-content").text("an error occurred while trying to load chats.try loading again");
            });
    });
    */
</script>
</body>
</html>
