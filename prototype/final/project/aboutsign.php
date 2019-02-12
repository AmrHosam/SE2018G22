<?php  session_start();
if (isset($_SESSION['email'])) {

include_once('components/navSign.php');}
else {header("location: index.php");}

?>
<html>
<head>
 <title>About</title>
</head>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
.paddingTB60 {padding:60px 0px 60px 0px;}
.gray-bg {background: #F1F1F1 !important;}
.about-title {}
.about-title h1 {color: #535353; font-size:45px;font-weight:600;}
.about-title span {color: #AF0808; font-size:45px;font-weight:700;}
.about-title h3 {color: #535353; font-size:23px;margin-bottom:24px;}
.about-title p {color: #7a7a7a;line-height: 1.8;margin: 0 0 15px;}
.about-paddingB {padding-bottom: 12px;}
.about-img {padding-left: 57px;}

body {background-color:#F1F1F1;}
</style>


<body>

			<div class="about-section paddingTB60 gray-bg">
                <div class="container">
                    <div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="about-title clearfix">
								<h1>About <span>Student Affairs</span></h1>
								<h3>Mission</h3>
								<p class="about-paddingB">The mission of Student Affairs is to provide services and programs that will enhance the student experience and support the achievement of educational and personal goals for students </p>
								<h3>Purpose </h3>
								<p>To cultivate community and foster relationships among all students, creating a campus climate which will nurture and support student life and learning within and across university programs.
To provide efficient and effective service to students, and supply them with the tools that will enhance their success by overcoming barriers.
To serve as student advocates by mediating problems, issues and conflicts in an expedient manner.
To provide through student government and other activities an opportunity for students to: safely participate in co-curricular activities, maintain leadership roles, expand student responsibility, learn to work effectively with others, and build community relationships.</p>
						
               <h3>Website</h3>
			   <p>Students Affairs Website is a tool that accelerates the workflow of SA department and offers great deal of comfort for both applicants and employees. SA website is an online platform where students can apply for any type of official document, and employees can manage and oversee any type of requests. Online student affairs offers answers for all student’s enquiries and FAQs, easy & quick access to any document procedures, student can manage all his\her requests supported with online payment as well as mail notifications.</p>
	           
	           
	       
							</div>
						</div>
						
                    </div>
                </div>
            </div>
			</body>
</html>			