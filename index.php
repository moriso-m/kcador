<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 14/01/2019
 * Time: 19:08
 */

//connection to database
include "config.php";
?>
<!doctype html>
<html lang="en">
<head>
	<title>Kcador</title>
    <?php require_once 'links.php';?>
</head>
<body>
<?php
require_once 'header.php';
include "carousel.php";
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
        <?php
        $indicators = fetch_indicators($conn);
        echo $indicators;
        ?>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox" id="carouselContainer">
        <?php
        $images = fetch_images($conn, 'images');
        echo $images;
        ?>
		
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<div class="mainContent">
    <div class="row ">
        <div class="col-lg-12 col-md-12 about-title">
            <h3 align="center" id="about">About us</h3>
        </div>
    </div>
    <div class="row" id="aboutContent">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 aboutItem">
            <h4>Programs</h4>
            <i class="fa fa-suitcase"></i>
            <p>
                <?php
                $sql='SELECT * FROM `programs` WHERE `status`="1"';
                $query=mysqli_query($conn,$sql);
                if (mysqli_error($conn)){
                    include "errorLog.php";
                }
                else{
                    if (mysqli_num_rows($query)){
                        $row=mysqli_fetch_assoc($query);
                        echo $row['content'];
                    }
                }
                ?>
            </p>
    
            <div id="arrow-down">
                <a href="programs" class="btn btn-success">
                    <span class="fa fa-angle-down"></span>    
                    See our Programs
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 aboutItem">
            <h4>Who we are</h4>
            <i class="fa fa-mortar-board"></i>
            <p>
                <?php
                $sql='SELECT * FROM `about` WHERE `status`="1"';
                $query=mysqli_query($conn,$sql);
                if (mysqli_error($conn)){
                    include "errorLog.php";
                }
                else{
                    if (mysqli_num_rows($query)){
                        $row=mysqli_fetch_assoc($query);
                        if ( strlen( $row['content'] ) > 80 ) {
                            $description = substr( $row['content'],0,123 );
                            echo $description.'...<br>
                            <div id="arrow-down">
                                <a href="#trigger-who-we-are" id="trigger-who-we-are" class="btn btn-success ">
                                    <span class="fa fa-angle-down"></span>
                                    See more
                                </a>
                            </div>
                               ';
                        } else {
                            echo $row['content'];
                        }
                    }
                }
                ?>
            </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 aboutItem">
            <h4>Our Team</h4>
            <i class="fa fa-users"></i>
            <p>
                KCADOR is a team of qualified and passionate professionals committed to mentoring 
                individuals and preparing them meet the 21st century challenges,
                demands and opportunities. <br>
            </p>
            <div id="arrow-down">
                <a href="team" class="btn btn-success" id="trigger-team">
                    <span class="fa fa-angle-down"></span>    
                    See our team
                </a>
            </div>
        </div>
        
    </div>
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 aboutItem container" id="who-we-are" style="display:none;">
        <hr>
        <h3 class="text-center">Who we are</h3>
        <?php
            $sql='SELECT * FROM `about` WHERE `status`="1"';
            $query=mysqli_query($conn,$sql);
            if (mysqli_error($conn)){
                include "errorLog.php";
            }
            else{
                if (mysqli_num_rows($query)){
                    $row=mysqli_fetch_assoc($query);
                        echo $row['content'];
                }
            }
                ?>
            <h4 class="text-center">Our core values</h4>
            <ul class="jumbotron">
                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                    <i class="fa fa-check"></i> <br>   
                    <b>Self-determination</b>
                    <div>learners and the community working together to achieve a common goal.

                    </div>
                </li>
                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12  text-center">
                    <i class="fa fa-check"></i><br>
                    <b>Self-Reliance</b>
                    <div>
                        KCADOR promotes the policy that People are best served when their 
                        capacity to help themselves is encouraged and enhanced.
                    </div>
                </li>
                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12  text-center">
                    <i class="fa fa-check"></i><br>
                    <b>Leadership Development</b>
                    <div>
                        The identification, development,
                        and use of the leadership capacities of parents, Leaders, teachers, and professionals.
                    </div>
                </li>
                <li> &nbsp;</li>
            </ul>
    </div>
    <!-- Description of team members and their roles -->
    <div class="mainContent" id="team" style="display:none">
        <div class="row ">
            <div class="col-lg-12 col-md-12 about-title text-center">
                <hr>
                <h3>Our team</h3>
            </div>
            <div class="col-lg-4 col-md-4 about-title text-center">
                <img src="images/CEO.jpg" alt="Elias" class=" img-responsive team-avatar">
                <b>Name of person</b>
                <p>The roles he performs in th company and the achievements if necessary</p>
            </div>
            <div class="col-lg-4 col-md-4 about-title text-center">
                <img src="images/marketing.jpg" alt="marketer" class=" img-responsive team-avatar">
                <b>Name of person</b>
                <p>The roles he performs in th company and the achievements if necessary</p>
            </div>
            <div class="col-lg-4 col-md-4 about-title text-center">
                <img src="images/CEO.jpg" alt="Elias" class=" img-responsive team-avatar">
                <b>Name of person</b>
                <p>The roles he performs in th company and the achievements if necessary</p>
            </div>
        </div>
    </div>

    <?php include "footer.php";?>
</div>
<script src="main.js"></script>
</body>
</html>
