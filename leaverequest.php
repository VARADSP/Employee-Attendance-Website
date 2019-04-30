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


if(isset($_POST['createleave']))
{
	$u = $_REQUEST['emp_name'];
	$e = $_REQUEST['mobileno'];
  $e1 = $_REQUEST['leavestartdate'];
  $e2 = $_REQUEST['leaveenddate'];
  $e3 = $_REQUEST['leavereason'];


	$ins = "insert into leaverequest(emp_name,mobileno,leavestartdate,leaveenddate,leavereason) values('$u','$e','$e1','$e2','$e3')";

	$ex = $con->query($ins);

	header('location:leaverequest.php');
}

if(isset($_POST['editbtn']))
{
  $ins = "update holidays set holidayname='$holidayname' where id='$id'";
  $ins1 = "update holidays set holidaydate='$holidaydate' where id='$id'";


  	$ex = $con->query($ins);


    	$ex = $con->query($ins1);
      	header('location:leaverequest.php');


}

$sel = "select * from leaverequest";

$ex = $con->query($sel);



if(isset($_REQUEST['del_id']))
{
	$d = $_REQUEST['del_id'];
	$del = "delete from leaverequest where id = '$d'";
	$ex = $con->query($del);
	header('location:leaverequest.php');

}




 ?>
<html>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/holidays.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <title>Holidays - HRMS admin template</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
							<h4 class="page-title">Leave Requests</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="#" class="btn btn-primary rounded" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add New Leave Request</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0">
									<thead>

										<tr>
											<th>#</th>
											<th>Employee Name </th>
											<th>Employee Mobile No</th>
											<th>Leave Start Date</th>
                      <th>Leave End Date</th>
                      <th>Leave Reason</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>

									<tbody>
                    <?php
                    while($rw = $ex->fetch_object())
                    {
                        ?>
										<tr class="holiday-upcoming">
											<td><?php echo $rw->id; ?></td>
											<td><?php echo $rw->emp_name; ?></td>
											<td><?php echo $rw->mobileno; ?></td>
                      <td><?php echo $rw->leavestartdate; ?></td>
                      <td><?php echo $rw->leaveenddate; ?></td>
                      <td><?php echo $rw->leavereason; ?></td>

											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<!-- <li><a href="<?php// $edit_id = $rw->id; ?>" data-toggle="modal" data-target="#edit_holiday" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li> -->
														<li><a href="leaverequest.php?del_id=<?php echo $rw->id; ?>"  title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
													</ul>
												</div>
											</td>
										</tr>
                    <?php
                  }
                  ?>

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
			<div id="delete_holiday" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Holiday</h4>
						</div>
						<form>
							<div class="modal-body card-box">
								<p>Are you sure want to delete this?</p>
								<div class="m-t-20 text-left">
									<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-danger">Delete</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="add_holiday" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Add Leave Request</h4>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Employee Name <span class="text-danger">*</span></label>
									<input class="form-control" required="" type="text" name="emp_name">
								</div>
                <div class="form-group">
									<label>Employee Mobile No <span class="text-danger">*</span></label>
									<input class="form-control" required="" type="text" name="mobileno">
								</div>

								<div class="form-group">
									<label>Leave Start Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="leavestartdate"></div>
								</div>

                <div class="form-group">
									<label>Leave End Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="leaveenddate"></div>
								</div>

                <div class="form-group">
									<label>Leave Reason <span class="text-danger">*</span></label>
									<input class="form-control" required="" type="text" name="leavereason">
								</div>



								<div class="m-t-20 text-center">
									<button type="submit" name="createleave" class="btn btn-primary">Create Leave</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_holiday" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Edit Holiday</h4>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Holiday Name <span class="text-danger">*</span></label>
									<input class="form-control" value="<?php $holidayname?>" required="" type="text">
								</div>
								<div class="form-group">
									<label>Holiday Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" value=""<?php $holidaydate?>"" required="" type="text"></div>
								</div>
								<div class="m-t-20 text-center">
									<button type="submit" name="editbtn" class="btn btn-primary">Edit Holiday</button>
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
		<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="assets/js/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/holidays.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:20 GMT -->
</html>
