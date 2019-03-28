<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 06/02/2019
 * Time: 10:45
 */

include "../config.php";
if (isset($_REQUEST['q'])) {
	$videoiId = $_REQUEST['q'];
	$query = mysqli_query( $conn, 'SELECT * FROM `carousel_pics` WHERE id="' . $videoiId . '"' );
	if ( mysqli_error( $conn ) ) {
		include "../errorLog.php";
	} else {
		$row  = mysqli_fetch_assoc( $query );
		$path = $row['file_path'];
		unlink( $path );
		if ( mysqli_affected_rows( $conn ) ) {
			$sql   = 'DELETE FROM `carousel_pics` WHERE id="' . $videoiId . '"';
			$query = mysqli_query( $conn, $sql );
			if ( mysqli_error( $conn ) ) {
				include "../errorLog.php";
			} else {
				$_SESSION['DELETED'] = 'slide show image has been deleted';
				header('location:sliderimages');
				exit();
			}

		}
	}
}