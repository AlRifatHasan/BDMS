<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Message</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="header">
  	<h2>Write your message</h2>
  </div>
	
  <form method="post" action="server.php">
  	<?php include('../errors.php'); ?>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
      <div class="input-group">
  	  <label>Message (300 letters)</label>
  	  <input type="text" name="message" value="<?php echo $message; ?>">
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="con">Send</button>
  	</div>
  </form>
</body>
</html>