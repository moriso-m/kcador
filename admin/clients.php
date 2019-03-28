<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 03/02/2019
 * Time: 13:31
 */

include "../config.php";

function modals($conn) {
	$modals = '';
	$sql    = 'SELECT * FROM users WHERE `account_type`="client"';
	$query  = mysqli_query( $conn, $sql );
	if ( mysqli_error( $conn ) ) {
		include "../errorLog.php";
	} else {
		if ( mysqli_num_rows( $query ) > 0 ) {
			while ( $row = mysqli_fetch_assoc( $query ) ) {
				$modals .= '<div class="modal fade" id="modal' . $row['id'] . '" role="dialog">
                            <div class="modal-dialog">
                                <!-- modal content-->
                                <div class="modal-content">
                                    <div class="modal-title">
                                        <b>
                                            <i class="fa fa-envelope"></i>
                                            send newsletter:
                                        </b>
                                    </div>
                                    <div class="modal-header">
                                    <a href="#" data-dismiss="modal" class="close">&times;</a>
                                        <b>to:<div style="color: #0A7EA0;">'.$row['email'].'</div></b>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form" action="sliderimages" method="post" enctype="multipart/form-data">
                                            <label for="caption">Message:</label>
                                            <textarea name="caption" placeholder="write your message her" class="form-control col-lg-5" style="margin-bottom: 10px;"></textarea>
                                           <br><br><br>
                                            <button type="submit" class="btn btn-success form-control">
                                                <i class="fa fa-send"></i>
                                                                        send
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         </div>';
			}
			return $modals;
		}
	}
	return null;
}
function fetch_clients($conn){
    $sql = 'SELECT * FROM users WHERE `account_type`="client"';
    $query = mysqli_query($conn, $sql);
    if (mysqli_error($conn)){
        include "../errorLog.php";
    }
    else{
        if (mysqli_num_rows($query) > 0){
            $count =1;
            $clients_list = '';
            while ($row = mysqli_fetch_assoc($query)){
                $clients_list .= '<tr>'.
                                    '<td data-title ="No.">'.$count++.'</td>'.
                                    '<td data-title ="Full name">'.$row['username'].'</td>'.
                                    '<td data-title ="Email">
                                        <a href="#" data-toggle="modal" data-target="#modal'.$row['id'].'">'.$row['email'].'</a>
                                   
                                        </td>'.
                                    '<td data-title ="Sign up date"><em>'.date('M d Y h:i a',$row['signup_date']).'</em></td>'.
                                '</tr>';
            }
            return $clients_list;
        }
    }
    return null;
}

?>

<!doctype html>
<html>
<head>
    <?php include "admin-links.php";?>
    <title>clients</title>
</head>
<body>
<?php include "admin-head.php";?>
<div class="dash-content">
    <ul class="breadcrumb">
        <li><a href="index">Home</a> </li>
        <li class="active">Clients</li>
    </ul>
    <table class="table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Full name</th>
                <th>Email address</th>
                <th>sign up date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $clients = fetch_clients($conn);
            echo $clients;
        ?>
        </tbody>
    </table>
    <div>
        <?php
        echo modals($conn);
        ?>
    </div>
</div>
</body>
</html>

