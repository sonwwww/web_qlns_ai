
<?php 

$email_mk = $_POST['email_mk'];
$loai_tk = $_POST['loai_tk'];

include('../database/connectdb.php');
ob_start();
session_start();
ob_end_flush();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require '../vendor/phpmailer/phpmailer/src/Exception.php';
// require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php';

if($loai_tk == 0){
    $data_user = mysqli_query($conn, "SELECT * FROM user_nv WHERE email_nv = '$email_mk' LIMIT 1");
    if ($data_user->num_rows > 0) {
        $data = mysqli_fetch_array($data_user);
        $subject = "Email gửi mã xác thực";
        $message = rand(100000, 999999);
        // preparing mail content
        $messagecontent ="<br>Email : " . $email_mk. "<br>Tiêu đề :" . $subject. "<br>Mã xác thực của bạn là: " . $message;
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = 2;                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'roobii20301@gmail.com';                     //SMTP username
            $mail->Password   = 'ds20032001';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('roobii20301@gmail.com', 'Roobii');
            $mail->addAddress("'". $email_mk."'", "'".$data['name_nv']."'");     //Add a recipient
        
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Mail xác thực:";
            $mail->Body    = $messagecontent;
            
            $mail->send();
        
        } catch (\Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        $update = mysqli_query($conn, "UPDATE user_nv SET otp = $message WHERE id_nv = $data[id_nv]");
        setcookie("IDUQMK", $data['id_nv'], time() + 60 * 60 * 24 * 30, '/');
        setcookie("UTK", $loai_tk, time() + 60 * 60 * 24 * 30, '/');
        echo json_encode([
			'result' => true,
			'msg' => 'Thành công'
		]);
    } else {
        echo json_encode([
            'result' => false,
            'msg' => 'Email không chính xác hay nhập lại'
        ]);
    }
} else {
    $data_user = mysqli_query($conn, "SELECT * FROM user_cty WHERE email = '$email_mk' LIMIT 1");
    if ($data_user->num_rows > 0) {
        $data = mysqli_fetch_array($data_user);
        //Load Composer's autoloader
        require '../vendor/autoload.php';
        $subject = "Email gửi mã xác thực";
        $message = rand(100000, 999999);
        // preparing mail content
        $messagecontent ="<br>Email : " . $email_mk. "<br>Tiêu đề :" . $subject. "<br>Mã xác thực của bạn là: " . $message;
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            // $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'roobii20301@gmail.com';                     //SMTP username
            $mail->Password   = 'ds20032001';                               //SMTP password
            // $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('roobii20301@gmail.com', 'Roobii');
            $mail->addAddress($email_mk, $data['name_cty']);     //Add a recipient
        
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Mail xác thực:";
            $mail->Body    = $messagecontent;
            
            $mail->send();
        
        } catch (\Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        $update = mysqli_query($conn, "UPDATE user_cty SET otp = $message WHERE id_cty = $data[id_cty]");
        setcookie("IDUQMK", $data['id_cty'], time() + 60 * 60 * 24 * 30, '/');
        setcookie("UTK", $loai_tk, time() + 60 * 60 * 24 * 30, '/');
        echo json_encode([
			'result' => true,
			'msg' => 'thành công'
		]);
    } else {
        echo json_encode([
            'result' => false,
            'msg' => 'Email không chính xác hay nhập lại'
        ]);
    }
}

mysqli_close($conn);
?>