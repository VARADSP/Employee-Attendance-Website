<?php

/* Displays user information and some useful messages */
session_start();


include('connection.php');




// Check if user is logged in using the session variable
if (strcmp($_SESSION['logged_in'],'yes')!=0)
{
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: logout.php");
}


if(isset($_POST['createcontact']))
{
	$u = $_REQUEST['name'];
	$e = $_REQUEST['mobileno'];
  $e1 = $_REQUEST['email'];
  $e2 = $_REQUEST['address'];

	$ins = "insert into users(name,mobileno,email,address) values('$u','$e','$e1','$e2')";

	$ex = $con->query($ins);

	header('location:contacts.php');
}


$sel = "select * from users";

$ex = $con->query($sel);



if(isset($_REQUEST['del_id']))
{
	$d = $_REQUEST['del_id'];
	$del = "delete from users where id = '$d'";
	$ex = $con->query($del);
	header('location:contacts.php');

}






 ?>
<html>


<!-- Mirrored from dreamguys.co.in/smarthr/purple/contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:24 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Contacts - HRMS admin template</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->


</head>

<body>
    <div class="main-wrapper">
            <div class="header">
                <div class="header-left">
                    <a href="index.html" class="logo">
						<img src="assets/img/logo.png" width="40" height="40" alt="">
					</a>
                </div>
                <div class="page-title-box pull-left">
					<h3>TimeLabs</h3>
                </div>
				<a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>

				<div class="dropdown mobile-user-menu pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="profile.html">My Profile</a></li>
						<li><a href="edit-profile.html">Edit Profile</a></li>
						<li><a href="settings.html">Settings</a></li>
						<li><a href="login.html">Logout</a></li>
					</ul>
				</div>
            </div>
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
              <li class="active">
                <a href="dashboard.php">Dashboard</a>
              </li>
              <li class="submenu">
                <a href="#" class="noti-dot"><span> Employees</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                  <li><a href="#">All Employees</a></li>
                  <li><a href="holidays.php">Holidays</a></li>
                  <li><a href="leaverequest.php"><span>Leave Requests</span> <span class="badge bg-primary pull-right">1</span></a></li>
                  <li><a href="attendance.php">Attendance</a></li>

                </ul>
              </li>


              <li>
                <a href="contacts.php">Contacts</a>
              </li>


              <li>
                <a href="worksheet.php">Timing Sheet</a>
              </li>

              <li>
                <a href="users.php">Users</a>
              </li>


              <li class="submenu">
                <a href="#"><span> Pages </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled" style="display: none;">
                  <li><a href="logout.php"> Logout </a></li>

                  <li><a href="profile.html"> Profile </a></li>
                </ul>
              </li>
						</ul>
					</div>
                </div>
            </div>
        <div class="page-wrapper">
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-xs-12 message-view">
                        <div class="chat-window">
                            <div class="chat-header">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="page-title m-b-0 m-t-5">Contacts</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="navbar">
                                            <ul class="nav navbar-nav pull-right chat-menu">
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="message-search m-t-0">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" id="filterInput1" placeholder="Search">
                                                    <span class="input-group-btn">
															<button class="btn" type="button"><i class="fa fa-search"></i></button>
														</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-contents">
                                <div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="contact-box clearfix">
                                            <div class="contact-cat col-xs-12 col-sm-4 col-lg-3">
                                                <a href="#" class="btn btn-primary rounded" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add Contact</a>
                                                <div class="roles-menu">
                                                    <ul class="nav">
                                                        <li class="active"><a href="javascript:void(0);">All</a></li>
                                                        <li><a href="#">Worker</a></li>
                                                        <li><a href="#">Office Staff</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="contacts-list col-xs-12 col-sm-8 col-lg-9">
                                                <ul class="contact-list" id="names">
                                                  <?php
                                                  while($rw = $ex->fetch_object())
                                                  {
                                                      ?>

                                                    <li class="collection-item">
                                                        <div class="contact-cont">
                                                            <div class="pull-left user-img m-r-10">
                                                                <a href="profile.php?id=<?php echo $rw->id; ?>" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 img-circle"><span class="status online"></span></a>
                                                            </div>
                                                            <div class="contact-info">
                                                                <span class="contact-name text-ellipsis" id="contactname"><?php echo $rw->name; ?></span>
                                                                <span class="contact-date"><?php echo $rw->address; ?></span>
                                                            </div>
                                                            <ul class="contact-action">
                                                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a href="javascript:void(0)">Edit</a></li>
                                                                        <li><a href="contacts.php?del_id=<?php echo $rw->id; ?>">Delete</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <?php } ?>



                                                </ul>
                                            </div>
                                            <div class="contact-alphapets">
                                                <div class="alphapets-inner">
                                                    <a href="#">A</a>
                                                    <a href="#">B</a>
                                                    <a href="#">C</a>
                                                    <a href="#">D</a>
                                                    <a href="#">E</a>
                                                    <a href="#">F</a>
                                                    <a href="#">G</a>
                                                    <a href="#">H</a>
                                                    <a href="#">I</a>
                                                    <a href="#">J</a>
                                                    <a href="#">K</a>
                                                    <a href="#">L</a>
                                                    <a href="#">M</a>
                                                    <a href="#">N</a>
                                                    <a href="#">O</a>
                                                    <a href="#">P</a>
                                                    <a href="#">Q</a>
                                                    <a href="#">R</a>
                                                    <a href="#">S</a>
                                                    <a href="#">T</a>
                                                    <a href="#">U</a>
                                                    <a href="#">V</a>
                                                    <a href="#">W</a>
                                                    <a href="#">X</a>
                                                    <a href="#">Y</a>
                                                    <a href="#">Z</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">See all messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="add_holiday" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-md">
          <div class="modal-header">
            <h4 class="modal-title">Add Contact</h4>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label>Employee Name <span class="text-danger">*</span></label>
                <input class="form-control" required="" type="text" name="name">
              </div>
              <div class="form-group">
                <label>Employee Mobileno <span class="text-danger">*</span></label>
                <input class="form-control" required="" type="text" name="mobileno">
              </div>
              <div class="form-group">
                <label>Employee Email Address <span class="text-danger">*</span></label>
                <input class="form-control" required="" type="text" name="email">
              </div>
              <div class="form-group">
                <label>Employee Designation <span class="text-danger">*</span></label>
                <input class="form-control" required="" type="text" name="address">
              </div>
                <div class="m-t-20 text-center">
                <button type="submit" name="createcontact" class="btn btn-primary">Create Contact</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>



      <script text="javascript">
      //Get Input Elemenet
        var filterInput = document.getElementById('filterInput1');

        //add event listener
        filterInput.addEventListener('keyup',filterNames);

        function filterNames(e){

          var filterValue = document.getElementById('filterInput1').value.toUpperCase();

          //Get Names ul

          var ul = document.getElementById('names');





          //Get li from ul
            var li = ul.querySelectorAll('li.collection-item');

            //console.log(li);

            //Loop Through collcetion items
            for(var i=0;i<li.length;i++){
              var a = li[i].getElementsByTagName('div')[0];
              console.log(a);

              //if matches
                if(a.innerHTML.toUpperCase().indexOf(filterValue) > -1){

                  li[i].style.display = 'block';


                }else{
                  li[i].style.display = 'none';

                }
            }



        }
      </script>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>


</body>


<!-- Mirrored from dreamguys.co.in/smarthr/purple/contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:24 GMT -->
</html>
