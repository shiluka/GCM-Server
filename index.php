<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		
	<!-- styles -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <!-- javascripts -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
    <script src="js/sendMsg.js" type="text/javascript"></script>
    
    </head>
	
	
    <body>
        <?php
        include_once './database/db_functions.php';
        $db = new DB_Functions();
        $users = $db->getAllUsers();
		
		
		
		
		
		
		
        if ($users != false)
            $no_of_users = mysql_num_rows($users);
			
			
			
			
			
			
			
        else
            $no_of_users = 0;
        ?>
        <div class="container">
            <h1>No of Devices Registered: <?php echo $no_of_users; ?></h1>
         		
			<?php
			$userIds = array();
			if ($no_of_users > 0) {
				while ($row = mysql_fetch_array($users)) {
					$userIds[] = $row["gcm_regid"];
				
					
				}
			} else { ?>
				<li>
					No Users Registered Yet!
				</li>
			<?php }  ?>
			<div class="send_container_all">  
				<form id="all" name="" method="post" onsubmit="return sendPushNotificationAll(['<?php echo implode ('\',\'',$userIds)?>'])">								
				<textarea  id = 'message' rows="3" name="message_all" cols="25" class="txt_message" placeholder="Type message here"></textarea>
				<input type="submit" class="send_btn_all" value="Send_all" onclick=""/>
				</form>
			</div>
			
			
			<div class="user_table">
			    <table border='1'>
				<tr>
				<th>Email</th>
				<th>Register ID</th>
				<th>Created At</th>
				</tr>
			
			
			
			<?php
				$user = $db->getAllUsers();
				while ($row = mysql_fetch_array($user)) { 
					
					
					echo "<tr>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['gcm_regid'] . "</td>";
					echo "<td>" . $row['created_at'] . "</td>";
					echo "</tr>";
					
			}  
			
			
			 echo "</table>";
			 echo "</div>";
			
			?>
			
			
			
			
			
        </div>
    </body>
</html>
