<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./images/favicon.ico">

    <title>SIS - School Information System</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/sticky-footer-navbar.css" rel="stylesheet">
	
	<script src="./js/jquery-3.3.1.min.js"></script>

	<link href="./jqueryUI/jquery-ui.css" rel="stylesheet">
	<script src="./jqueryUI/jquery-ui.js"></script>
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">SIS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href=".">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./students.php">Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./courses.php">Courses</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="./grades.php">Grades</a>
            </li>
          </ul>
          <form id="form" class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" name="keywords" placeholder="Search" aria-label="Search" value="<?=safeGet('keywords')?>" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
        <script type="text/javascript">
      $(document).ready(function() {
      var href = document.location.href;
      var sub = href.substr(href.lastIndexOf('/')+1);
        if(sub.includes("courses"))
        {
          document.getElementById("form").setAttribute("action","./courses.php");
        }
        else if(sub.includes("students"))
        {
          document.getElementById("form").setAttribute("action","./students.php");
        }
        else
        {
          document.getElementById("form").setAttribute("action","./customview.php");
        }
        });
    </script>
    <main role="main" class="container">
