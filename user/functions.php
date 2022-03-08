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
			//checking if wallet is not empty
			if($wallet !=''){
				//inserting into wallets table
					$sql = "INSERT INTO wallets(user_id,coin_id,wallet_address) values('$uid','$cid','$wallet')";

		if(mysqli_query($link,$sql)){
			$response['status'] = 1; 
			$response['message'] = "Registered Successfully :)";
		}
		else{
			$response['message'] = "Error Registering Please try again!";
			}
			
		}
		else{
			$response['status'] = 1; 
			$response['message'] = "Registered Successfully :)";
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
			if($wallet !=''){
					$sql = "INSERT INTO wallets(user_id,coin_id,wallet_address) values('$uid','$cid','$wallet')";

		if(mysqli_query($link,$sql)){
			$response['status'] = 1; 
			$response['message'] = "Registered Successfully :)";
		}
		else{
			$response['message'] = "Error Registering Please try again!";
			}
			
		}
		else{
			$response['status'] = 1; 
			$response['message'] = "Registered Successfully :)";
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

			$checkcoin2 = "SELECT * FROM users where email_address = '$username' and password=md5('$pass')";
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
				$sql = "UPDATE otp SET otp='$otp' where user_id='$id'";
			

		if(mysqli_query($link,$sql)){
			$response['status'] = 1;

		}

		else{
			$response['message'] = "Failed to Login, please try again!";

		}
			}
			else{

				$sql = "INSERT INTO otp(user_id,otp) values('$id','$otp')";
			

		if(mysqli_query($link,$sql)){
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
				$sql = "UPDATE otp SET otp='$otp' where user_id='$id'";
			

		if(mysqli_query($link,$sql)){
			$response['status'] = 1;

		}

		else{
			$response['message'] = "Failed to Login, please try again!";

		}
			}
			else{

				$sql = "INSERT INTO otp(user_id,otp) values('$id','$otp')";
			

		if(mysqli_query($link,$sql)){
			$response['status'] = 1;

		}

		else{
			$response['message'] = "Failed to Login, please try again!";

		}
	}



	echo json_encode($response);	
}


if (isset($_POST['otp'])) {
	$response = array( 
    'status' => 0, 
    'message' => 'Failed to Login, Please try again!' 
);
	$result = mysqli_query($conn,"SELECT * FROM otp WHERE user_id = '$id' AND otp='$otp' AND is_expired!=1 AND NOW() <= DATE_ADD(created_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if($count > 0) {
		$result = if(mysqli_query($conn,"UPDATE otp SET is_expired = 1 WHERE user_id='$id'")){
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
					
	
	} else {
		$response['message'] = "OTP Expired or Invalid OTP!";
	}

	echo json_encode($response);	
}

?>