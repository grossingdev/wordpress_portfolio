<?php

if (! defined(ABSPATH))
{
	$path1 = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
	echo $path1;
	include_once($path1.'wp-load.php');
}


/* ============================================================================================================================================= */


// site owner

$site_name     = get_bloginfo('name');
$sender_domain = trim($_POST['sender_domain']);
$admin_email   = get_bloginfo('admin_email');
$to            = get_option('contact_form_to', $admin_email);
$subject       = trim($_POST['subject']);


/* ============================================================================================================================================= */


// contact form fields

$name    = trim($_POST['name']);
$email   = trim($_POST['email']);
$message = trim($_POST['message']);
$url     = trim($_POST['url']);


/* ============================================================================================================================================= */


// check for errors

$error = false;

if ($name === "") { $error = true; }
elseif ($email === "") { $error = true; }
elseif ($message === "") { $error = true; }
elseif ($to === "") { $error = true; }


/* ============================================================================================================================================= */


// send mail

if (isset($url) && $url == "")
{
	echo $to.$name.$email.$message;
	if ($error == false)
	{
		$body     = "Name: $name" . "\n\n";
		$body    .= "Email: $email" . "\n\n";
		$body    .= "Message: $message";

		$headers  = "From: $site_name <$sender_domain>" . "\r\n";
		$headers .= "Reply-To: $name <$email>" . "\r\n";
		$headers .= "Content-Type: text/plain; charset=utf-8";

		$mail_result = wp_mail($to, $subject, $body, $headers);

		if ($mail_result == true)
		{
			echo 'success';
		}
		else
		{
			echo 'unsuccess';
		}
	}
	else
	{
		echo 'error';
	}
}

?>