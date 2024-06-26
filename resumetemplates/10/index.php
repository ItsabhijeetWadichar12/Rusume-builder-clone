


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
</head>

<body>
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
                        <p>123 Anywhere St., Any City, ST 12345</p>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="contact-text">
                        <p>hello@reallygreatsite.com</p>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <div class="contact-text">
                        <p>www.reallygreatsite.com</p>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-linkedin"></i>
                    </div>
                    <div class="contact-text">
                        <p>@reallygreatsite</p>
                    </div>
                </div>
            </div>

            <div class="education-container">
                <h2 class="title">Education</h2>
                <div class="course">
                    <h2 class="education-title">Course Studied</h2>
                    <h5 class="college-name">University/College Details</h5>
                    <p class="education-date">2006 - 2008</p>
                </div>
               
            </div>

            <div class="skills-container">
                <h2 class="title">Skills</h2>
                <div class="skill">
                    <div class="left-skill">
                        <p>Skill Name 01</p>
                    </div>
                    <div class="right-skill">
                        <div class="outer-layer">
                            <div class="inner-layer" style="width: 60%;"></div>
                        </div>
                    </div>
                </div>
                <div class="skill">
                    <div class="left-skill">
                        <p>Skill Name 01</p>
                    </div>
                    <div class="right-skill">
                        <div class="outer-layer">
                            <div class="inner-layer" style="width: 90%;"></div>
                        </div>
                    </div>
                </div>
                <div class="skill">
                    <div class="left-skill">
                        <p>Skill Name 02</p>
                    </div>
                    <div class="right-skill">
                        <div class="outer-layer">
                            <div class="inner-layer" style="width: 40%;"></div>
                        </div>
                    </div>
                </div>
                <div class="skill">
                    <div class="left-skill">
                        <p>Skill Name 03</p>
                    </div>
                    <div class="right-skill">
                        <div class="outer-layer">
                            <div class="inner-layer" style="width: 60%;"></div>
                        </div>
                    </div>
                </div>
                <div class="skill">
                    <div class="left-skill">
                        <p>Skill Name 04</p>
                    </div>
                    <div class="right-skill">
                        <div class="outer-layer">
                            <div class="inner-layer" style="width: 70%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-part">
            <div class="banner">
                <h1 class="firstname">Mariana</h1>
                <h1 class="lastname">Anderson</h1>
                <p class="position">Marketing Manager</p>
            </div>

            <div class="work-container ">
                <h2 class="title text-left">work experience</h2>
                <div class="work">
                    <div class="job-date">
                        <p class="job">Job position here</p>
                        <p class="date">2019 - 2022</p>
                    </div>
                    <h2 class="company-name">Company Name l Location</h2>
                    <p class="work-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pharetra in
                        lorem
                        at laoreet. Donec hendrerit libero eget est tempor, quis tempus arcu elementum. In elementum
                        elit at
                        dui tristique feugiat. Mauris convallis, mi at mattis malesuada, neque nulla volutpat dolor,
                        hendrerit faucibus eros nibh ut nunc. Proin luctus urna i</p>
                </div>

                <div class="work">
                    <div class="job-date">
                        <p class="job">Job position here</p>
                        <p class="date">2019 - 2022</p>
                    </div>
                    <h2 class="company-name">Company Name l Location</h2>
                    <p class="work-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pharetra in
                        lorem
                        at laoreet. Donec hendrerit libero eget est tempor, quis tempus arcu elementum. In elementum
                        elit at
                        dui tristique feugiat. Mauris convallis, mi at mattis malesuada, neque nulla volutpat dolor,
                        hendrerit faucibus eros nibh ut nunc. Proin luctus urna i</p>
                </div>
                <div class="work">
                    <div class="job-date">
                        <p class="job">Job position here</p>
                        <p class="date">2019 - 2022</p>
                    </div>
                    <h2 class="company-name">Company Name l Location</h2>
                    <p class="work-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pharetra in
                        lorem
                        at laoreet. Donec hendrerit libero eget est tempor, quis tempus arcu elementum. In elementum
                        elit at
                        dui tristique feugiat. Mauris convallis, mi at mattis malesuada, neque nulla volutpat dolor,
                        hendrerit faucibus eros nibh ut nunc. Proin luctus urna i</p>
                </div>
            </div>

            <div class="references-container">
                <h2 class="title text-left">References</h2>
                <div class="references">
                    <div class="left-references">
                        <h4 class="name">Name Surname</h4>
                        <p class="company-name">Job position, Company Name</p>
                        <div class="phone">
                            <div class="phone-text">
                                <p>Phone:</p>
                                <p>Email:</p>
                            </div>
                            <div class="phone-number">
                                <p>123-456-7890</p>
                                <p>hello@reallygreatsite.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="right-references">
                        <h4 class="name">Name Surname</h4>
                        <p class="company-name">Job position, Company Name</p>
                        <div class="phone">
                            <div class="phone-text">
                                <p>Phone:</p>
                                <p>Email:</p>
                            </div>
                            <div class="phone-number">
                                <p>123-456-7890</p>
                                <p>hello@reallygreatsite.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>