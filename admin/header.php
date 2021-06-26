<?php

date_default_timezone_set("asia/calcutta");

?>
<!DOCTYPE html>
<html>
<title>Admin Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

html,body,h1,h2,h3,h4,h5 {font-family:"Raleway",align:"center"; }
.btn
{
float:right;
background-color: #98B7F4; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
}
.btn:hover {
  background-color: #2A4374;
  color: white;
}
.dropbtn  {
  background-color: #090b12;
  color: white;
  padding:10px 24px;
  font-size: 16px;
  cursor: pointer;
  border: none;
  display:block;
  width:100%;
}

.dropdown {
  position: relative;
  display: block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: ;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 12px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #080505;}

#pkg {
  font-family: ;
  border-collapse: collapse;
  width: 80%;

}

#pkg td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;

}

#pkg tr:nth-child(even){background-color: #f2f2f2;}

#pkg tr:hover {background-color: #ddd;}

#pkg  th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;

}

</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Admin Dashboard</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-black w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="admin.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Admin</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>

    <div class="dropdown">

      <button class="dropbtn">Trainer</button>
      <div class="dropdown-content">
        <a href="viewtrainer.php">View Trainer</a>
        <a href="addtrainer.php">Add Trainer</a>
        <a href="viewschedule.php">View Schedule</a>

      </div>



    </div>
    <div class="dropdown">
      <button class="dropbtn">Users</button>
      <div class="dropdown-content">
        <a href="listusers.php">Registered Users</a>
        <a href="newusers.php">New Registrations</a>
      </div>
    </div>


    <div class="dropdown">
      <button class="dropbtn">Package</button>
      <div class="dropdown-content">
        <a href="viewpkg.php">View Package</a>
        <a href="addpkg.php">Add Package</a>

      </div>
    </div>


    <div class="dropdown">
      <button class="dropbtn">Snack Bar</button>
      <div class="dropdown-content">
        <a href="viewsb.php">View Snack Bar Items </a>
        <a href="addsb.php">Add Snack Bar Items</a>

      </div>
    </div>


    <div class="dropdown">
    <button class="dropbtn">Equipments</button>
      <div class="dropdown-content">
        <a href="viewequipment.php">View Equipments</a>
        <a href="addequipment.php">Add Equipments</a>
      </div>


    </div>
    <div class="dropdown">
    <button class="dropbtn">Leaves</button>
      <div class="dropdown-content">
        <a href="listLeaves.php">New Application</a>

      </div>
    </div>
    <div class="dropdown">
    <button class="dropbtn">Feedbacks</button>
      <div class="dropdown-content">
        <a href="listfeedbacks.php">List</a>

      </div>


    </div>
     <div class="dropdown">
    <button class="dropbtn">Logout</button>
      <div class="dropdown-content">
        <a href="logout.php">Logout</a>

      </div>
    </div>



  </div>
</nav>
  <hr><hr>
