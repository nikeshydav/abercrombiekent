<?php
include("config.php");
include("classes/mimemail.class.php");
$content = '';
$content1 = '';
ini_set("display_errors",1);
error_reporting(E_ALL);

if(isset($_POST['newsletter_email']) && $_POST['newsletter_email']!=''){
     extract($_POST);

	    $content .= "Dear Admin, "."<br /><br />Please find the below newsletter subscriber details:<br /><br />";
		$content1 .= "Dear User or Subscriber, "." <br /><br /> Your email id has been successfully registered to receive newsletter from Abercrombie & Kent <br /><br />";
	
	 if($newsletter_email!=''){
	    $content .= "Email: ".$newsletter_email;
		$content1 .= "Email: ".$newsletter_email;
	 }
	 
	    
		$fromEmail 		= $_REQUEST['newsletter_email'];
		$subject	 	= "Abercrombie - Subscribe Newsletter";
                $bcc                    = "ankenquiries@gmail.com,powerfunction@gmail.com";
		
		//ob_end_clean();
		//ob_start();
		$body = $content1; //ob_get_contents();
		$headers = '';
		//ob_end_clean();
		
		// MAIL TO USER 
		$objMail = new Mimemail();
		$objMail->set_To($newsletter_email);
                $objMail->set_Bcc($bcc);
		
		$objMail->set_From($fromEmail);
		$objMail->set_Subject($subject); 
		$objMail->set_Body($content1);
		$objMail->set_Headers($headers);
		
		$objMail->send();
		
		
		//Mail To Admin
		$admin_email = 'privatetravel@abercrombiekent.co.in';
		$admin_email5 = 'IJubbal@abercrombiekent.co.in,ankenquiries@gmail.com,powerfunction@gmail.com';
		$objMail2 = new Mimemail();
		$objMail2->set_To($admin_email);
		$objMail2->set_Bcc($admin_email5);
		
		$objMail2->set_From($fromEmail);
		$objMail2->set_Subject($subject); 
		$objMail2->set_Body($content);
		$objMail2->set_Headers($headers);
		
		$objMail2->send();
		
		$_SESSION['successmsg']="Newsletter sign-up successful.";
		   //$url = str_replace("/","//",APP_ROOT_URL.$_REQUEST['redirect_url']);
		   header("location:".$_REQUEST['redirect_url']);
		   exit;
		
		unset($objMail2); 	
}
?>

