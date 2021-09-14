<?php 
require_once"config.php";

$name=$number=$pickup=$destination=$date=$time=$level="";
$name_error=$number_error=$pickup_error=$destination_error=$date_error=$time_error=$level_error="";

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$input_name=trim($_POST['name']);
	if (empty($input_name)) {
		$name_error="Name is required";
	}else{
		$sql="SELECT * FROM booking WHERE name='$input_name'";
		$exQuery=mysqli_query($conn,$sql);

		if ($exQuery) {
			if (mysqli_num_rows($exQuery)>0) {
				$name_error="name already exists";
			}else{
				$name=$input_name;
			}
		}else{
			echo "query failed";

		}

	}
$input_number=trim($_POST['number']);
if (empty($input_number)) {
	$number_error="number is required";
}else{
	$number=$input_number;
}

$input_pickup=trim($_POST['pickup']);
if (empty($input_pickup)) {
	$pickup_error="pickup is required";
}else{
	$pickup=$input_pickup;
}

$input_destination=trim($_POST['destination']);
if (empty($input_destination)) {
	$destination_error="Destination is required";
}else{
	$destination=$input_destination;
}

$input_date=trim($_POST['date']);
if (empty($input_date)) {
	$date_error="date is required";
}else{
	$date=$input_date;
}

$input_time=trim($_POST['time']);
if (empty($input_time)) {
	$time_error="tine is required";
}else{
	$time=$input_time;
}
	

$input_level=trim($_POST['level']);
if(empty($input_level)){
	$level_error="level is required";
}else{
	$level=$input_level;
}


if (empty($name_error) && empty($number_error) && empty($pickup_error) && empty($destination_error)
&& empty($date_error) && empty($time_error)) {
    // check account details in the database
    $sql="SELECT id,name,number,pickup,destination,date,time,level  FROM booking WHERE name='$name'";
    if (empty($name_error) && empty($number_error) && empty($pickup_error) && empty($destination_error)
     && empty($data_error) && empty($time_error)) {
        $sql="INSERT INTO booking(name,number,pickup,destination,date,time,level)
         VALUES('$name','$number','$pickup','$destination','$date','$time','$level')";
        if (mysqli_query($conn,$sql)) {
            header("location:booking.php");
            exit();
        }else{
            echo "Error creating account";
        }
    }else{
        echo "Field errors";
    }
    
    }

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="booking/css/booking.css">
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/style1.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/camera.js"></script>

</head>
<body>
	<div class="container">
  <header>
				<div class="menu_block ">
					<div class="container_12">
						<div class="grid_12">
							<nav class="horizontal-nav full-width horizontalNav-notprocessed">
								<ul class="sf-menu">
									<li><a href="index.html">Home</a></li>
									<li><a href="about.html">About</a></li>
									<li class="current"><a href="booking.php">booking</a></li>
                  <li><a href="cars.html">car</a></li>
									<li><a href="services.html">Services</a></li>
									<li><a href="contacts.html">Contacts</a></li>
									<li><a href="login.html">login</a></li>
									
								</ul>
							</nav>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</header>
	<div class="col-md-6 offset-3">
		<h3 class="text-center">EMATATU LINE</h3>
<form action="booking.php" method="post">
	<h3 class="text-center">BOOKING</h3>
  <div class="form-group">
    
    <label for='name'  >Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
    <span class="text-danger"><?php echo $name_error; ?></span>
  </div>

  <div class="form-group">
    <label for='number'>Number</label>
    <input type="number" class="form-control" id="number" name="number" placeholder="Enter number">
     <span class="text-danger"><?php echo $number_error; ?></span>
  </div>

  <div class="form-group ">
    <label for='pickup'>Pickup</label>
    <input type="text" class="form-control" id="pickup" placeholder="Enter pickup point" name="pickup">
    <span class="text-danger"><?php echo $pickup_error; ?></span>
  </div>

  <div class="form-group ">
    <label for='destination'>Destination</label>
    <input type="text" class="form-control" id="destination" placeholder="Enter destination" name="destination">
    <span class="text-danger"><?php echo $destination_error; ?></span>
  </div>
  <div class="form-group ">
    
    <label for='date'>Date</label>
    <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
    <span class="text-danger"><?php echo $date_error; ?></span>
  </div>
  <div class="form-group ">
    
    <label for='time'>Time</label>
    <input type="time" class="form-control" id="time" placeholder="Enter time"name="time">
      <span class="text-danger"><?php echo $time_error; ?></span>

  </div>
  <div class="form-group">
  <label for="level">Choose a level:</label>

<select class=" form-control" name="level" id="level">
  <option value="economy">economy</option>
  <option value="standard">standard</option>
  <option value="business">business</option>
  </select>
  
  
</form>



</body>
</html>
 

<button type="submit" class="btn btn-primary">Booking</button>
 
</form>

</div>
</div>
</body>
</html>