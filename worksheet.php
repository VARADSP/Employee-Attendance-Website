<?php
include('connection.php');

/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if (strcmp($_SESSION['logged_in'],'yes')!=0) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: logout.php");



}
$sel = "select * from worksheet";

$ex = $con->query($sel);




if(isset($_POST['addwork']))
{
	$u = $_REQUEST['project'];
	$e = $_REQUEST['deadline'];
  $e1 = $_REQUEST['totalhours'];
  $e2 = $_REQUEST['remaininghours'];
  $e3 = $_REQUEST['date'];
  $e4 = $_REQUEST['hours'];
  $e5 = $_REQUEST['desc'];

	$ins = "insert into worksheet(project,deadline,totalhours,remaininghours,date,hours,descr) values('$u','$e','$e1','$e2','$e3','$e4','$e5')";



	$ex = $con->query($ins);



//	header('location:worksheet.php');
}





 ?>
<html>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/worksheet.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:25 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <title>Timing Sheet - HRMS admin template</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
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
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">Timing Sheet</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="#" class="btn btn-primary rounded" data-toggle="modal" data-target="#add_todaywork"><i class="fa fa-plus"></i> Add Today Work</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0 datatable">
									<thead>
										<tr>
											<th>Employee</th>
											<th>Date</th>
											<th>Projects</th>
											<th class="text-center">Assigned Hours</th>
											<th class="text-center">Hours</th>
											<th class="text-center">Description</th>
											<th class="text-right">Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<a href="profile.html" class="avatar">J</a>
												<h2><a href="profile.html">Sanjay<span>Worker</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>leath machine</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">7</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">R</a>
												<h2><a>Raju<span>Worker</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>material management</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">J</a>
												<h2><a>Sanket <span>Worker</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>welding shop</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">M</a>
												<h2><a>Vivek <span>Office Staff</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>cleaner </h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">W</a>
												<h2><a>akshay <span>Office Staff</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>leath machine</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">7</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">J</a>
												<h2><a>Ramesh<span>Worker</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>material management</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">B</a>
												<h2><a>Suyog <span>Worker</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>welding shop</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">L</a>
												<h2><a>Rohit <span>Office Staff</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>cleaner </h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">J</a>
												<h2><a>Rohan<span>Office Staff</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>Washing pipe</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">9</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">L</a>
												<h2><a>Loren Gatlin <span>Worker</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>leath machine</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">T</a>
												<h2><a>Sumedh <span>Worker</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>material management</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<a class="avatar">C</a>
												<h2><a>Suresh <span>Worker</span></a></h2>
											</td>
											<td>5 Aug 2017</td>
											<td>
												<h2>welding shop</h2>
											</td>
											<td class="text-center">8</td>
											<td class="text-center">12</td>
											<td class="col-md-4">Regular worker. work here from 3 year. Leaving in aurangabad. work on Welding pipe line.</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_todaywork"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_workdetail"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
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
												<span class="message-author"> mahesh </span>
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
			<div id="delete_workdetail" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Work Details</h4>
						</div>
						<div class="modal-body card-box">
							<p>Are you sure want to delete this?</p>
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="add_todaywork" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Add Today Work details</h4>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Project <span class="text-danger">*</span></label>
									<select class="select" name="project">
										<option value="">leath machine</option>
										<option value="">material management</option>
										<option value="">welding shop</option>
										<option value="">cleaner </option>
									</select>
								</div>
								<div class="row">
									<div class="form-group col-sm-4">
										<label>Deadline <span class="text-danger">*</span></label>
										<div class="cal-icon"><input class="form-control datetimepicker" name="deadline" type="text"></div>
									</div>
									<div class="form-group col-sm-4">
										<label>Total Hours <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="totalhours" value="100">
									</div>
									<div class="form-group col-sm-4">
										<label>Remaining Hours <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="remaininghours">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-sm-6">
										<label>Date <span class="text-danger">*</span></label>
										<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date"></div>
									</div>
									<div class="form-group col-sm-6">
										<label>Hours <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="hours">
									</div>
								</div>
								<div class="form-group">
									<label>Description <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="desc"></textarea>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary" type="submit" name="addwork">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_todaywork" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Edit Work Details</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Project <span class="text-danger">*</span></label>
									<select class="select">
										<option value="">leath machine</option>
										<option value="">material management</option>
										<option value="">welding shop</option>
										<option value="">cleaner </option>
									</select>
								</div>
								<div class="row">
									<div class="form-group col-sm-6">
										<label>Date <span class="text-danger">*</span></label>
										<div class="cal-icon"><input class="form-control datetimepicker" value="03/08/2017" type="text"></div>
									</div>
									<div class="form-group col-sm-6">
										<label>Hours <span class="text-danger">*</span></label>
										<input class="form-control" type="text" value="9">
									</div>
								</div>
								<div class="form-group">
									<label>Description <span class="text-danger">*</span></label>
									<textarea rows="4" cols="5" class="form-control">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel elit neque.</textarea>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Save Changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="assets/js/select2.min.js"></script>
		<script type="text/javascript" src="assets/js/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/worksheet.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:25 GMT -->
</html>
