<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<div class="col-lg-4 col-lg-offset-2">

<h1>Profile Edit</h1>
<p>Edit the details here</p>
<?php if(isset($_SESSION['success'])){
            echo '<div class="alert alert-success">'. $_SESSION['success'] .'</div>';
} ?>
<?php if(isset($_SESSION['error'])){
            echo '<div class="alert alert-danger">'. $_SESSION['error'] .'</div>';
} ?>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form action="" method="POST">

<div class="form-group">
    <label for="username">user Name</label>
    <input class="form-control" name="username" id="username" type="text" value="<?php echo $username; ?>" />
</div>
 <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" name="email" id="email" type="email" value="<?php echo $email; ?>" />
</div>
 <div class="form-group">
    <label for="password">Password</label>
    <input class="form-control" name="password" id="password" type="password"  />
</div>
 <div class="form-group">
    <label for="cpassword">Re enter password</label>
    <input class="form-control" name="cpassword" id="cpassword" type="password" />
</div>
 <div class="form-group">
    <label for="phone">phone</label>
    <input class="form-control" name="phone" id="phone" type="tel" value="<?php echo $phone; ?>" />
    <input class="hide" name="id" id="id" type="hidden" value="<?php echo $id; ?>" />
</div>
 <div class="form-group">
    <label for="gender">gender</label>
<select class="form-control" name="gender" id="gender">
<option value="male" <?php if($gender == 'male'){echo 'selected';} ?>>Male</option>
<option value="female" <?php if($gender == 'female'){echo 'selected';} ?>>Female</option>
</select>
</div>

 <div class="form-group">
<button class="btn btn-primary" name="update">Update</button>
</div>

</form>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>