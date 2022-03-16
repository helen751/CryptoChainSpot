<?php 
require_once("config.php");
trim(extract($_POST));
if (isset($_POST['addcoin'])) {
$uploadedFile = ''; 
$uploadDir = '../uploads/'; 
$response = array( 
    'status' => 0, 
    'message' => 'Failed to add Coin, Please try again!' 
); 
            $uploadStatus = 1; 
                $fileName = basename($_FILES["file"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                  
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                    }
                    else{ 
                        $uploadStatus = 0; 
                        $response['message'] = "Sorry, there was an error uploading the coin image try again!."; 
                    } 

                     if($uploadStatus == 1){ 
                    $checkcoin = "SELECT * FROM coins where coin_name = '$name' || coin_wallet='$wallet'";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			if($countcheckcoin > 0){
				$response['message'] = "Sorry this coin or wallet Address already exist!";

			}

			else{
                
	$sql = "INSERT INTO coins(coin_name,image,abbrev,coin_wallet) values('$name','$uploadedFile','$abbre','$wallet')";

		if(mysqli_query($link,$sql)){
			$response['status'] = 1; 
			$response['message'] = "Coin Added Successfully :)";
		}
		else{
			$response['message'] = "Error adding coin try again!";
			}
		}

}

echo json_encode($response);
}


//the function handling the plan add
if (isset($_POST['addplan'])) {
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to add Plan, Please try again!' 
);

	$sql = "INSERT INTO plans(plan_name,coin_id,percentage_profit,period,min_deposit,max_deposit,referal_bonus) values('$pname','$pcoin','$profit','$period','$min','$max','$refp')";

		if(mysqli_query($link,$sql)){
			$response['status'] = 1; 
			$response['message'] = "Plan Added Successfully :)";
		}
		else{
			$response['message'] = "Error adding Plan try again!";
			}

	echo json_encode($response);
}



//function for registereation

if (isset($_POST['adduser'])) {
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Register, Please try again!' 
);
		
		// check if username exists
		 $checkcoin = "SELECT * FROM users where username = '$username'";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			if($countcheckcoin > 0){
				$response['message'] = "Sorry this Username is no more available! Please Try another username";

			}
			else{

				//check if email address exists

				$checkcoin2 = "SELECT * FROM users where email_address = '$email'";
			$resultcheckcoin2 = mysqli_query($link, $checkcoin2);
			$countcheckcoin2 = mysqli_num_rows($resultcheckcoin2);
			if($countcheckcoin2 > 0){
				$response['message'] = "Sorry this Email Address is already used by another user! Try again";

			}
			else{

				//check if phone number exists

				$checkcoin4 = "SELECT * FROM users where phone_number = '$phone'";
			$resultcheckcoin4 = mysqli_query($link, $checkcoin4);
			$countcheckcoin4 = mysqli_num_rows($resultcheckcoin4);
			if($countcheckcoin4 > 0){
				$response['message'] = "Sorry this Phone Number already exist for another user! Please Try again";

			}
			else{
				// referal link created
				$reflink = "https://cryptochainspot.com?ref=".$username;

				//if the referer input is not empty

				if($ref!=''){
				//check if the referer entered does exists

					$checkcoin = "SELECT * FROM users where username = '$ref'";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			if($countcheckcoin == 0){
				$response['message'] = "Invalid Referer Username!";
			}
			else{
				//getting the user id of the referer
					$refid = ' ';
					$checkcoin3 = "SELECT * FROM users where username = '$ref'";
			$resultcheckcoin3 = mysqli_query($link, $checkcoin3);
			$countcheckcoin3 = mysqli_num_rows($resultcheckcoin3);
			if($countcheckcoin3 > 0){
				$coinrow = mysqli_fetch_array($resultcheckcoin3, MYSQLI_ASSOC);
                                          $refid = $coinrow["user_id"];

			}
			//inserting into the users table
					$sql = "INSERT INTO users(username,email_address,phone_number,password,referal_link,fullname,referer_id) values('$username','$email','$phone',md5('$pass'),'$reflink','$fullname','$refid')";

		if(mysqli_query($link,$sql)){
			$uid = mysqli_insert_id($link);

			// inserting into accounts
			$sqlacc = "INSERT INTO accounts(system_balance,account_balance,user_id) values(0,0,'$uid')";

		if(mysqli_query($link,$sqlacc)){

			//checking if wallet is not empty
			if($wallet !=''){
				//inserting into wallets table
					$sql = "INSERT INTO wallets(user_id,coin_id,wallet_address) values('$uid','$cid','$wallet')";

		if(mysqli_query($link,$sql)){
			$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "Registeration Completed"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Welcome to cryptochainspot</title> 
    </head> 
    <body> 
        <h1>Thanks you for joining with us!</h1> 
        <table cellspacing="0" style="border: 2px dashed goldenrod; width: 100%;"> 
            <tr> 
                <th>User Name:</th><td>'.$username.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'.$email.'</td> 
            </tr> 
            <tr> 
                <th>Password:</th><td>'.$pass.'</td> 
            </tr> 
        </table> 
        <b>Please do not display your Login Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
			$response['status'] = 1; 
			$response['message'] = "Registered Successfully :)";
		}
		else{
			$response['message'] = "Error Registering Please try again!";
			}
			
		}
		else{
		$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "Registeration Completed"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Welcome to cryptochainspot</title> 
    </head> 
    <body> 
        <h1>Thanks you for joining with us!</h1> 
        <table cellspacing="0" style="border: 2px dashed goldenrod; width: 100%;"> 
            <tr> 
                <th>User Name:</th><td>'.$username.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'.$email.'</td> 
            </tr> 
            <tr> 
                <th>Password:</th><td>'.$pass.'</td> 
            </tr> 
        </table> 
        <b>Please do not display your Login Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
			$response['status'] = 1; 
			$response['message'] = "Registered Successfully :)";
			}
		}
		else{
			$response['message'] = "Error Registering Account Please try again!";
		}

	}

				
				else{
					$response['message'] = "Error Registering Please try again!";
				}
			}
			}

			// if the referer input is empty
				else{
					$sql = "INSERT INTO users(username,email_address,phone_number,password,referal_link,fullname) values('$username','$email','$phone',md5('$pass'),'$reflink','$fullname')";

		if(mysqli_query($link,$sql)){
			 $uid = mysqli_insert_id($link);
			 // inserting into accounts
			$sqlacc = "INSERT INTO accounts(system_balance,account_balance,user_id) values(0,0,'$uid')";

		if(mysqli_query($link,$sqlacc)){
			if($wallet !=''){
					$sql = "INSERT INTO wallets(user_id,coin_id,wallet_address) values('$uid','$cid','$wallet')";

		if(mysqli_query($link,$sql)){
			$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "Registeration Completed"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Welcome to cryptochainspot</title> 
    </head> 
    <body> 
        <h1>Thanks you for joining with us!</h1> 
        <table cellspacing="0" style="border: 2px dashed goldenrod; width: 100%;"> 
            <tr> 
                <th>User Name:</th><td>'.$username.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'.$email.'</td> 
            </tr> 
            <tr> 
                <th>Password:</th><td>'.$pass.'</td> 
            </tr> 
        </table> 
        <b>Please do not display your Login Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
			$response['status'] = 1; 
			$response['message'] = "Registered Successfully :)";
		}
		else{
			$response['message'] = "Error Registering Please try again!";
			}
			
		}
		else{
			$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "Registeration Completed"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Welcome to cryptochainspot</title> 
    </head> 
    <body> 
        <h1>Thanks you for joining with us!</h1> 
        <table cellspacing="0" style="border: 2px dashed goldenrod; width: 100%;"> 
            <tr> 
                <th>User Name:</th><td>'.$username.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'.$email.'</td> 
            </tr> 
            <tr> 
                <th>Password:</th><td>'.$pass.'</td> 
            </tr> 
        </table> 
        <b>Please do not display your Login Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
			$response['status'] = 1; 
			$response['message'] = "Registered Successfully :)";
			}
				
}
		else{
			$response['message'] = "Error Registering Account Please try again!";
		}
				}

				else{
			$response['message'] = "Error Registering Please try again!";

				}
			}
		}
	}

			
	}

	echo json_encode($response);	
}



// function for login

if (isset($_POST['login'])) {
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Login, Please try again!' 
);

	$checkcoin = "SELECT * FROM users where username = '$username' and password=md5('$pass')";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			$checkcoin2 = "SELECT * FROM users where email_address = '$username' and password = md5('$pass')";
			$resultcheckcoin2 = mysqli_query($link, $checkcoin2);
			$countcheckcoin2 = mysqli_num_rows($resultcheckcoin2);

			if($countcheckcoin > 0){
				 
				$row = mysqli_fetch_array($resultcheckcoin, MYSQLI_ASSOC);
				$id = $row['user_id'];
				$name = $row['username'];
				$email = $row['email_address'];
				$r = $row["rank"];
				session_start();
				$_SESSION['user'] = $id;
				$_SESSION['name'] = $name;
				$_SESSION['login'] = "user";
				$_SESSION['email'] = $email;
				if($r == 1){
					$_SESSION['login'] = "admin";
				}
				
				$otp = rand(100000,999999);
			$checkcoin3 = "SELECT * FROM otp where user_id = '$id'";
			$resultcheckcoin3 = mysqli_query($link, $checkcoin3);
			$countcheckcoin3 = mysqli_num_rows($resultcheckcoin3);
			if($countcheckcoin3 > 0){
				$sql = "UPDATE otp SET otp='$otp', is_expired = 0, created_at = CURRENT_TIMESTAMP where user_id='$id'";
			

		if(mysqli_query($link,$sql)){
			$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "OTP(One Time Password)"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Hello'.$name.'</title> 
    </head> 
    <body> 
        
        <div style="border:1px solid gray"> 
        <div style="width:100%; background-color:goldenrod">
        <img src="../img/logo.png" width="50" height="50" />
        </div>
        <div style="margin-top:2%; text-align:center">
        <h1 style="color:blue; margin-bottom:1%;">Hello'.$name.'</h1>
        <div style="color:violet; margin-bottom:0.5%">
        Here is your OTP(One Time Password).<br>
        Enter the password below to complete your Login<br><br>
        <span style="color:gray">'.$otp.'</span>
        </div>
        </div>
        </div>
        
        <b>Please do not display your OTP Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
			$response['status'] = 1;

		}

		else{
			$response['message'] = "Failed to Login, please try again!";

		}
			}
			else{

				$sql = "INSERT INTO otp(user_id,otp) values('$id','$otp')";
			

		if(mysqli_query($link,$sql)){
			$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "OTP(One Time Password)"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Hello'.$name.'</title> 
    </head> 
    <body> 
        
        <div style="border:1px solid gray"> 
        <div style="width:100%; background-color:goldenrod">
        <img src="../img/logo.png" width="50" height="50" />
        </div>
        <div style="margin-top:2%; text-align:center">
        <h1 style="color:blue; margin-bottom:1%;">Hello'.$name.'</h1>
        <div style="color:violet; margin-bottom:0.5%">
        Here is your OTP(One Time Password).<br>
        Enter the password below to complete your Login<br><br>
        <span style="color:gray">'.$otp.'</span>
        </div>
        </div>
        </div>
        
        <b>Please do not display your OTP Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
			$response['status'] = 1;

		}

		else{
			$response['message'] = "Failed to Login, please try again!";

		}
	}

			}
			else if($countcheckcoin2 > 0){
				$response['status'] = 1; 
				$row = mysqli_fetch_array($resultcheckcoin2, MYSQLI_ASSOC);
				$id = $row['user_id'];
				$name = $row['username'];
				$email = $row['email_address'];
				$r = $row["rank"];
				session_start();
				$_SESSION['user'] = $id;
				$_SESSION['name'] = $name;
				$_SESSION['login'] = "user";
				$_SESSION['email'] = $email;
				if($r == 1){
					$_SESSION['login'] = "admin";
				}
				$otp = rand(100000,999999);
				
				$checkcoin3 = "SELECT * FROM otp where user_id = '$id'";
			$resultcheckcoin3 = mysqli_query($link, $checkcoin3);
			$countcheckcoin3 = mysqli_num_rows($resultcheckcoin3);
			if($countcheckcoin3 > 0){
				$sql = "UPDATE otp SET otp='$otp', is_expired = 0 where user_id='$id'";
			

		if(mysqli_query($link,$sql)){
			$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "OTP(One Time Password)"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Hello'.$name.'</title> 
    </head> 
    <body> 
        
        <div style="border:1px solid gray"> 
        <div style="width:100%; background-color:goldenrod">
        <img src="../img/logo.png" width="50" height="50" />
        </div>
        <div style="margin-top:2%; text-align:center">
        <h1 style="color:blue; margin-bottom:1%;">Hello'.$name.'</h1>
        <div style="color:violet; margin-bottom:0.5%">
        Here is your OTP(One Time Password).<br>
        Enter the password below to complete your Login<br><br>
        <span style="color:gray">'.$otp.'</span>
        </div>
        </div>
        </div>
        
        <b>Please do not display your OTP Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
			$response['status'] = 1;

		}

		else{
			$response['message'] = "Failed to Login, please try again!";

		}
			}
			else{

				$sql = "INSERT INTO otp(user_id,otp) values('$id','$otp')";
			

		if(mysqli_query($link,$sql)){
			$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "OTP(One Time Password)"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Hello'.$name.'</title> 
    </head> 
    <body> 
        
        <div style="border:1px solid gray"> 
        <div style="width:100%; background-color:goldenrod">
        <img src="../img/logo.png" width="50" height="50" />
        </div>
        <div style="margin-top:2%; text-align:center">
        <h1 style="color:blue; margin-bottom:1%;">Hello'.$name.'</h1>
        <div style="color:violet; margin-bottom:0.5%">
        Here is your OTP(One Time Password).<br>
        Enter the password below to complete your Login<br><br>
        <span style="color:gray">'.$otp.'</span>
        </div>
        </div>
        </div>
        
        <b>Please do not display your OTP Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
			$response['status'] = 1;

		}

		else{
			$response['message'] = "Failed to Login, please try again!";
}
	}
}
else{
$response['message'] = "Failed to Login,Invalid Login Details!";	
}



	echo json_encode($response);	
}


if (isset($_POST['otp'])) {
	session_start();
	$id = $_SESSION['user'];
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Login, Please try again!' 
);
	$otpquery = "SELECT * FROM otp WHERE user_id = '$id' AND otp='$otp' AND is_expired=0 AND NOW() <= DATE_ADD(created_at, INTERVAL 24 HOUR)";
	$otpresult=mysqli_query($link,$otpquery);
	$count  = mysqli_num_rows($otpresult);
	if($count > 0) {
		$otpquery = "UPDATE otp SET is_expired = 1 WHERE user_id='$id'";
		if(mysqli_query($link,$otpquery)){
			$today = date("Y-m-d H:i:s");

			$otpquery2 = "UPDATE users SET last_access = '$today' WHERE user_id='$id'";
		if(mysqli_query($link,$otpquery2)){
		
			$_SESSION["log"]= true;
			if($_SESSION['login']=="admin"){
				$response['status'] = 2; 
			}
			else{
				$response['status'] = 1; 
			}

		}
		else{
			$response['message'] = "Failed to Login, please try again!";
		}

	}
		else{
			$response['message'] = "Failed to Login, please try again!";
		}
	}
		 else {
		$response['message'] = "OTP Expired or Invalid OTP!";
	}

	echo json_encode($response);	
}




  
  if(isset($_POST["send"])){
  	session_start();
  	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Login, Please try again!' 
);
  	$id = $_SESSION['user'];
    $otp = rand(100000,999999);
$sql = "UPDATE otp SET otp='$otp', is_expired = 0, created_at = CURRENT_TIMESTAMP where user_id='$id'";
      

    if(mysqli_query($link,$sql)){
    	$to = $email; 
$from = 'support@cryptochainspot.com'; 
$fromName = 'cryptochainspot'; 
 
$subject = "OTP(One Time Password)"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Hello'.$name.'</title> 
    </head> 
    <body> 
        
        <div style="border:1px solid gray"> 
        <div style="width:100%; background-color:goldenrod">
        <img src="../img/logo.png" width="50" height="50" />
        </div>
        <div style="margin-top:2%; text-align:center">
        <h1 style="color:blue; margin-bottom:1%;">Hello'.$name.'</h1>
        <div style="color:violet; margin-bottom:0.5%">
        Here is your OTP(One Time Password).<br>
        Enter the password below to complete your Login<br><br>
        <span style="color:gray">'.$otp.'</span>
        </div>
        </div>
        </div>
        
        <b>Please do not display your OTP Details to anyone</b><br>
        <i>Signed: Management</i>
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: support@cryptochainspot.com' . "\r\n"; 
$headers .= 'Bcc: support@cryptochainspot.com' . "\r\n"; 
 
// Send email 
mail($to, $subject, $htmlContent, $headers);
    	$response['status'] = 1; 
      $response['message'] = "OTP Resent Successfully";

    }

    else{
      $response['message'] = "Failed to Resend OTP, please try again!";

    }
    echo json_encode($response);
  }




if(isset($_POST["deposit"])){
  	session_start();
  	$response = array( 
    'status' => 0,
    'coin' => ' ', 
    'coinn' => ' ',
    'message' => 'Failed to Add Deposit, Please try again!' 
);
  	$today = date("Y-m-d H:i:s");
  	$id = $_SESSION['user'];
  	$plansql = "SELECT * from plans where plan_id='$plan'";
     $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);

   if($countplan != 0){
     $planrow = mysqli_fetch_array($planresult, MYSQLI_ASSOC); 
      $planid = $planrow["plan_id"];
      $coin = $planrow["coin_id"];
      $ref = $planrow["referal_bonus"];
      $period = $planrow["period"];
      $min = $planrow["min_deposit"];
      $max = $planrow["max_deposit"];
      $per = $planrow["percentage_profit"];

      if($amount < $min){
      	$response['message'] = "Amount is Lesser than the minimum deposit Enter Amount from ". round($min,2)."-".round($max,2);

      }
      else if($amount > $max){
      	$response['message'] = "Amount Exceeds the maximum deposit Enter Amount from ". round($min,2)."-".round($max,2);
      }
      else{
      	if($choose == 1){
      		//checking user account balance
  	$accsql = "SELECT * from accounts where user_id='$id'";
     $accresult = mysqli_query($link,$accsql);
                                    $countacc = mysqli_num_rows($accresult);

   if($countacc != 0){
     $accrow = mysqli_fetch_array($accresult, MYSQLI_ASSOC); 
      $bal = $accrow["account_balance"];

      if($amount > $bal){
      	$response['message'] = "Insufficient Funds! You do not have enough funds in your account balance";
      }
      else{
      	$new = $bal-$amount;
      	$depsql = "SELECT * from deposits where user_id='$id' and approve = 1";
     $depresult = mysqli_query($link,$depsql);
     $countdep = mysqli_num_rows($depresult);

   if($countdep != 0){
$sql9 = "INSERT INTO transactions(user_id,transaction_type,transaction_amount,transaction_status) values('$id','deposit','$amount','1')";

		if(mysqli_query($link,$sql9)){
			$tlid1 = mysqli_insert_id($link);
			$edate = date('Y-m-d H:i:s', strtotime($today. ' + ' . $period . 'days'));
			$sql8 = "INSERT INTO deposits(user_id,plan_id,deposit_amount,deposit_type,expiry_date,status,approve,transaction_id) values('$id','$plan','$amount','account_balance','$edate','1','1','$tlid1')";

		if(mysqli_query($link,$sql8)){

			$uacc1 = "UPDATE accounts SET account_balance = $new, system_balance = system_balance+$amount WHERE user_id='$id'";
		if(mysqli_query($link,$uacc1)){
			$response['status'] = 2; 
			$response['message'] = "Deposit Successful ";
		}
		else{
			$response['message'] = "Failed to deposit! Please Try again";	
		}

		}
		else{
			$response['message'] = "Failed to deposit! Please Try again";	

		}
		}
   }
   else{
$depsql2 = "SELECT * from users where user_id='$id'";
     $depresult2 = mysqli_query($link,$depsql2);
     $countdep2 = mysqli_num_rows($depresult2);

   if($countdep2 != 0){
   	$deprow = mysqli_fetch_array($depresult2, MYSQLI_ASSOC); 
      $referer = $deprow["referer_id"];

      if(is_null($referer)){
$sql0 = "INSERT INTO transactions(user_id,transaction_type,transaction_amount,transaction_status) values('$id','deposit','$amount','1')";

		if(mysqli_query($link,$sql0)){
			$tlid3 = mysqli_insert_id($link);
			$edate = date('Y-m-d H:i:s', strtotime($today. ' + ' . $period . 'days'));
			$sql09 = "INSERT INTO deposits(user_id,plan_id,deposit_amount,deposit_type,expiry_date,status,approve,transaction_id) values('$id','$plan','$amount','account_balance','$edate','1','1','$tlid3')";

		if(mysqli_query($link,$sql09)){

			$uacc9 = "UPDATE accounts SET account_balance = $new, system_balance = system_balance+$amount WHERE user_id='$id'";
		if(mysqli_query($link,$uacc9)){
			$response['status'] = 2; 
			$response['message'] = "Deposit Successful ";
		}
		else{
			$response['message'] = "Failed to deposit! Please Try again";	
		}

		}
		else{
			$response['message'] = "Failed to deposit! Please Try again";	

		}
		}
      }

      else{
      $bon = ($per/100) * $amount;
$sql = "INSERT INTO bonus(user_id,bonus_type,bonus_amount) values('$referer','referal','$bon')";

		if(mysqli_query($link,$sql)){
			$refacc = "UPDATE accounts SET account_balance = account_balance+$bon WHERE user_id='$referer'";
		if(mysqli_query($link,$refacc)){
			// adding the referal bonus to referals

			$sqlr = "INSERT INTO referals(user_id,refered_id,bonus_amount) values('$referer','$id','$bon')";

		if(mysqli_query($link,$sqlr)){

			$sql12 = "INSERT INTO transactions(user_id,transaction_type,transaction_amount,transaction_status) values('$id','deposit','$amount','1')";

		if(mysqli_query($link,$sql12)){
			$tlid12 = mysqli_insert_id($link);
			$edate = date('Y-m-d H:i:s', strtotime($today. ' + ' . $period . 'days'));
			$sql98 = "INSERT INTO deposits(user_id,plan_id,deposit_amount,deposit_type,expiry_date,status,approve,transaction_id) values('$id','$plan','$amount','account_balance','$edate','1','1','$tlid12')";

		if(mysqli_query($link,$sql98)){

			$uaccl = "UPDATE accounts SET account_balance = $new, system_balance = system_balance+$amount WHERE user_id='$id'";
		if(mysqli_query($link,$uaccl)){
			$response['status'] = 2; 
			$response['message'] = "Deposit Successful:)";
		}
		else{
			$response['message'] = "Failed to deposit! Please Try again";	
		}

		}
		else{
			$response['message'] = "Failed to deposit! Please Try again";	

		}
		}
		else{
		$response['message'] = "Sorry an unexpected error occured during deposit! Try again";	
		}
	}
	else{
	$response['message'] = "Sorry an unexpected error occured! Try again";		
	}
		}
		else{
			$response['message'] = "Sorry an unexpected error occured! Try again";	
		}
		}
		else{
		$response['message'] = "Sorry an unexpected error occured! Try again";	
		}
	}
	

	}
}
   
   }
}
}




      	else if($choose2 == 1){
      		
			$depsql22 = "SELECT * from plans where plan_id='$plan'";
     $depresult22 = mysqli_query($link,$depsql22);
     $countdep22 = mysqli_num_rows($depresult22);

   if($countdep22 != 0){
   	$deprow = mysqli_fetch_array($depresult22, MYSQLI_ASSOC); 
      $coin = $deprow["coin_id"];

      $depsql3 = "SELECT * from coins where coin_id='$coin'";
     $depresult3 = mysqli_query($link,$depsql3);
     $countdep3 = mysqli_num_rows($depresult3);

   if($countdep3 != 0){
   	$deprow = mysqli_fetch_array($depresult3, MYSQLI_ASSOC); 
      $wallet = $deprow["coin_wallet"];
      $coinname = $deprow["coin_name"];
$sql29 = "INSERT INTO transactions(user_id,transaction_type,transaction_amount,transaction_status) values('$id','deposit','$amount','0')";

		if(mysqli_query($link,$sql29)){
			$tlid78 = mysqli_insert_id($link);
			$edate = date('Y-m-d H:i:s', strtotime($today. ' + ' . $period . 'days'));
			$sql24 = "INSERT INTO deposits(user_id,plan_id,deposit_amount,deposit_type,expiry_date,status,approve,transaction_id) values('$id','$plan','$amount','wallet','$edate','0','0','$tlid78')";

		if(mysqli_query($link,$sql24)){
	$response['coin'] = $wallet;
	$response['coinn'] = $coinname;
	$response['status'] = 1; 
			$response['message'] = "Deposit Initiated Please Wait while the Admin approve your Deposit :)";

		}
		else{
			$response['message'] = "Failed to deposit! Please Try again";	

		}
		}
		else{
		$response['message'] = "Sorry an unexpected error occured during deposit! Try again";	
		}		
  }
  else{
  	$response['message'] = "Coin Wallet Unavailable for this plan please choose another plan";
  }

  }
  else{
  	$response['message'] = "Plan Unavailable at the moment please choose another plan";
  }
			

      	}


      }
  }


    echo json_encode($response);
  }


if(isset($_POST["sp"])){
	$response = array( 
    'status' => 0,
    'coin' => ' ', 
    'plan' => ' ',
    'min' => ' ', 
    'max' => ' ',
    'period' => ' ', 
    'ref' => ' ',
    'per' => ' ',
    'message' => ' '

);
$depsql2 = "SELECT * from plans where plan_id='$plid'";
     $depresult2 = mysqli_query($link,$depsql2);
     $countdep2 = mysqli_num_rows($depresult2);

   if($countdep2 != 0){
   	$planrow = mysqli_fetch_array($depresult2, MYSQLI_ASSOC); 
   	$cid = $planrow["coin_id"];

   	$depsql22 = "SELECT * from coins where coin_id='$cid'";
     $depresult22 = mysqli_query($link,$depsql22);
     $countdep22 = mysqli_num_rows($depresult22);

   if($countdep2 != 0){
   	$planrow2 = mysqli_fetch_array($depresult22, MYSQLI_ASSOC); 
   	$cn = $planrow2["coin_name"];
      $response['status'] = 1; 
      $response['plan'] = $planrow["plan_name"];
      $response['coin'] = $cn;
      $response['ref'] = $planrow["referal_bonus"];
      $response['period'] = $planrow["period"];
      $response['min'] = round($planrow["min_deposit"],2);
      $response['max'] = round($planrow["max_deposit"],2);
      $response['per'] = $planrow["percentage_profit"];
      $response['message'] = "Successful";
  }
  else{
$response['message'] = "Plan Coin Unavailable at the moment";
  }
      }
      else{
$response['message'] = "Plan Details Unavailable at the moment";
      }	
      echo json_encode($response);
}



if (isset($_POST['contact'])) {
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Send Message, Please try again!' 
);
	session_start();
	$from = $email; 
$to = 'support@cryptochainspot.com'; 
$fromName = $name; 
 
$subject = $topic; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Hello Support</title> 
    </head> 
    <body> 
        
        <div style="border:1px solid gray"> 
        <div style="width:100%; background-color:goldenrod">
        <img src="../img/logo.png" width="50" height="50" />
        </div>
        <div style="margin-top:2%; text-align:center">
        '.$message.'
        </div>
        </div>
        
         </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: '.$email . "\r\n"; 
$headers .= 'Bcc: '.$email . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $htmlContent, $headers)){
$response['status'] = 1; 
			$response['message'] = "Message Sent Successfully:)";	
}
else{
$response['message'] = "Error contacting us please try again!";		
}



	 echo json_encode($response);
}


if (isset($_POST['withdraw'])) {
	session_start();
  	$id = $_SESSION['user'];
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Send Withdrawal Request, Please try again!' 
);
	$accsql = "SELECT * from accounts where user_id='$id'";
     $accresult = mysqli_query($link,$accsql);
     $countacc = mysqli_num_rows($accresult);

   if($countacc != 0){
	$accrow = mysqli_fetch_array($accresult, MYSQLI_ASSOC); 
      $bal = $accrow["account_balance"];

      if($amount > $bal){
      	$response['message'] = "Insufficient Funds! You do not have enough funds in your account balance";
      }
      else{
      	$sql2 = "INSERT INTO transactions(user_id,transaction_type,transaction_amount,transaction_status) values('$id','withdrawal','$amount','0')";

		if(mysqli_query($link,$sql2)){
			$tlid = mysqli_insert_id($link);
			$sql2 = "INSERT INTO withdrawals(user_id,wallet_id,amount,transaction_status,transaction_id) values('$id','$wallet','$amount','0','$tlid')";

		if(mysqli_query($link,$sql2)){
			$response['status'] = 2; 
			$response['message'] = "Successfully Requested Withdrawal Amount will be sent to your Wallet within 24 Hours:)";
		}
		else{
$response['message'] = "Sorry an unexpected error occured";

		}
	}
	else{
$response['message'] = "Sorry an unexpected error occured";
      }
	}
  }

  else{
$response['message'] = "Could not find your account Please try again";

  }



	 echo json_encode($response);
}


if (isset($_POST['transfer'])) {
	session_start();
  	$id = $_SESSION['user'];
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Make Transfer, Please try again!' 
);

$checkcoin = "SELECT * FROM users where username = '$user' || email_address='$user'";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			if($countcheckcoin > 0){
				$trow = mysqli_fetch_array($resultcheckcoin, MYSQLI_ASSOC); 
				$tid = $trow["user_id"];

				$accsql = "SELECT * from accounts where user_id='$id'";
     $accresult = mysqli_query($link,$accsql);
     $countacc = mysqli_num_rows($accresult);

   if($countacc != 0){
	$accrow = mysqli_fetch_array($accresult, MYSQLI_ASSOC); 
      $bal = $accrow["account_balance"];

      if($amount > $bal){
      	$response['message'] = "Insufficient Funds! You do not have enough funds to Transfer";
      }
      else{
      	$sql2 = "INSERT INTO transactions(user_id,transaction_type,transaction_amount,transaction_status) values('$id','Transfer','$amount','1')";

		if(mysqli_query($link,$sql2)){
			$tlid = mysqli_insert_id($link);
			$sql2 = "INSERT INTO tranfers(user_id,beneficiary_id,transaction_amount,description,transaction_id) values('$id','$tid','$amount','Funds Transfer','$tlid')";

		if(mysqli_query($link,$sql2)){
			$new = $bal-$amount;
      	$uacc = "UPDATE accounts SET account_balance = $new WHERE user_id='$id'";
		if(mysqli_query($link,$uacc)){

		$uacc = "UPDATE accounts SET account_balance = account_balance+$amount WHERE user_id='$tid'";
		if(mysqli_query($link,$uacc)){
			$response['status'] = 1; 
			$response['message'] = "Transfer Successful ";
		}
		else{
			$response['message'] = "Failed to deposit! Please Try again";	
		}


		}
		else{
			$response['message'] = "Failed to Transfer! Please Try again";	
		}

		}
		else{
$response['message'] = "Sorry an unexpected error occured";

		}
	}
	else{
	$response['message'] = "Sorry an unexpected error occured";	
	}

      	

      }
			}
			else{
						$response['message'] = "Sorry an unexpected error occured";	
			}
		}
		else{
		$response['message'] = "Please enter the correct Username or Email this user does not exist";	
		}

	 echo json_encode($response);
}



if (isset($_POST['editp'])) {
	session_start();
  	$id = $_SESSION['user'];
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Edit Details, Please try again!' 
);
	$checkcoin = "SELECT * FROM users where user_id != '$id' and phone_number='$phone'";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			if($countcheckcoin == 0){
$uacc = "UPDATE users SET fullname = '$name', phone_number = '$phone' WHERE user_id='$id'";
		if(mysqli_query($link,$uacc)){
			$response['status'] = 1; 
			$response['message'] = "Account Edited Successfully ";
		}
		else{
			$response['message'] = "Failed to Edit Account! Please Try again";	
		}
	}
	else{
		$response['message'] = "The Requested Phone number already exist for another user! Please Try again";	
	}


	 echo json_encode($response);
}


if (isset($_POST['addp'])) {
	session_start();
  	$id = $_SESSION['user'];
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Edit Details, Please try again!' 
);

$checkcoin = "SELECT * FROM users where user_id= '$id' and password=md5('$oldp')";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			if($countcheckcoin > 0){
				$uacc = "UPDATE users SET password = md5('$newp') WHERE user_id='$id'";
		if(mysqli_query($link,$uacc)){
			$response['status'] = 1; 
			$response['message'] = "Password Edited Successfully ";
		}
		else{
			$response['message'] = "Failed to Edit Password! Please Try again";	
		}
			}
			else{
				$response['message'] = "The Old Password Specified is wrong";	
			}
	 echo json_encode($response);
}



if (isset($_POST['addwallet'])) {
	session_start();
  	$id = $_SESSION['user'];
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Add Wallet, Please try again!' 
);
$sql = "INSERT INTO wallets(user_id,coin_id,wallet_address) values('$id','$coin','$wallet')";

		if(mysqli_query($link,$sql)){
			$response['status'] = 1; 
			$response['message'] = "Wallet Added Successfully :)";
		}
		else{
			$response['message'] = "Error Adding Wallet Please try again!";
			}
			

	 echo json_encode($response);
}



if (isset($_POST['delwal'])) {
	session_start();
  	$id = $_SESSION['user'];
$accsql = "SELECT * from withdrawals where wallet_id='$walid'";
     $accresult = mysqli_query($link,$accsql);
     $countacc = mysqli_num_rows($accresult);

   if($countacc == 0){
$sql = "DELETE FROM wallets where wallet_id = '$walid'";

		if(mysqli_query($link,$sql)){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Wallet Deleted Successfully');
    window.location.href='wallet';
    </script>");
		}
		else{
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Deleting Wallet Please try again');
    window.location.href='wallet';
    </script>");
	
}
}
else{
	
   	$accrow = mysqli_fetch_array($accresult, MYSQLI_ASSOC); 
      $ts = $accrow["transaction_status"];
      if($ts == 0){
      	echo ("<script LANGUAGE='JavaScript'>
				alert('A Pending Withdrawal is depending on this wallet. please contact the support team for Help');
    window.location.href='wallet';
    </script>");

      }
      else{
$sql = "UPDATE withdrawals set wallet_id = null where wallet_id = '$walid'";

		if(mysqli_query($link,$sql)){
			$sql2 = "DELETE FROM wallets where wallet_id = '$walid'";

		if(mysqli_query($link,$sql2)){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Wallet Deleted Successfully');
    window.location.href='wallet';
    </script>");
		}
		else{
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Deleting Wallet Please try again');
    window.location.href='wallet';
    </script>");
	
}
		}
		else{
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Deleting Wallet Please try again');
    window.location.href='wallet';
    </script>");
	
}
      }

}
}



// for deleting a user


// editing user
if (isset($_POST['edituser'])) {
	session_start();
$response = array( 
    'status' => 0, 
    'message' => 'Failed to Edit Details, Please try again!',
    'uv' => 'u' 
);

  	
			$checkcoin = "SELECT * FROM users where user_id != '$uid' and phone_number='$phone'";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			if($countcheckcoin == 0){
			$checkcoin2 = "SELECT * FROM users where user_id != '$uid' and email_address='$email'";
			$resultcheckcoin2 = mysqli_query($link, $checkcoin2);
			$countcheckcoin2 = mysqli_num_rows($resultcheckcoin2);

			if($countcheckcoin2 == 0){	
				$sql = "UPDATE users SET fullname = '$fullname', username = '$username', email_address = '$email', phone_number = '$phone' where user_id = '$uid'";

  	$sql2 = "UPDATE accounts SET account_balance = '$acc' where user_id = '$uid'";

		if((mysqli_query($link,$sql)) && (mysqli_query($link,$sql2))){
			if($uv == "admin"){
				$response['status'] = 1;
			$response['uv'] = "a";

		}
		

		$response['status'] = 1; 
			$response['message'] = "User Details Edited Successfully ";
	}
	else{
			$response['message'] = "Error Editing user Details";
	
}
	}
	else{
		
			$response['message'] = "This Email Address already exists for another Account";
		
	}
	}
	
	else{
		$response['message'] = "This Phone number already exist for another Account ";
		
	}
 echo json_encode($response);
		
}


if (isset($_POST['apdep'])) {

	$depsql = "SELECT * from deposits where user_id='$userid' and approve != 0";
     $depresult = mysqli_query($link,$depsql);
     $countdep = mysqli_num_rows($depresult);

   if($countdep != 0){

$sql = "UPDATE deposits SET approve = 1, status = 1 where deposit_id = '$did'";

  	$sql2 = "UPDATE transactions SET transaction_status = 1 where transaction_id = '$did'";

		if((mysqli_query($link,$sql)) && (mysqli_query($link,$sql2))){


			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Deposit Approved :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Deposit Approved :)');
    window.location.href='view?ad';
    </script>");	
		}
	}
	else{
		if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
	}
}

else{
	$depsql2 = "SELECT * from users where user_id='$userid'";
     $depresult2 = mysqli_query($link,$depsql2);
     $countdep2 = mysqli_num_rows($depresult2);

   if($countdep2 != 0){
   	$deprow = mysqli_fetch_array($depresult2, MYSQLI_ASSOC); 
      $referer = $deprow["referer_id"];

      if(is_null($referer)){
      	$sql = "UPDATE deposits SET approve = 1, status = 1 where deposit_id = '$did'";

  	$sql2 = "UPDATE transactions SET transaction_status = 1 where transaction_id = '$did'";

		if((mysqli_query($link,$sql)) && (mysqli_query($link,$sql2))){


			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Deposit Approved :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Deposit Approved :)');
    window.location.href='view?ad';
    </script>");	
		}
	}
	else{
		if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
	}

      }

      else{
      	$plansql = "SELECT * from plans where plan_id='$plan'";
     $planresult = mysqli_query($link,$plansql);
                                    $countplan = mysqli_num_rows($planresult);

   if($countplan != 0){
     $planrow = mysqli_fetch_array($planresult, MYSQLI_ASSOC); 
      $planid = $planrow["plan_id"];
      $coin = $planrow["coin_id"];
      $ref = $planrow["referal_bonus"];
      $period = $planrow["period"];
      $min = $planrow["min_deposit"];
      $max = $planrow["max_deposit"];
      $per = $planrow["percentage_profit"];
$bon = ($per/100) * $amount;
$sql = "INSERT INTO bonus(user_id,bonus_type,bonus_amount) values('$referer','referal','$bon')";

		if(mysqli_query($link,$sql)){
			$refacc = "UPDATE accounts SET account_balance = account_balance+$bon WHERE user_id='$referer'";
		if(mysqli_query($link,$refacc)){
			// adding the referal bonus to referals

			$sqlr = "INSERT INTO referals(user_id,refered_id,bonus_amount) values('$referer','$id','$bon')";

		if(mysqli_query($link,$sqlr)){
$sql = "UPDATE deposits SET approve = 1, status = 1 where deposit_id = '$did'";

  	$sql2 = "UPDATE transactions SET transaction_status = 1 where transaction_id = '$did'";

		if((mysqli_query($link,$sql)) && (mysqli_query($link,$sql2))){

$uacc1 = "UPDATE accounts SET system_balance = system_balance+$amount WHERE user_id='$userid'";
		if(mysqli_query($link,$uacc1)){
			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Deposit Approved :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Deposit Approved :)');
    window.location.href='view?ad';
    </script>");	
		}
	}
	else{
		if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
	}
}
else{
if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
}
      }
      else{
if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
      }
  }
  else{
if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
  }
}
else{
if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
}

}
else{
if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
}
}
}
else{
if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Error Approving Deposit :)');
    window.location.href='view?ad';
    </script>");	
		}
}
}

}



// deleting deposits
if (isset($_POST['deldep'])) {
	session_start();
  	$sql = "DELETE FROM deposits where deposit_id = '$did'";

  	$sql2 = "DELETE FROM transactions where transaction_id = '$tid'";

		if((mysqli_query($link,$sql)) && (mysqli_query($link,$sql2))){
			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Deposit Deleted Successfully :)');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Deposit Deleted Successfully :)');
    window.location.href='view?ad';
    </script>");	
		}
		}

		else{
			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Failed to Delete Deposit');
    window.location.href='view?pd';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Failed to Delete Deposit');
    window.location.href='view?ad';
    </script>");	
		}
	
}


}




// approving deposits
if (isset($_POST['apwit'])) {
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to approve, Please try again!' 
);

$sql = "UPDATE withdrawals SET transaction_status = 1 where withdrawal_id = '$wid'";

  	$sql2 = "UPDATE transactions SET transaction_status = 1 where transaction_id = '$tid'";
$sql3 = "UPDATE account_balance SET account_balance = account_balance-$wamt where user_id = '$userid'";

		if((mysqli_query($link,$sql)) && (mysqli_query($link,$sql2)) && (mysqli_query($link,$sql3))){

			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Withdrawal Approved :)');
    window.location.href='view?pw';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Withdrawal Approved :)');
    window.location.href='view?aw';
    </script>");	
		}
		}

		else{
			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Failed');
    window.location.href='view?pw';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Failed');
    window.location.href='view?aw';
    </script>");	
		}
	
}



	 echo json_encode($response);
}



// deleting Withdrawal
if (isset($_POST['delwit'])) {
	session_start();
  	$sql = "DELETE FROM withdrawals where withdrawal_id = '$wid'";

  	$sql2 = "DELETE FROM transactions where transaction_id = '$tid'";

		if((mysqli_query($link,$sql)) && (mysqli_query($link,$sql2))){
			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Withdrawal Deleted Successfully :)');
    window.location.href='view?pw';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Withdrawal Deleted Successfully :)');
    window.location.href='view?aw';
    </script>");	
		}
		}

		else{
			if($uv == "p"){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Failed to Delete Withdrawal');
    window.location.href='view?pw';
    </script>");

		}
		else{
		echo ("<script LANGUAGE='JavaScript'>
				alert('Failed to Delete Withdrawal');
    window.location.href='view?aw';
    </script>");	
		}
	
}


}

// deleting coin
if (isset($_POST['editcoin'])) {
	session_start();
$response = array( 
    'status' => 0, 
    'message' => 'Failed to Edit Coin, Please try again!',
    'uv' => 'u' 
);

  	
			$checkcoin = "SELECT * FROM coins where coin_id != '$coinid' and coin_wallet='$wallet'";
			$resultcheckcoin = mysqli_query($link, $checkcoin);
			$countcheckcoin = mysqli_num_rows($resultcheckcoin);

			if($countcheckcoin == 0){
			$checkcoin2 = "SELECT * FROM coins where coin_id != '$coinid' and coin_name='$coinname'";
			$resultcheckcoin2 = mysqli_query($link, $checkcoin2);
			$countcheckcoin2 = mysqli_num_rows($resultcheckcoin2);

			if($countcheckcoin2 == 0){	
				
$sql = "UPDATE coins SET coin_name = '$coinname', abbrev = '$abbrev', coin_wallet = '$wallet' where coin_id = '$coinid'";

		if(mysqli_query($link,$sql)){
			
		$response['status'] = 1; 
			$response['message'] = "Coin Details Edited Successfully ";
	}
	else{
			$response['message'] = "Error Editing Coin Details";
	
}

	}
	else{
		
			$response['message'] = "This Coin Name already exists for another Coin";
		
	}
	}
	
	else{
		$response['message'] = "This coin Wallet Address already exist for another coin";
		
	}
 echo json_encode($response);
		
}

// deleting coin
if (isset($_POST['editplan'])) {
	session_start();
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Edit Coin, Please try again!',
    'uv' => 'u' 
);
  	$sql = "UPDATE plans set plan_name='$pname', min_deposit = '$min', max_deposit='$max', percentage_profit='$profit', period = '$period', referal_bonus='$refp'";

		if(mysqli_query($link,$sql)){
			$response['status'] = 1; 
			$response['message'] = "Plan Edited Successfully :) ";
		}
		else{
			$response['message'] = "Failed to edit Plan. Please try again ";
		}
echo json_encode($response);

}


if (isset($_POST['editwal'])) {

$sql = "UPDATE wallets SET wallet_address='$wallet', coin_id = '$coin' where wallet_id = '$walid'";

		if(mysqli_query($link,$sql)){
			echo ("<script LANGUAGE='JavaScript'>
				alert('Wallet Updated Successfully');
    window.location.href='wallet';
    </script>");
		}
		else{
			echo ("<script LANGUAGE='JavaScript'>
				alert('Error Updating Wallet Please try again');
    window.location.href='wallet';
    </script>");
	
}
}


if (isset($_POST['fp'])) {
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Send EMail, Please try again!' 
);

$checkcoin2 = "SELECT * FROM users where email_address = '$email'";
			$resultcheckcoin2 = mysqli_query($link, $checkcoin2);
			$countcheckcoin2 = mysqli_num_rows($resultcheckcoin2);

			if($countcheckcoin > 0){
				 
				$row = mysqli_fetch_array($resultcheckcoin, MYSQLI_ASSOC);
				$id = $row['user_id'];
				$name = $row['username'];
				$from = 'support@cryptochainspot.com';
$to = $email; 
$fromName = 'CryptoChainSpot'; 
$email2 = $from;
 
$subject = 'Password Reset Link'; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Hello Support</title> 
    </head> 
    <body> 
        
        <div style="border:1px solid gray"> 
        <div style="width:100%; background-color:goldenrod">
        <img src="../img/logo.png" width="50" height="50" />
        </div>
        <div style="margin-top:2%; text-align:center">
        Hello '.$username.' <br> Here is your password reset Link. Click on the link below or copy and paste in a browser.
        </div>
        </div>
        
         </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: '.$email2 . "\r\n"; 
$headers .= 'Bcc: '.$email2 . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $htmlContent, $headers)){
$response['status'] = 1; 
			$response['message'] = "Message Sent Successfully:)";	
}
else{
$response['message'] = "Error Sending Mail please try again!";		
}
}
else{
	$response['message'] = "Sorry We couldnt find your Account Please check the email Address!";	
}


	 echo json_encode($response);
}


?>