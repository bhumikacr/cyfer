<?php
if(isset($_POST['new'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $jdate=$_POST['jdate'];
    $mail=$_POST['mail'];
    $phone=$_POST['ph'];
    $role=$_POST['role'];

    $html="<h3> ID : $id <br> Name : $name <br> JoinDate : $jdate <br> Mail : $mail <br>
	 Phone : $phone <br> Role : $role </h3>";

    include('smtp/PHPMailerAutoload.php');
    $mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="crvbhumika@gmail.com"; //lc mail
	$mail->Password="ryfmquekuaqoeyzu"; //lc mail password
	$mail->SetFrom("crvbhumika@gmail.com"); //mail sender
	$mail->addAddress("bbhumi681@gmail.com"); //mail reciever
	$mail->IsHTML(true);
	$mail->Subject="New Lead From Website";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
        $_SESSION['status'] ="Message sent";
        $_SESSION['status_code'] ="success";
        header("Location: index.php");


		//echo "Mail send";
	}else{
		//echo "Error occur";
	}
	echo $msg;
}
     






   

   

   
 ?>
