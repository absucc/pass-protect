<?php




/*
  $password is for make a $password, if you leave this, it will create a password instantly, with the name (without the extension) of the file on $file2protect
  in $file2protect put the path/to/the/file
  if you don't have it, put the file code in $file_code
  the default password is "default"
*/
$password = "password";
$file2protect = "example.html";
$file_code = "";





session_start();
function geturl() {
	$geturl_step_one = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$geturl_step_two = str_replace("&", "&amp;", $geturl_step_one);
	return $geturl_step_two;
};
$url = pathinfo(geturl());
if ($password == "") {
  if ($file2protect == "") {
    $final_pass = "default";
  } else {
    $f2p = pathinfo($file2protect);
    $final_pass = $f2p['basename'];
  }
} else {
  $final_pass = $password;
}
if (isset($_POST['password'])) {
  if ($_POST['password'] == $final_pass) {
    if ($file2protect == "") {
      if ($file_code == "") {
        die("<p><b>Error</b>, no file/file code found<p>");
      } else {
        echo $file_code;
      }
    } else {
      include $file2protect;
    }
  } else {
    $_SESSION['start_failed'] = 1;
    header("Location: ".$url['basename']);
  }
} else { ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Comapatible" content="id=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>This webpage requires password to enter</title>
  </head>
  <body style="text-align: center; align: center; ">
    <br/>
    <br/>
    <h3><b>Hey there!</b> Password check!</h3>
    <br/>
    <form action="<?php echo $url['basename']; ?>" method="post" enctype="multipart/form-data">
      <input type="password" name="password" value="">
      <input type="submit" name="submit" value="Submit" />
    </form>
    <?php
    if (isset($_SESSION['start_failed'])) {
      if ($_SESSION['start_failed'] == 1) { ?>
        <br/>
        <div style="text-align: center;" class="alert alert-danger" role="alert">Incorrect password</div>
    <?php
       $_SESSION['start_failed'] = 0;
      }
    }
    ?>
		<footer>
			<br>
			<br>
			<br>
			<br>
			<p>Password protection system made by <a href="https://lucas64.tk">Lucas</a></p>
    	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		</footer>
	</body>
</html>
<?php
};
die;
?>
