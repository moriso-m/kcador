<?php
/**
 * Created by PhpStorm.
 * User: moris
 * Date: 31/01/2019
 * Time: 00:21
 */

require '../config.php'
?>
<nav class="navbar navbar-default" id="mainNav">
    <div class="navbar-header">
        <!collapsable navbar-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="../index" class="navbar-brand">Kcador</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li>
                <a href="index" class="active">
                    <i class="fa fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="clients">
                    <i class="fa fa-users"></i>
                    Clients
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="login"><span class="fa fa-sign-in"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 dashboard">
    <ul>
        <li>
            <a href="clients">
                <i class="fa fa-users"></i>
                Clients
            </a>
        </li>
        <li id="posts"><a href="#">
                <i class="fa fa-sellsy"></i>
                Pages
                <span class="fa fa-caret-down"></span>
            </a>
        </li>
        <li class="slideMenu"><a href="programs" >Programs</a></li>
        <li class="slideMenu"><a href="about">about us</a> </li>
        <li ><a href="videos">
                <i class="fa fa-video-camera"></i>
                videos</a>
        </li>
        <li><a href="sliderimages">
                <i class="fa fa-photo"></i>
                slider images</a>
        </li>
    </ul>
</div>
