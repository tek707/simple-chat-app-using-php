
<?php include_once 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO-LIST</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>
<body>

  <div class="container">

    <div class="heading">


Group Chat
 <hr>
    </div>
   
    <div class="scroll">
    <?php 

$sql = ("select user_id,username,timestamp,message from user_details left join group_message on user_details.user_id= group_message.from_user_id WHERE user_details.user_id=user_details.user_id ORDER BY timestamp ASC;
");
   $result =$mysqli->query($sql)or die ($mysqli->error);


   while (  $readmsg =$result->fetch_assoc() ):
    
      
      
       ?>



<?php if(  $readmsg['user_id'] != $_SESSION['Userid']) {



?>
<!-- left message -->
    <div class="left mainpage"> 
<div class="left_msg">
  <div class="left_msg_head">
<img class="left_msg_avater" src="avatar.png" alt="avater"/>
                <h3 class="msg_left_username"><?php echo $readmsg['username']; ?></h3>
                </div> 
   <!--left main content -->
    <p class="msg_left_text"><?php echo $readmsg['message']; ?></p> 
<p class="msg_left_date"> <?php echo $readmsg['timestamp']; ?> </p> 
  </div>
    </div>
    
<!-- end of left message -->

<?php } elseif (  $readmsg['user_id'] = $_SESSION['Userid']) {
  ?>

 
<br>

<!-- start of right message -->

    <div class="right mainpage">
    <div class="right_msg">
    <div class="right_msg_head">
<img class="right_msg_avater" src="avatar.png" alt="avater"/>
                <h3 class="msg_right_username"><?php echo $readmsg['username']; ?></h3>
                </div> 
   <!--right main content -->
    <h3 class="msg_right_text"><?php echo $readmsg['message']; ?></h3> 
<p class="msg_right_date"> <?php echo $readmsg['timestamp']; ?></p> 

  </div>
    </div>
    
<!-- end of right message -->
<?php  }else{} ?>

<?php endwhile; ?>











    <!-- div for input box and send btn -->

  
    </div>
     

    <div class="msgcreater">
      <form action="conn.php" method="post">

      <input type="text" class="msgcont" name="msg"  required>


     
  <button type="submit" name="send" class="send"  id="send"><img src="send.png" alt="submit"></button>


</form>
    </div>
  </div>  
</body>
</html>