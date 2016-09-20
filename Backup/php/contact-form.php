<?php

/*

Name: 			Contact Form

Written by: 	Okler Themes - (http://www.okler.net)

Version: 		3.1.0

*/



session_cache_limiter('nocache');

header('Expires: ' . gmdate('r', 0));



header('Content-type: application/json');



// Enter your email address below.

$to = 'lialalbuquerque@hotmail.com';



$subject = $_POST['subject'];



if($to) {

	$name = $_POST['name'];

	$email = $_POST['email'];



	$fields = array(

		0 => array(

			'text' => 'Nome',

			'val' => $_POST['name']

		),

		1 => array(

			'text' => 'Email',

			'val' => $_POST['email']

		),

		2 => array(

			'text' => 'Mensagem',

			'val' => $_POST['message']

		)

	);



	$message = "";



	foreach($fields as $field) {

		$message .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "<br>\n";

	}



	$headers = '';

	$headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";

	$headers .= "Reply-To: " .  $email . "\r\n";

	$headers .= "MIME-Version: 1.0\r\n";

	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";



	if (mail($to, $subject, $message, $headers)){

		$arrResult = array ('response'=>'successo');

	} else{

		$arrResult = array ('response'=>'error');

	}



	echo json_encode($arrResult);



} else {



	$arrResult = array ('response'=>'error');

	echo json_encode($arrResult);



}

?>

