<?php
    
    require("connection.php");

    if(isset($_SESSION['is_login'])){
        if($_SESSION['is_login']=="no"){
            header('location:../index.php');
            die();
        }
    }
	else {
		header('location:../index.php');
            die();
	}

	
    // if(isset($_SESSION['booked'])){
    //     if($_SESSION['booked']==1){
	// 		// echo "<script>alert('Ticket booked')</script>";
	// 		// $_SESSION['booked']==0;
	// 		unset($_SESSION['booked']);
    //     }
    // }
	$_SESSION['movie']="Select A movie";
	$_SESSION['theatre']="Select a theatre";
	$_SESSION['date']="Select date";
	

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Book My Show</title>
	<link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>

	<nav>
		<div class="logo">
			<p>Book My Movies</p>
		</div>
		<ul>
			<li><a href="" class="active">home</a></li>
			<li><a href="update.php">Update profile</a></li>
			<!-- <li><a href="">Admin login</a></li> -->
			<li><a href="bookings.php">Bookings</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>

	carousel
	<section id="slider" class="pt-5">
		<div class="container mt-5">
			<h1 class="text-center"><b>Trending movies</b></h1>
			<div class="slider">
				<div class="owl-carousel">
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="../images/pushpa2.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Telugu | Pushpa</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
							temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="../images/bajarangi2.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Kannnada | Bajarangi2</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
							temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="../images/madagaja.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Kannnada | Madagaja</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
							temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="../images/83.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Hindi | 83</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
							temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="../images/garuda.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Kannnada | Garuda Gamana <br> Vrishbha Vahana</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
							temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="../images/spiderman.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>English | Spiderman</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
							temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="../images/sakath.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>Kannnada | Sakath</b></h5>
						<p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam
							temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<div class="wrapper">
		<div class="title-text">

			<div class="title signup">
				Ticket Booking
			</div>
		</div>
		<div class="form-container">

			<div class="form-inner">


				<form method="GET" class="signup" >

					<!-- Movies -->
					<select class="hello field form-inne " name="movie" id="Movie">
						<?php if(isset($_GET['movie'])){ 
							$temp=$_GET['movie'];
							$sql="select Name from movies where M_id='$temp'";
							$res_temp_mov=mysqli_query($con,$sql);
							$row=mysqli_fetch_assoc($res_temp_mov);		
						?> 
						<option hidden disabled selected><?php echo $row['Name'];?></option>
						
						<?php } 
							else{
						?>
						
						<option class="y" selected="true" disabled="disabled"><?php echo $_SESSION['movie'];	?></option>

						<?php } ?>
						<?php
							 $res=mysqli_query($con,"select M_id,Name from movies");
							 while($row=mysqli_fetch_assoc($res)){?>
						    
							<option value="<?php echo $row['M_id']; ?>"><?php echo $row['Name']; ?></option>
						<?php
						
					     }
						?>
						<!-- <option  value="">Select your gender</option> -->
						<!-- <option disabled seleted hidden>Select your gender</option>  -->
						<!-- <option value="Madagaja">Madagaja</option>
						<option value="Pushpa">Pushpa</option>
						<option value="Pushpa">Spiderman</option>
						<option value="Pushpa">83</option>
						<option value="spiderman">Sakath</option> -->
					</select>

						
					<select class="hello field form-inner " name="theatre" id="Theatre" >
					<?php if(isset($_GET['theatre'])){ 
						$temp=$_GET['theatre'];
						$sql="select Name from theatres where T_id='$temp'";
						$res_temp_mov=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($res_temp_mov);			
					?> 
						<option hidden disabled selected><?php echo $row['Name'];?></option>
						
						<?php } 
							else{
						?>
					<option class="y" selected="true" disabled="disabled"><?php echo $_SESSION['theatre']	?></option>
					<?php } ?>
							<?php
							 $res=mysqli_query($con,"select T_id,Name from theatres");
							 while($row=mysqli_fetch_assoc($res)){  ?>
						    		<option value="<?php echo $row['T_id']; ?>"> <?php echo $row['Name']; ?></option>
							<?php
						
					     }
						?>
					</select>

					<div class="field">
						<input type="text" id="date" name="date" required onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Select date" value="<?php if(isset($_GET['date'])){ echo $_GET['date']; } ?>" >
					</div>

					</select>
					<br>
					<div class="field btn yy">
						<div class="btn-layer"></div>
						<input type="submit" name="search" value="Search for Shows">
					</div>
				</form>
				
				<!-- search shows -->
				<?php
					if(isset($_GET['search'])){
						$movie=mysqli_real_escape_string($con,$_GET['movie']);
						$theatre=mysqli_real_escape_string($con,$_GET['theatre']);
						
						$date=mysqli_real_escape_string($con,$_GET['date']);
						$_SESSION['movie']=$movie;
						$_SESSION['theatre']=$theatre;
						$_SESSION['date']=$date;

						$C_id=mysqli_real_escape_string($con,$_SESSION['C_id']);
						// echo $C_id;
						$sql="select  time from shows where M_id='$movie' and T_id='$theatre'";
						$res=mysqli_query($con,$sql);
						// unset($_POST['search']);
				?>
					
			</div>
			<!-- end of search -->


			<!-- timings -->
			<div class="form-container">
						<div class="form-inner">

							<form method="POST" class="signup">

								<!-- Movies -->

								 <div class="field">
									<input type="number" id="date" name="seat" placeholder="Seat number" required>
								</div>
							
								<div class="class field">
									<select class="hello field form-inner " name="time" id="time">
									<option class="y" selected="true" disabled="disabled">Select Time</option>
									<?php
										while($row=mysqli_fetch_assoc($res)){
									?>
									<option value=<?php echo $row['time']; ?>> <?php echo $row['time']; ?> </option>
									<?php } ?>
									</select>
								</div>

								</select>
								<br>
								<div class="field btn yy">
									<div class="btn-layer"></div>
									<input type="submit" name="Book" value="Book">
								</div>
							</form>
						</div>
			</div>
			<!-- end of timings -->

			<!-- insert -->
			<?php
				if(isset($_POST['Book'])){
					$time=mysqli_real_escape_string($con,$_POST['time']);
					$seat=mysqli_real_escape_string($con,$_POST['seat']);

					$sql="insert into booking values(NULL,'$theatre','$movie',$C_id,'$date','$time','$seat')";
					// echo $sql;
					$res=mysqli_query($con,$sql);
					if($res){
						echo "<script>alert('Booked!!');</script>";
						// $_SESSION['booked']=1;
						echo "<script>window.location='main.php';</script>";
					}
						// echo "<script>alert('Booked!!');</script>";
					
					else
						echo "<script>alert('Not Booked!!');</script>";
					unset ($_POST['Book']);
					unset ($_POST['search']);
					// $_SESSION['booked']=1;
				}
			?>
			<?php 
			
			}
			
			?>

			
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/mainscript.js"></script>
	<script>
		const loginText = document.querySelector(".title-text .login");
		const loginForm = document.querySelector("form.login");
		const loginBtn = document.querySelector("label.login");
		const signupBtn = document.querySelector("label.signup");
		const signupLink = document.querySelector("form .signup-link a");
		signupBtn.onclick = (() => {
			loginForm.style.marginLeft = "-50%";
			loginText.style.marginLeft = "-50%";
		});
		loginBtn.onclick = (() => {
			loginForm.style.marginLeft = "0%";
			loginText.style.marginLeft = "0%";
		});
		signupLink.onclick = (() => {
			signupBtn.click();
			return false;
		});
		//    document.getElementById("submitBtn").addEventListener("click", myFunction);
		//  function myFunction() {
		//    window.location.href="main.html";
	</script>
</body>

</html>