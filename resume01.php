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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Resume</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Dancing+Script&family=Exo&family=Fuggles&family=Gloria+Hallelujah&family=Mooli&family=Nunito&family=Zilla+Slab&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="icon" href="./assets/images/logo.png">
    <title><?= $resume['full_name'] . ' | ' . $resume['resume_title'] ?></title>



    <style>
        /* Google Fonts  */
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
        /* font-family: 'Open Sans', sans-serif; */

        @import url('https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        /* font-family: 'Public Sans', sans-serif; */

        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
        /* font-family: 'Lato', sans-serif; */



        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #EBECF0;
        }

        .main-section {
            width: 210mm;
            height: 297mm;
            background-color: white;
            margin: 0 auto;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
        }

        .main-section .left-part {
            width: 40%;
            height: 100%;
            background-color: #F4F4F4;
            padding: 2.8rem;
        }

        .left-part .photo-container {
            margin-bottom: 2.2rem;
        }

        .left-part .photo-container img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 1rem solid white;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }

        .title {
            font-family: 'Public Sans', sans-serif;
            font-size: 1.4rem;
            text-transform: uppercase;
            padding: 0.6rem;
            background-color: #720214;
            color: white;
            text-align: center;
            margin: 1.4rem 0;
        }

        .contact-container {
            margin-bottom: 2.2rem;
        }

        .contact-container .contact-list {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            font-family: 'Lato', sans-serif;
            color: #5e0c1a;

            font-size: 1rem;
        }

        .page {

            width: 21cm;
            min-height: 29.7cm;
            padding: 0.5cm;
            margin: 0.5cm auto;
            /* border: 1px #D3D3D3 solid; */
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .education-container {
            margin-bottom: 2.2rem;
            font-family: 'Lato', sans-serif;
        }

        .education-container .course {
            margin-bottom: 1rem;
            color: #5e0c1a;
        }

        .education-container .education-title {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: .1rem;
        }

        .education-container .college-name {
            margin-bottom: 0.3rem;
            font-weight: 600;

        }

        .education-container .education-date {
            font-size: 0.9rem;
        }

        .skills-container .skill {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.1rem;
            font-family: 'Lato', sans-serif;
        }

        .skills-container .skill .right-skill .outer-layer {
            background-color: #BBBBBB;
            height: 0.4rem;
            width: 5rem;
            border-radius: 0.4rem;
        }

        .skills-container .skill .right-skill .inner-layer {
            background-color: #5e0c1a;
            height: 100%;
            border-radius: inherit;
        }

        .right-part {
            padding: 2.8rem;
        }

        .right-part .banner {
            font-family: 'Open Sans', sans-serif;
            color: #85575e;
            margin-bottom: 2.2rem;
        }

        .right-part .banner .firstname {
            font-size: 4rem;
        }

        .right-part .banner .lastname {
            font-size: 4rem;
            font-weight: 400;
            letter-spacing: 0.5rem;
            margin-top: -1rem;
        }

        .right-part .banner .position {
            letter-spacing: 0.3rem;
            margin-top: -0.5rem;
            font-size: 1.1rem;
        }

        .work-container {
            margin-top: 5rem;
            font-family: 'Lato', sans-serif;
        }

        .work-container .work:not(:last-child) {
            margin-bottom: 1.8rem;
        }

        .work-container .work .job-date {
            display: flex;
            justify-content: space-between;
            color: #5e0c1a;
            margin-bottom: 0.5rem;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .work-container .work .company-name {
            font-size: 0.9rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #553339;

        }

        .work-container .work .work-text {
            color: #737373;
            font-size: 0.8rem;
            text-align: justify;
            line-height: 1rem;
        }

        .references-container .references {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            font-family: 'Lato', sans-serif;
            color: #737373;


        }

        .references-container .references .name {
            font-weight: 800;
            font-size: 1.1rem;
        }

        .references-container .references .company-name {
            margin: 0.5rem 0;
            font-size: 0.9rem;
        }

        .references-container .references .phone {
            display: flex;
            justify-content: space-between;
            font-size: 0.7rem;
            color: #3b3542;
        }

        .references-container .references .phone p {
            margin: 0.4rem 0;
        }

        .references-container .references .phone .phone-text {
            font-weight: 600;
        }

        .text-left {
            text-align: left;
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


    <section class="main-section">
        <div class="left-part">
            <div class="photo-container">
                <img src="profile.jpg" alt="">
            </div>
            <div class="contact-container">
                <h2 class="title">Contact Me</h2>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="contact-text">
                        <p><?= $resume['address'] ?></p>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="contact-text">
                        <p><?= $resume['email_id'] ?></p>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <!-- <div class="contact-text">
                        <p>www.reallygreatsite.com</p>
                    </div>  -->
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-linkedin"></i>
                    </div>
                    <!-- <div class="contact-text">
                        <p>@reallygreatsite</p>
                    </div> -->
                </div>
            </div>

            <div class="education-container">
                <h2 class="title">Education</h2>



                <?php
                if ($edus) {
                    foreach ($edus as $edu) {
                ?>
                        <div class="course">
                            <h2 class="education-title"><span>education-title:- </span><span class="course"><?= $edu['course'] ?></span></h2>
                            <h5 class="college-name"><span>college-name:- </span><?= $edu['institute'] ?></h5>
                            <p class="education-date"><span>education-date:- </span><?= $edu['started'] ?></span> – <span class="working-to"><?= $edu['ended'] ?></span></p>
                        </div>
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
            </div>

            <div class="skills-container">
                <h2 class="title">Skills</h2>
                <!-- 
                 -->

                <?php
                if ($skills) {
                    foreach ($skills as $skill) {
                ?>

                        <div class="skill">
                            <div class="left-skill">
                                <p><?= $skill['skill'] ?></p>
                            </div>
                            <div class="right-skill">
                                <div class="outer-layer">
                                    <div class="inner-layer" style="width: 60%;"></div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                } else {
                    ?>
                    <div class="skill">- I don't have any skills.</div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="right-part">
            <div class="banner">
                <h1 class="firstname"><?= $resume['full_name'] ?></h1>
                <p class="position">
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

        </p>
            </div>

            <div class="work-container ">
                <h2 class="title text-left">work experience</h2>


                <?php
                if ($exps) {
                    foreach ($exps as $exp) {
                ?>

                        <div class="work">
                            <div class="job-date">
                                <p class="job"><span class="job-role"><?= $exp['position'] ?></p>
                                <p class="date"><?= $exp['started'] ?></span> – <span class="working-to"><?= $exp['ended'] ?></span></p>
                            </div>
                            <h2 class="company-name"><?= $exp['company'] ?></h2>
                            <p class="work-text"><?= $exp['job_desc'] ?></p>
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


            </div>

            <div class="references-container">
                <h2 class="title text-left">References</h2>
                <div class="references">
                    <div class="left-references">
                        <h4 class="name"><?= $resume['full_name'] ?></h4>
                        <p class="company-name">Job position, Company Name</p>
                        <div class="phone">
                            <div class="phone-text">
                                <p>Phone:</p>
                                <p>Email:</p>
                            </div>
                            <div class="phone-number">
                                <p>+91-<?= $resume['mobile_no'] ?></p>
                                <p><?= $resume['email_id'] ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>


    <script>
        $("#downloadpdf").click(function() {
            window.jsPDF = window.jspdf.jsPDF
            var doc = new jsPDF();

            var page = document.querySelector('.page');

            doc.html(page, {
                callback: function(doc) {
                    doc.save('<?= $resume['full_name'] ?> - <?= $resume['resume_title'] ?>.pdf');
                },
                margin: [2, 2, 2, 2],
                x: 0,
                y: 0,
                width: 200,
                windowWidth: 800
            });
        })



        $("#print").click(function() {
            $(".extra").hide();

            window.print();

            setTimeout(() => {
                $(".extra").show();
            }, 500);

        })
    </script>

</body>




</html>