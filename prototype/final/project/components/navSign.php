<?php
session_start();
include_once 'connect.php';
$stmt = $link->prepare("SELECT COUNT(*) FROM `requests` WHERE `state` = 1 AND  `seen` = 0 AND student_id ='" . $_SESSION['id'] . "'");
$stmt->execute();
$count = $stmt->get_result();
$count = $count->fetch_assoc()['COUNT(*)'];
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Student Affairs</title>
        <link rel="shortcut icon" href="images/icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style type="text/css">
    .smallImge {
        height: 49px;
        width: 49px;
        position: relative;
    }

    .Icons_Button {
        height: 150px;
        width: 150px;
        position: relative;
        float: left;
    }

    .events {
        height: 300px;
        width: 300px;
        position: relative;
        float: left;
        background-color: aquamarine;
        margin: 100px;
    }

    #events {
        background-color: beige;
        border: solid;
    }

    .buttons {
        border: solid;
        background-color: #800000;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        opacity: 1;


    }

    .font_button {
        color: #FFFAFA;
        position: relative;
        float: inherit;
        opacity: 1;
    }

    #rowstyle {
        position: relative;
        margin-top: 15%;
        margin-left: 15%;
        margin-right: 0;

    }

    .Request_order {
        margin-left: 25%;
        margin-top: 10%;
        opacity: 1;
        position: relative;
        float: left;
    }

    .question {
        margin-left: 50%;
        margin-top: 0%;
        opacity: 1 !important;
        position: relative;
        float: left;
    }

    .profile {
        margin-left: 75%;
        margin-top: 0px;
        opacity: 1;
        position: relative;
        float: left;
    }

    .navbar {
        background-color: #800000 !important;
        height: 50px;
    }

    .nav-link {
        font-weight: 700;
        font-size: 18px;
        color: #FFFAFA !important;
        margin-left: 50px;

    }

    .nav-item:hover {
        cursor: pointer;
        color: black !important;
    }

    .fa:hover {
        color: black !important;
    }

    #sign {
        margin-bottom: 30px;
    }
    }

    .bimg {
        opacity: 1;
    }

    .buttons:hover {
        border-style: inset !important;
        cursor: pointer;
    }

    .nav-link:hover {
        color: black !important;
    }

    /*comment*/
    @media only screen and (max-width: 991px) {
        .dropdown-menu {
            padding-top: 0px !important;
            margin-top: 0px !important;
        }

        .passwordinput {
            margin-top: 5% !important;
        }

        .signbutton {
            margin-top: 2% !important;
            margin-bottom: 2% !important;

        }

        .signupbutton {
            margin-top: 1% !important;
            margin-bottom: 1% !important;

        }
    }

    @media only screen and (max-width: 765px) {
        .dropdown-menu {
            padding-top: 0px !important;
            margin-top: 0px !important;
        }

        .passwordinput {
            margin-top: 2% !important;
            margin-left: 142px !important;
        }

        .signbutton {
            margin-top: 2% !important;
            margin-bottom: 2% !important;

        }

        .signupbutton {
            margin-top: 2% !important;
        }
    }

    @media only screen and (max-width: 575px) {
        .dropdown-menu {
            /*  padding-top: 0px !important;
*/
        }

        .emailinput {
            margin-top: 0% !important;
        }

        .passwordinput {
            margin-top: 1.5% !important;
            margin-left: 0% !important;
        }

        .signbutton {
            margin-top: 2% !important;
            margin-bottom: 2% !important;

        }

        .signupbutton {
            margin-top: 1% !important;
            margin-bottom: 1% !important;

        }
    }
    </style>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a><img src="images/studentAfaairs_icon.png" class="smallImge"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="homesign.php">Home <span class="sr-only">(current)</span></a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">About</a>
                    </li>
                </ul>
                <li style="list-style-type: none;" class="nav-item dropdown" style="">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell-o" style="font-size:30px;color:white"></i><span class="badge badge-light">
                            <?=$count?></span>
                    </a>
                    <div style="" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
if (strpos($_SESSION['email'], "@employees.com") === false) {
    $query = "SELECT type FROM `requests` WHERE `state` = 1 AND  `seen` = 0 AND student_id ='" . $_SESSION['id'] . "'";
    if ($result = mysqli_query($link, $query)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
                        <a class="notification dropdown-item" href="#">تم استخراج
                            <?=$row["type"]?></a>
                        <?php }}}?>
                        <div class="dropdown-divider"></div>
                        <a id="clear" class="dropdown-item" style="text-align: center;" href="#">Clear</a>
                    </div>
                </li>
                <li style="list-style-type: none; margin-right: 30px;" class="nav-item dropdown" style="">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Welcome
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="controllers/logout.php">Logout</a>
                    </div>
                </li>
            </div>
        </nav>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#clear").click(function() {
                $(".notification").html("");
            });
        });
        </script>
    </body>

</html>