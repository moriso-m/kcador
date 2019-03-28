<?php
/**
 * Created by PhpStorm.
 * User: moriso
 * Date: 03/02/2019
 * Time: 15:32
 */

//header('Content-type:');
include "../config.php";
if (isset($_FILES['video'])){
    $file = basename($_FILES['video']['name']);
    echo $file;
    $target_dir = __DIR__.'/uploads/videos/';
    if (!is_dir($target_dir)){
        if(!mkdir($target_dir,0777,true)){
            echo 'error creating folder to hold videos inside the server';
        }
    }
    $file_path = $target_dir.$file;
    $upload_status = 0;
//    file type
    $file_type = pathinfo($file,PATHINFO_EXTENSION);
  /*
    if ($file_type != 'mp4' && $file_type != 'flv' && $file_type != 'mkv'){
        $upload_status = 0;
        $error = 'File is not a video';
    }
    else{
        */
        if (file_exists('uploads/'.$file)){
            $error = 'This video exists already or it has a similar name with the one stored';
            echo $error;
        }
        else{
            echo '<br>doesn\'t exists';
            chmod($target_dir, 777);
            if (move_uploaded_file($_FILES['video']['tmp_name'], $file_path)){
                $file_path = mysqli_real_escape_string($conn, $file_path);
                $query = mysqli_query($conn, 'INSERT INTO `videos`(`file_path`)VALUE("'.$file_path.'")');
                if (mysqli_error($conn)){
                    include "../errorLog.php";
                }
                else {
                    $success = 'the video ' . $file . ' has been successfully uploaded';
                    echo $success;
                }
            }
            else{
                $error = 'Some error occurred while trying to upload the video please try again';
                echo $error;
            }
        }
    //}
}