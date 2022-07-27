<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Announcement</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="header">
  	<h2>Make Announcement</h2>
  </div>
	
  <form method="post" action="server.php">
  	<?php include('../errors.php'); ?>
  	<div class="input-group">
  	  <label>Announcement No.</label>
  	  <input type="text" name="a_no" value="<?php echo $a_no; ?>">
  	</div>
      <div class="input-group">
  	  <label>Details (300 letters)</label>
  	  <input type="text" name="details" value="<?php echo $details; ?>">
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="ann" onClick="alert('Make announcement?')">Create</button>
  	</div>
  </form>
</body>
</html>