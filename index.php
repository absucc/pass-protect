<?php




/*
  $password is for make a $password, if you leave this, it will create a password instantly, with the name (without the extension) of the file on $file2protect
  in $file2protect put the path/to/the/file
  if you don't have it, put the file code in $file_code
  the default password is "default"

	custom css or less?
	create a file with [the name of this file] + .css/less
	for example: index.php.css

	if $die_after_true is 0 it will not close the connection after your page is loaded, if it happends ($die_after_true = 1), your webpage source code can will discovered.
*/
$password = "";
$file2protect = "";
$file_code = "";
$die_after_true = ;





session_start();
$this_page = $_SERVER['REQUEST_URI'];
if($this_page == "/") {
	$url = "index.php";
	$url_path = "true";
} else {
	$url = str_replace("/", "", $this_page);
	$url_path = "false";
}
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
    header("Location: ".$url);
  }
} else { ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php // echo $_SERVER['REQUEST_URI']; ?>
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Comapatible" content="id=edge">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.1.7/css/fork-awesome.min.css" integrity="sha256-gsmEoJAws/Kd3CjuOQzLie5Q3yshhvmo7YNtBG7aaEY=" crossorigin="anonymous">
		<?php if(file_exists($url.".css")) { ?>
		<link rel="stylesheet" href="<?php echo $url.".css"; ?>">
		<?php
		} else {
			if(file_exists($url.".less")) { ?>
		<link rel="stylesheet/less" type="text/css" href="<?php echo $url.".less"; ?>">
		<script src="//cdn.jsdelivr.net/npm/less" ></script>
		<?php
			}
		}
		?>
		<title>This webpage requires password to enter</title>
  </head>
  <body style="text-align: center; align: center; ">
    <br/>
    <br/>
    <h3 class="title"><b>Hey there!</b> Password check!</h3>
    <br/>
    <form action="<?php echo $url; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
      	<input type="password" name="password" placeholder="Password" value="">
				<button class="btn btn-outline-primary btn-sm" type="submit"><i class="fa fa-check-square" aria-hidden="true"></i></button>
			</div>
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
			<br><br><br><br>
			<p>pass-protect - <a href="https://github.com/L64/pass-protect"><i class="fa fa-github" aria-hidden="true"></i></a> - Under <a href="https://github.com/L64/pass-protect/blob/main/LICENSE">BSL-1.0</a> - v1.1</p>
    	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		</footer>
	</body>
</html>
<?php
};
if($die_after_true==1) {
	die;
}
?>
<?php




/*
  $password is for make a $password, if you leave this, it will create a password instantly, with the name (without the extension) of the file on $file2protect
  in $file2protect put the path/to/the/file
  if you don't have it, put the file code in $file_code
  the default password is "default"

	custom css or less?
	create a file with [the name of this file] + .css/less
	for example: index.php.css

	if $die_after_true is 0 it will not close the connection after your page is loaded, if it happends ($die_after_true = 1), your webpage source code can will discovered.
*/
$password = "a";
$file2protect = "example.html";
$file_code = "";
$die_after_true = 0;





session_start();
$this_page = $_SERVER['REQUEST_URI'];
if($this_page == "/") {
	$url = "index.php";
	$url_path = "true";
} else {
	$url = str_replace("/", "", $this_page);
	$url_path = "false";
}
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
    header("Location: ".$url);
  }
} else { ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php // echo $_SERVER['REQUEST_URI']; ?>
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Comapatible" content="id=edge">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.1.7/css/fork-awesome.min.css" integrity="sha256-gsmEoJAws/Kd3CjuOQzLie5Q3yshhvmo7YNtBG7aaEY=" crossorigin="anonymous">
		<?php if(file_exists($url.".css")) { ?>
		<link rel="stylesheet" href="<?php echo $url.".css"; ?>">
		<?php
		} else {
			if(file_exists($url.".less")) { ?>
		<link rel="stylesheet/less" type="text/css" href="<?php echo $url.".less"; ?>">
		<script src="//cdn.jsdelivr.net/npm/less" ></script>
		<?php
			}
		}
		?>
		<title>This webpage requires password to enter</title>
  </head>
  <body style="text-align: center; align: center; ">
    <br/>
    <br/>
    <h3 class="title"><b>Hey there!</b> Password check!</h3>
    <br/>
    <form action="<?php echo $url; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
      	<input type="password" name="password" placeholder="Password" value="">
				<button class="btn btn-outline-primary btn-sm" type="submit"><i class="fa fa-check-square" aria-hidden="true"></i></button>
			</div>
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
			<br><br><br><br>
			<p>pass-protect - <a href="https://github.com/L64/pass-protect"><i class="fa fa-github" aria-hidden="true"></i></a> - Under <a href="https://github.com/L64/pass-protect/blob/main/LICENSE">BSL-1.0</a> - v1.1</p>
    	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		</footer>
	</body>
</html>
<?php
};
if($die_after_true == 1) {
	die;
} else {
}
?>
