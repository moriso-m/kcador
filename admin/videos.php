<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 03/02/2019
 * Time: 14:49
 */
//if (isset($_SESSION['kcadorco']) and $_SESSION['kcadorco'] == 'elias') {
    function fetch_videos($conn)
    {
        $sql = 'SELECT * FROM videos';
        $query = mysqli_query($conn, $sql);
        if (mysqli_error($conn)){
            include "../errorLog.php";
        }
        else{
            if (mysqli_num_rows($query)){
                $videos = '';
                while ($row= mysqli_fetch_assoc($query)){
                    $videos .= '<div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">'.
                                    '<iframe src="'.$row['file_path'].'">'.
                                    '</iframe>'.
                                    '<i class="fa fa-trash" style="color: #ff1d1b;"></i>'.
                                '</div>';
                }
                return $videos;
            }
            else{
                return '<p class="alert alert-info" align="center"><b>There are no videos uploaded yet.' .
                            '<a href="upload-video">Upload now</a> </b>
                        </p>';
            }
        }
    }

    ?>
    <!
    <html>
    <head>
        <?php include "admin-links.php"; ?>
        <title>upload videos</title>

    </head>
    <body>
        <?php include "admin-head.php"; ?>
        <div class="dash-content">
            <ul class="breadcrumb">
                <li><a href="index">Home</a></li>
                <li class="active">Upload videos</li>
            </ul>
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#fromComputer">
                    <i class="fa fa-upload"></i>
                    <a href="#" class="btn-link">Upload video from computer</a>
                </button>
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#fromYoutube">
                    <i class="fa fa-youtube-square fa-2x" ></i>
                    <a href="#"><b>Upload video from youtube</b></a>
                </button>

<!--            upload from computer modal-->
            <div class="modal fade in" id="fromComputer" role="dialog">
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
                            <form class="form" action="uploadVideo" method="post" enctype="multipart/form-data">
                                <label for="caption">Video caption:</label>
                                <input type="text" name="caption" placeholder="write some description for the video here" class="form-control col-lg-5"><br>
                                <label for="video">Video:</label>
                                <input type="file" class="form-control col-lg-4" name="video"><br><br><br>
                                <button type="submit" class="btn btn-success form-control">
                                    <i class="fa fa-upload"></i>
                                    Upload
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
<!--            Upload from youtube-->
            <div class="modal fade" id="fromYoutube">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="#" class="close" data-dismiss="modal">&times;</a>
                            <b>How would you like to upload the video?</b>
                        </div>
                        <div class="modal-body">
                            <div>
                                <h5><b>Via link:</b></h5>
                                <form class="form-inline" action="uploadVideo" method="post">
                                    <input type="url" class="form-control col-lg-8" placeholder="eg. http://youtube.com/file-id">
                                    <button class="btn btn-default form-control ">
                                        <i class="fa fa-link"></i>
                                        Upload link
                                    </button>
                                </form>
                            </div>
                            <hr>
                            <div>
                                <h5><b>Open youtube and copy the video link:</b></h5>
                                <a href="https://youtube.com" target="_blank">Browse in youtube</a> <b></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $videos = fetch_videos($conn);
                echo $videos;
                ?>
            </div>
        </div>

    </body>
    </html>

    <?php
//}
?>