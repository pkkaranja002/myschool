<!DOCTYPE html>
<html>
<head>
	<title> School</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<br><br>
    <div class="container">
    	<h3> Student Details</h3>
		<hr style="margin-left: 25px; margin-right: 25px;">
    	<form action="connection.php" method="post">
    		<div class="form-group">
    			<input type="text" name="studentname" id="studentname" class="form-control" placeholder="type your name" required="">	
    		</div>

    		<div class="form-group">
    			<input type="text" name="email" id="email" class="form-control" placeholder="type your email" required="">	
    		</div>

    		<div class="form-group">
    			<input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="your phone number" required="">	
    		</div>

    		<div class="form-group">
    			<select name="gender" class="form-control"> 
    				<option>Select Gender</option>
    				<option value="Male">Male</option>
    				<option value="Female">Female</option>
    			</select>
    		</div>

    		<div class="form-group">
    			<input type="number" name="age" id="age" class="form-control"placeholder="what's your age"required="">	
    		</div>

    		<div class="form-group">
    			<label for="studentimage" style="padding: 10px;"> Upload student image</label>
    			<input type="file" name="studentimage" id="studentimage" value="<?php echo $studentimage  ?>" class="form-control">	
    		</div>

    		<div class="form-group">

    			<input type="submit" name="save" id="save" class="btn btn-success" value="upload student details">
    		</div>
  		

    	</form>
    	


    </div>

</body>
</html>