<?php


include('connection.php');

/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if (strcmp($_SESSION['logged_in'],'yes')!=0) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: logout.php");



}
$sel = "select * from attendance";

$ex = $con->query($sel);




if(isset($_REQUEST['del_id']))
{
	$d = $_REQUEST['del_id'];
	$del = "delete from attendance where id = '$d'";
	$ex = $con->query($del);
	header('location:attendance.php');

}

if(isset($_REQUEST['search1']))
{
	$n = $_REQUEST['empname1'];
  $m = $_REQUEST['month1'];
  $y = $_REQUEST['year1'];
	$del = "select * from attendance where empname = '$n' and month='$m' and year='$y'";
	$ex = $con->query($del);

  var_dump($ex);
	header('location:attendance.php');

}



if(isset($_POST['createholiday']))
{
	$u = $_REQUEST['empname'];
	$e = $_REQUEST['absentdays'];
  $e1 = $_REQUEST['month'];
  $e2 = $_REQUEST['year'];

	$ins = "insert into attendance(empname,absentdays,month,year) values('$u','$e','$e1','$e2')";

	$ex = $con->query($ins);

	header('location:attendance.php');
}

 ?>
<html>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/attendance.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <title>Attendance - HRMS admin template</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
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
						<li><a href="logout.php">Logout</a></li>
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
							<h4 class="page-title">Attendance Sheet</h4>

						</div>
            <div class="col-sm-4 text-right m-b-30">
							<a href="#" class="btn btn-primary rounded" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Mark Attendance</a>
						</div>
					</div>
          <form method="post">
					<div class="row filter-row">
						<div class="col-sm-3 col-xs-6">
							<div class="form-group form-focus">
								<label class="control-label">Employee Name</label>
								<input type="text" name="empname1" class="form-control floating" id="filterInput1" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="form-group form-focus select-focus">
								<label class="control-label">Select Month</label>
								<select class="select floating" name="month1">
									<option>-</option>
									<option>January</option>
									<option>February</option>
									<option>March</option>
									<option>April</option>
									<option>May</option>
									<option>Jun</option>
									<option>July</option>
									<option>August</option>
									<option>September</option>
									<option>Octomber</option>
									<option>November</option>
									<option>December</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="form-group form-focus select-focus">
								<label class="control-label">Select Year</label>
								<input type="text" name="year1" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<a href="#" class="btn btn-success btn-block" name="search1" type="submit"> Search </a>
						</div>
                    </div>
                  </form>
                    <div class="row">
                        <div class="col-lg-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0">
									<thead>
										<tr>
											<th>Employee</th>
                      	<th>Month</th>
                        	<th>Year</th>
											<th>1</th>
											<th>2</th>
											<th>3</th>
											<th>4</th>
											<th>5</th>
											<th>6</th>
											<th>7</th>
											<th>8</th>
											<th>9</th>
											<th>10</th>
											<th>11</th>
											<th>12</th>
											<th>13</th>
											<th>14</th>
											<th>15</th>
											<th>16</th>
											<th>17</th>
											<th>18</th>
											<th>19</th>
											<th>20</th>
											<th>22</th>
											<th>23</th>
											<th>24</th>
											<th>25</th>
											<th>26</th>
											<th>27</th>
											<th>28</th>
											<th>29</th>
											<th>30</th>

											<th>31</th>
                      <th>31</th>
										</tr>
									</thead>
									<tbody>

                    <?php
                    while($rw = $ex->fetch_object())
                    {





                        ?>
										<tr id="names">
											<td class="collection-item"><?php echo $rw->empname; ?></td>
                      <td><?php echo $rw->month; ?></td>
                      <td><?php echo $rw->year; ?></td>

                      <?php
                      $integerIDs = array_map('intval', explode(',', $rw->absentdays));


                      for ($i = 1; $i <= 31; $i++) {


                        if(in_array($i,$integerIDs)){





                       ?>
											<td id="mark"><i class="fa fa-close text-danger"></i> </td>



                      <?php
                    }
                    else{


                       ?>

                       <td id="mark"><i class="fa fa-check text-success"></i> </td>

                        <?php

                      }
                    }



                         ?>

                         <td class="text-right">
                        <div class="dropdown">
                          <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                          <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="<?php// $edit_id = $rw->id; ?>" data-toggle="modal" data-target="#edit_holiday" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li> -->
                            <li><a href="attendance.php?del_id=<?php echo $rw->id; ?>"  title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
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
        </div>



        <div id="add_holiday" class="modal custom-modal fade" role="dialog">
          <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content modal-md">
              <div class="modal-header">
                <h4 class="modal-title">Mark Attendance</h4>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="form-group">
                    <label>Employee Name <span class="text-danger">*</span></label>
                    <input class="form-control" required="" type="text" name="empname">
                  </div>
                  <div class="form-group">
                    <label>Month <span class="text-danger">*</span></label>
                    <input class="form-control" required="" type="text" name="month" placeholder="e.g. January,February">
                  </div>
                  <div class="form-group">
                    <label>Year <span class="text-danger">*</span></label>
                    <input class="form-control" required="" type="text" name="year" placeholder="e.g. 2019,2018">
                  </div>

                  <div class="form-group">
                    <label>Absent Days <span class="text-danger">*</span></label>
                    <input class="form-control" required="" type="text" name="absentdays" placeholder="Enter days e.g 1,15,31">
                  </div>

                  <div class="m-t-20 text-center">
                    <button type="submit" name="createholiday" class="btn btn-primary">Mark Attendance</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>



		<div class="sidebar-overlay" data-reff="#sidebar"></div>






    <script text="javascript">
    //Get Input Elemenet
      var filterInput = document.getElementById('filterInput1');

      //add event listener
      filterInput.addEventListener('keyup',filterNames);

      function filterNames(e){

        var filterValue = document.getElementById('filterInput1').value.toUpperCase();

        //Get Names ul

        var ul = document.getElementById('names');

          console.log(ul);




        //Get li from ul
          var li = document.querySelectorAll('table td.collection-item');

          console.log(li);

          //Loop Through collcetion items
          for(var i=0;i<li.length;i++){


             var a = li[i];


            //if matches
              if(a.innerText.toUpperCase().indexOf(filterValue) > -1){

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
		<script type="text/javascript" src="assets/js/select2.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/purple/attendance.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Oct 2018 15:44:20 GMT -->
</html>
