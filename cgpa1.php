<?php
  include "configuration.php";
  session_start();
  $q=mysqli_query($con,"SELECT * FROM users where username='$_SESSION[login_user]' ;");
  $row=mysqli_fetch_assoc($q);

?>
  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">

      <title>CGPA Calculator</title>

      <!-- Bootstrap core CSS -->
      <link href="bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="cover.css" rel="stylesheet">
      <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
	<script>
		var count = 1;
		function addInput() {
			count = count + 1;
			var input = $(" <div class='cgpa-increase remove_"+count+"'><h5> Course " + count+ ": </h5><select class='opt' name='coursegrade[]'><option value='0' selected='selected'> Anticipated Letter Grade </option><option value='4.33'>A+ </option><option value='4'>A </option><option value='3.67'>A- </option><option value='3.33'>B+ </option><option value='3'>B </option><option value='2.67'>B- </option><option value='2.33'>C+ <option value='2'>C </option> <option value='1.67'>C- </option><option value='1'>D </option> <option value='0'>F </option></option></select><br/><h5> Unit " + count+ ": </h5><select class='opt' name='unit[]'><option value='0' selected='selected'> Number of units </option><option value='1'> 1 </option><option value='2'> 2 </option><option value='3'> 3 </option><option value='4'> 4 </option><option value='5'> 5 </option></select></div>'");

			$(".cgpa-increase-add").append(input);
         }

          function removeClass(){
			  $(".remove_"+count).remove();
			  count = count - 1;
		  }
	</script>
    </head>

    <body>

      <div class="site-wrapper">

        <div class="site-wrapper-inner">

          <div class="cover-container">

            <div class="masthead clearfix">
              <div class="inner">
                <h3 class="masthead-brand">PickMyCourse</h3>
                <nav>
                  <ul class="nav masthead-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="cgpa1.php">CGPA Calculator</a></li>
                  </ul>
                </nav>
              </div>
            </div>

            <div class="inner cover">
				<div class="cgpa">
					<h1>CGPA Calculator</h1>
					<form method="post" action="cgpa1.php">
						<h4> Calculate your CGPA based on your anticipated grades. </h4>
						<h4> My current CGPA is: <?php echo $row['CGPA']; ?></h4>
						<h4> Total units attempted is: <?php echo $row['Credits']; ?></h4>
						<div class="cgpa-increase" >
						<h5> Course 1: </h5>
						<select class="opt" name="coursegrade[]">
							<option value="0" selected="selected"> Anticipated Letter Grade </option>
							<option value="4.33">A+ </option>
							<option value="4">A </option>
							<option value="3.67">A- </option>
							<option value="3.33">B+ </option>
							<option value="3">B </option>
              <option value="2.67">B- </option>
              <option value="2.33">C+ </option>
              <option value="2">C </option>
              <option value="1.67">C- </option>
              <option value="1">D </option>
              <option value="0">F </option>
						</select>
						<br/>
						<h5> Unit 1: </h5>
						<select class="opt" name="unit[]">
							<option value="0" selected="selected"> Number of units </option>
							<option value="1"> 1 </option>
							<option value="2"> 2 </option>
							<option value="3"> 3 </option>
							<option value="4"> 4 </option>
							<option value="5"> 5 </option>
						</select>
					</div>

					<div class="cgpa-increase-add" ></div>

        			<br/>
					 <input class="button" type="button" onclick="addInput()" value="Add"/>
					 <input class="button" type="button" onclick="removeClass()" value="remove"/>
					<br>
        			<input class="button" type="submit" name="submit" value="Calculate next CGPA" />
        			<input class="button" type="reset"  value="Reset"/>
					<br>
				<?php
					$tCourseGrade=0;
					$tUnit = 0;
					$cgpa=$row['CGPA'];
					$units=$row['Credits'];
					if(isset($_POST['submit'])){
					  $coursegrade=$_POST['coursegrade'];
					  $unit=$_POST['unit'];

					  $num = count($coursegrade);
					  for($i = 0; $i < $num; $i++) {
						$tCourseGrade += $coursegrade[$i]*$unit[$i];
						$tUnit += $unit[$i];
					  }


					  $new_cgpa=($cgpa*$units+$tCourseGrade)/($units+$tUnit);

					  echo "<h3>".$new_cgpa."</h3>";
					}
				?>
					</form>
				</div>
            </div>

            <div class="mastfoot">
              <div class="inner">
                <p>2021</p>
              </div>
            </div>

          </div>

        </div>

      </div>

    </body>
  </html>
