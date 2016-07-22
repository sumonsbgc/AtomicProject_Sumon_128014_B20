<?php
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
include_once "../../../vendor/autoload.php";
//include_once "../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php";
include_once "../../../vendor/phpmailer/phpmailer/class.phpmailer.php";
include_once "../../../vendor/phpmailer/phpmailer/class.smtp.php";
use App\Bitm\SEIP128014\City\City;
$city = new City();
$allData = $city->selectAll();

$sl = 0;
$listInfo = "<thead>
<tr>
<th>#SL</th>
<th>ID</th>
<th>Name</th>
<th>City Name</th>
<th>Email</th>
<th>Description</th>
</tr>
</thead>";

$listInfo.="<tbody>";
foreach ($allData as $bd) {
    $sl++;
    $listInfo .="<tr>";
    $listInfo .="<td>{$sl}</td>";
    $listInfo .="<td>{$bd->id}</td>";
    $listInfo .="<td>{$bd->name}</td>";
    $listInfo .="<td>{$bd->city}</td>";
    $listInfo .="<td>{$bd->email}</td>";
    $listInfo .="<td>{$bd->description}</td>";
    $listInfo .="<tr>";
}
$listInfo.="</tbody>";


$html = <<<body
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Detail List</title>
    <!-- Bootstrap -->
    <link href="../../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h2>User's All Information</h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    $listInfo
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
body;


//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "iriningle@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "ingle974410";
//Set who the message is to be sent from
$mail->setFrom('iriningle@gmail.com', 'Irin');
//Set an alternative reply-to address
$mail->addReplyTo('iriningle@gmail.com', 'Irin');
//Set who the message is to be sent to
$mail->addAddress('sumonsbgc@gmail.com', 'Sumon');
//Set the subject line
$mail->Subject = 'City Data';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'Here you can find all City Data as a table';
//Attach an image file
///$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
$mail->Body=$html;
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}