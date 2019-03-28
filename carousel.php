<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 05/02/2019
 * Time: 14:09
 */

/**
 * @param $conn  <p>Connection to database object</p>
 * @param $source  <p> source of the function call, can be a indicator or image
 * @return null|string
 */

function fetch_indicators($conn){
    $sql = 'SELECT * FROM `carousel_pics` WHERE `show`="1"';
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $indicators = '';
        if (mysqli_num_rows($query) > 0) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($query)) {
                if ($count == 0) {
                    $indicators .= '<li data-target="#myCarousel" data-slide-to="' . $count . '" class="active"></li>';
                } else {
                    $indicators .= '<li data-target="#myCarousel" data-slide-to="' . $count . '"></li>';
                }
                $count++;
            }
            return $indicators;
        }
        else{
            $indicators = '';
            return $indicators;
        }
    }
    return null;
}
function fetch_images($conn, $source)
{
    $sql = 'SELECT * FROM `carousel_pics` WHERE `show`="1"';
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $images = '';
        $indicators = '';
        if (mysqli_num_rows($query) > 0) {
            $count=0;
            while ($row = mysqli_fetch_assoc($query)) {
                $count++;
                if ($source == 'images') {
                    if ($count == 1) {
                        $images .= '<div class="item active">
                                <img src="admin/' . $row['file_path'] . '" alt="image">
                                <div class="carousel-caption caption-left">
                                    <p>' . $row['pic_caption'] . '</p>
                                </div>
                            </div>';
                    } else {
                        $images .= '<div class="item">
                                    <img src="admin/' . $row['file_path'] . '" alt="image">
                                    <div class="carousel-caption caption-left">
                                        <p>' . $row['pic_caption'] . '</p>
                                    </div>
                                </div>';
                    }
                }
            }
                return $images;
        } else {
            $images = '';
            return $images;
        }
    } else {
        if (mysqli_error($conn)) {
            include 'errorLog.php';
            if (isset($error)) {
                echo $error;
            }
        }
    }
    return null;
}