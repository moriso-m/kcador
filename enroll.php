<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 17/01/2019
 * Time: 14:54
 */

include 'config.php';
include "enrollBAckend.php";
?>
<!doctype html>
<html>
<head>
	<title>Enroll</title>
    <?php require_once 'links.php';?>
    <style>
        body{
            background:#ffffff;
        }
    </style>
</head>

<body>
<?php
include "header.php";
?>
<div class="main-content">
    <!-- tabs at the top of the page-->
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#school" data-toggle="tab"><b>school Enrollment</b></a>
        </li>
        <li>
            <a href="#private" data-toggle="tab"><b>PRIVATE SPONSORED LEARNER enrollment</b></a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="school"  class="tab-pane fade in active "><br>
            <div class="jumbotron">
                <p>
                
                    To enroll your school to this programme, please download and fill the form attached below.<br>
                    After filling out the form please submit it to our offices or send via email. see <a href="#">contact details</a> here.
                    <address class="text-center">
                        Tel : 0700-429-271,0726-405-148<br>
                        P.O BOX 6183-30100 ELDORET<br>
                        Elimu plaza, Kenyatta avenue Eldoret town <br>
                        info@kcador.com
                    </address>
                </p>
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                    <a class="btn btn-success" href="assets/SCHOOL REGISTRATION FORM.docx" download >
                        <i class="fa fa-download"></i>
                        School registration form (26kb)
                    </a>
                </div>
            </div>
        </div>
        <div id="private" class="tab-pane fade in jumbotron">
                <p>
                    To enroll as a private sponsored learner.Please fill out the form below
                     and submit it to our offices. <br>
                     <address class="text-center">
                        Tel : 0700-429-271,0726-405-148<br>
                        P.O BOX 6183-30100 ELDORET<br>
                        Elimu plaza, Kenyatta avenue Eldoret town <br>
                        info@kcador.com
                    </address>
                </p>
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                    <a class="btn btn-success" href="assets/Private sponsored learner form.pub" download >
                        <i class="fa fa-download"></i>
                        PRIVATE SPONSORED LEARNER REGISTRATION FORM(127kb)
                    </a>
                </div>
        </div>
    </div>
</div>
        <?php
            include "footer.php";
        ?>


<script src="main.js"></script>
</body>
</html>
