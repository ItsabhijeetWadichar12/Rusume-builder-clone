<?php
require 'assets/class/database.class.php';
require 'assets/class/function.class.php';

$slug = $_GET['resume'] ?? '';
$resumes = $db->query("SELECT * FROM resumes WHERE ( slug='$slug') ");
$resume = $resumes->fetch_assoc();
if (!$resume) {
    $fn->redirect('');
}

$exps = $db->query("SELECT * FROM experiences WHERE (resume_id=" . $resume['id'] . " ) ");
$exps = $exps->fetch_all(1);

$edus = $db->query("SELECT * FROM educations WHERE (resume_id=" . $resume['id'] . " ) ");
$edus = $edus->fetch_all(1);

$skills = $db->query("SELECT * FROM skills WHERE (resume_id=" . $resume['id'] . " ) ");
$skills = $skills->fetch_all(1);
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        @charset "UTF-8";
        @import url("https://fonts.googleapis.com/css?family=Montserrat");

        * {
            outline: none;
        }

        *,
        *:before,
        *:after {
            -webkit-box-sizing: inherit;
            -moz-box-sizing: inherit;
            box-sizing: inherit;
        }

        html,
        body {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            background: #fff;
            cursor: default;
            font-family: "Montserrat", sans-serif;
            font-size: 16px;
        }

        a {
            text-decoration: none;
            color: #fff;
            display: block;
            transition-duration: 0.3s;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        h3 {
            color: #ffb300;
            margin: 10px 0;
            text-transform: lowercase;
            font-size: 1.25em;
        }

        .resume {
            width: 960px;
            background: #1a237e;
            color: #fff;
            margin: 20px auto;
            box-shadow: 10px 10px #0e1442;
            position: relative;
            display: flex;
        }

        .resume .base,
        .resume .func {
            box-sizing: border-box;
            float: left;
        }

        .resume .base>div,
        .resume .func>div {
            padding-bottom: 10px;
        }

        .resume .base>div:last-of-type,
        .resume .func>div:last-of-type {
            padding-bottom: 0;
        }

        .resume .base {
            width: 30%;
            padding: 30px 15px;
            background: #283593;
            color: #fff;
        }

        .resume .base .profile {
            background: #ffb300;
            padding: 30px 15px 40px 15px;
            margin: -30px -15px 45px -15px;
            position: relative;
            z-index: 2;
        }

        .resume .base .profile::after {
            content: "";
            position: absolute;
            background: #303f9f;
            width: 100%;
            height: 30px;
            bottom: -15px;
            left: 0;
            transform: skewY(-5deg);
            z-index: -1;
        }

        .resume .base .profile .photo img {
            width: 100%;
            border-radius: 50%;
        }

        .resume .base .profile .photo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .resume .base .profile .fa-rocket {
            font-size: 100px;
            text-align: center;
            margin: auto;
            color: #283593;
        }

        .resume .base .profile .info {
            text-align: center;
            color: #fff;
        }

        .resume .base .profile .info .name {
            margin-top: 10px;
            margin-bottom: 0;
            font-size: 1.75em;
            text-transform: lowercase;
            color: #1a237e;
        }

        .resume .base .profile .info .job {
            margin-top: 10px;
            margin-bottom: 0;
            font-size: 1.5em;
            text-transform: lowercase;
            color: #283593;
        }

        .resume .base .contact div {
            line-height: 24px;
        }

        .resume .base .contact div a:hover {
            color: #fdd835;
        }

        .resume .base .contact div a:hover span::after {
            width: 100%;
        }

        .resume .base .contact div:hover i {
            color: #fdd835;
        }

        .resume .base .contact div i {
            color: #ffb300;
            width: 20px;
            height: 20px;
            font-size: 20px;
            text-align: center;
            margin-right: 15px;
            transition-duration: 0.3s;
        }

        .resume .base .contact div span {
            position: relative;
        }

        .resume .base .contact div span::after {
            content: "";
            position: absolute;
            background: #fdd835;
            height: 1px;
            width: 0;
            bottom: 0;
            left: 0;
            transition-duration: 0.3s;
        }

        .resume .base .follow .box {
            text-align: center;
            vertical-align: middle;
        }

        .resume .base .follow .box a {
            display: inline-block;
            vertical-align: text-bottom;
        }

        .resume .base .follow .box a:hover i {
            background: #fdd835;
            border-radius: 5px;
            transform: rotate(45deg) scale(0.8);
        }

        .resume .base .follow .box a:hover i::before {
            transform: rotate(-45deg) scale(1.5);
        }

        .resume .base .follow .box i {
            display: inline-block;
            font-size: 30px;
            background: #ffb300;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            line-height: 60px;
            color: #283593;
            margin: 0 10px 10px 10px;
            transition-duration: 0.3s;
        }

        .resume .base .follow .box i::before {
            transition-duration: 0.3s;
        }

        .resume .base .follow .box i.fa::before {
            display: block;
        }

        .resume .func {
            width: 100%;
            padding: 30px;
        }

        .resume .func:hover>div {
            transition-duration: 0.5s;
        }

        .resume .func:hover>div:hover h3 i {
            transform: scale(1.25);
        }

        .resume .func:hover>div:not(:hover) {
            opacity: 0.5;
        }

        .resume .func h3 {
            transition-duration: 0.3s;
            margin-top: 0;
        }

        .resume .func h3 i {
            color: #283593;
            background: #ffb300;
            width: 42px;
            height: 42px;
            font-size: 20px;
            line-height: 42px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            margin-right: 8px;
            transition-duration: 0.3s;
        }

        .resume .func .work,
        .resume .func .edu {
            float: left;
        }

        .resume .func .work small,
        .resume .func .edu small {
            display: block;
            opacity: 0.7;
        }

        .resume .func .work ul li,
        .resume .func .edu ul li {
            position: relative;
            margin-left: 15px;
            padding-left: 25px;
            padding-bottom: 15px;
        }

        .resume .func .work ul li:hover::before,
        .resume .func .edu ul li:hover::before {
            animation: circle 1.2s infinite;
        }

        .resume .func .work ul li:hover span,
        .resume .func .edu ul li:hover span {
            color: #fdd835;
        }

        @keyframes circle {
            from {
                box-shadow: 0 0 0 0px #fdd835;
            }

            to {
                box-shadow: 0 0 0 6px rgba(255, 255, 255, 0);
            }
        }

        .resume .func .work ul li:first-of-type::before,
        .resume .func .edu ul li:first-of-type::before {
            width: 10px;
            height: 10px;
            left: 1px;
        }

        .resume .func .work ul li:last-of-type,
        .resume .func .edu ul li:last-of-type {
            padding-bottom: 3px;
        }

        .resume .func .work ul li:last-of-type::after,
        .resume .func .edu ul li:last-of-type::after {
            border-radius: 1.5px;
        }

        .resume .func .work ul li::before,
        .resume .func .work ul li::after,
        .resume .func .edu ul li::before,
        .resume .func .edu ul li::after {
            content: "";
            display: block;
            position: absolute;
        }

        .resume .func .work ul li::before,
        .resume .func .edu ul li::before {
            width: 7px;
            height: 7px;
            border: 3px solid #fff;
            background: #ffb300;
            border-radius: 50%;
            left: 3px;
            z-index: 1;
        }

        .resume .func .work ul li::after,
        .resume .func .edu ul li::after {
            width: 3px;
            height: 100%;
            background: #fff;
            left: 5px;
            top: 0;
        }

        .resume .func .work ul li span,
        .resume .func .edu ul li span {
            transition-duration: 0.3s;
        }

        .resume .func .work {
            width: 48%;
            background: #283593;
            padding: 15px;
            margin: 0 4% 15px 0;
        }

        .resume .func .edu {
            width: 48%;
            background: #283593;
            padding: 15px;
        }

        .resume .func .skills-prog {
            clear: both;
            background: #283593;
            padding: 15px;
        }

        .resume .func .skills-prog ul {
            margin-left: 15px;
        }

        .resume .func .skills-prog ul li {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            transition-duration: 0.3s;
        }

        .resume .func .skills-prog ul li:hover {
            color: #fdd835;
        }

        .resume .func .skills-prog ul li:hover .skills-bar .bar {
            background: #fdd835;
            box-shadow: 0 0 0 1px #fdd835;
        }

        .resume .func .skills-prog ul li span {
            display: block;
            width: 120px;
        }

        .resume .func .skills-prog ul li .skills-bar {
            background: #fff;
            height: 2px;
            width: calc(100% - 120px);
            position: relative;
            border-radius: 2px;
        }

        .resume .func .skills-prog ul li .skills-bar .bar {
            position: absolute;
            top: -1px;
            height: 4px;
            background: #ffb300;
            box-shadow: 0 0 0 #ffb300;
            border-radius: 5px;
        }

        .resume .func .skills-soft {
            clear: both;
            background: #283593;
            padding: 15px;
            margin: 15px 0 0;
        }

        .resume .func .skills-soft ul {
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .resume .func .skills-soft ul li {
            position: relative;
        }

        .resume .func .skills-soft ul li:hover svg .cbar {
            stroke: #fdd835;
            stroke-width: 4px;
        }

        .resume .func .skills-soft ul li:hover span,
        .resume .func .skills-soft ul li:hover small {
            transform: scale(1.2);
        }

        .resume .func .skills-soft ul li svg {
            width: 95%;
            fill: transparent;
            transform: rotate(-90deg);
        }

        .resume .func .skills-soft ul li svg circle {
            stroke-width: 1px;
            stroke: #fff;
        }

        .resume .func .skills-soft ul li svg .cbar {
            stroke-width: 3px;
            stroke: #ffb300;
            stroke-linecap: round;
        }

        .resume .func .skills-soft ul li span,
        .resume .func .skills-soft ul li small {
            position: absolute;
            display: block;
            width: 100%;
            top: 52%;
            transition-duration: 0.3s;
        }

        .resume .func .skills-soft ul li span {
            top: 40%;
        }

        .resume .func .interests {
            background: #283593;
            margin: 15px 0 0;
            padding: 15px;
        }

        .resume .func .interests-items {
            box-sizing: border-box;
            padding: 0 0 15px;
            width: 100%;
            text-align: center;
            display: flex;
            justify-content: space-between;
        }

        .resume .func .interests-items div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .resume .func .interests-items div:hover i {
            transform: scale(1.2);
        }

        .resume .func .interests-items div:hover span {
            color: #fdd835;
            transition-duration: 0.3s;
        }

        .resume .func .interests-items div i {
            font-size: 45px;
            width: 60px;
            height: 60px;
            line-height: 60px;
            color: #ffb300;
            transition-duration: 0.3s;
        }

        .resume .func .interests-items div span {
            display: block;
        }
    </style>
</head>

<body>



    <?php
    if ($fn->Auth() != false && $fn->Auth()['id'] == $resume['user_id']) {
    ?>
        <div class="extra">
            <div class="w-100 py-2 bg-dark d-flex justify-content-center gap-3">
                <?php
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                ?>

                <button class="btn btn-light btn-sm" id="print"><i class="bi bi-printer"></i> Download</button>

                <!-- <button class="btn btn-light btn-sm" id="#downloadpdf"><i class="bi bi-file-earmark-pdf"></i> </i> Download</button> -->
            </div>
        </div>
    <?php
    }
    ?>

    <div class="resume">
        <div class="base">
            <div class="profile">
                <div class="photo">
                    <!--<img src="" /> -->
                    <i class="fas fa-rocket"></i>
                </div>
                <div class="info">
                    <h1 class="name"><?= $resume['full_name'] ?></h1>
                    <h2 class="job">

                        <?php
                        if ($exps) {
                            foreach ($exps as $exp) {
                        ?>
                                <div class="experience mb-2">
                                    <div class="fw-bold">- <span class="job-role"><?= $exp['position'] ?>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            ?>
                            <div class="experience mb-2">

                                <div class="company">I am a Fresher.</div>

                            </div>
                        <?php
                        }
                        ?>
                    </h2>
                </div>
            </div>
            <div class="about">
                <h3>About Me</h3> <?= $resume['objective'] ?>
            </div>
            <div class="contact">
                <h3>Contact Me</h3>
                <div class="call"><a><i class="fas fa-phone"></i><span>+91-<?= $resume['mobile_no'] ?></span></a></div>
                <div class="address"><a href="https://goo.gl/maps/fiTBGT6Vnhy"><i class="fas fa-map-marker"></i><span><?= $resume['address'] ?></span></a>
                </div>
                <div class="email"><a><i class="fas fa-envelope"></i><span><?= $resume['email_id'] ?></span></a></div>
                <!-- <div class="website"><a href="http://astronaomical.com/" target="_blank"> <i class="fas fa-home"></i><span>astronaomical.com</span></a></div> -->
            </div>
            <div class="follow">
                <h3>Follow Me</h3>
                <div class="box">
                    <a href="https://www.facebook.com/astronaomical/" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/astronaomical/" target="_blank"><i class="fab fa-instagram "></i></a>
                    <a href="https://www.pinterest.com/astronaomical/" target="_blank"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.linkedin.com/in/naomi-weatherford-758385112/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://codepen.io/astronaomical/" target="_blank"><i class="fab fa-codepen"></i></a>
                    <a href="https://www.behance.net/astronaomical" target="_blank"><i class="fab fa-behance"></i></a>
                </div>
            </div>
        </div>
        <div class="func">
            <div class="work">
                <h3><i class="fa fa-briefcase"></i>Experience</h3>
                <ul>


                    <?php
                    if ($exps) {
                        foreach ($exps as $exp) {
                    ?>

                            <li><span><?= $exp['position'] ?></span><small><?= $exp['company'] ?></small><small><?= $exp['started'] ?> To <?= $exp['ended'] ?></small></li>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="experience mb-2">

                            <div class="company">I am a Fresher.</div>

                        </div>
                    <?php
                    }
                    ?>



                </ul>
            </div>
            <div class="edu">
                <h3><i class="fa fa-graduation-cap"></i>Education</h3>
                <ul>

                    <?php
                    if ($edus) {
                        foreach ($edus as $edu) {
                    ?>

                            <li><span><?= $edu['course'] ?><br></span><small><?= $edu['institute'] ?></small><small><?= $edu['started'] ?> - <?= $edu['ended'] ?></small></li>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="education mb-2">

                            <div class="institute">I don't have any education</div>

                        </div>
                    <?php
                    }
                    ?>


                </ul>
            </div>
            <div class="skills-prog">
                <h3><i class="fas fa-code"></i>Programming Skills</h3>
                <ul>


                    <?php
                    if ($skills) {
                        foreach ($skills as $skill) {
                    ?>
                            <li data-percent="95"><span><?= $skill['skill'] ?></span>
                                <div class="skills-bar">
                                    <div class="bar"></div>
                                </div>
                            </li>


                        <?php
                        }
                    } else {
                        ?>
                        <div class="skill">- I don't have any skills.</div>
                    <?php
                    }
                    ?>



                </ul>
            </div>
            <div class="skills-soft">
                <h3><i class="fas fa-bezier-curve"></i>Software Skills</h3>
                <ul>

                    <?php
                    if ($skills) {
                        foreach ($skills as $skill) {
                    ?>
                            <li data-percent="90">
                                <svg viewbox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45"></circle>
                                    <circle class="cbar" cx="50" cy="50" r="45"></circle>
                                </svg><span><?= $skill['skill'] ?></span><small></small>
                            </li>


                        <?php
                        }
                    } else {
                        ?>
                        <div class="skill">- I don't have any skills.</div>
                    <?php
                    }
                    ?>


                </ul>
            </div>
            <div class="interests">
                <h3><i class="fas fa-star"></i>Interests</h3>
                <div class="interests-items">
                    <div class="art"><i class="fas fa-palette"></i><span><?= $resume['hobbies'] ?></span></div>

                </div>
            </div>
        </div>
    </div>

    <script src="index.js"></script>
</body>

</html>