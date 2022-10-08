<?php
    require_once "dbconnect.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once "vendor/autoload.php";
    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    $emailId = $_POST['email'];

    if (isset($_POST['submit']) && !empty($emailId)) {
        $emailId = $_POST['email'];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE email='" . $emailId . "'");
        $row = mysqli_fetch_array($result);

        if ($row) {
            $token = md5($emailId) . rand(10, 9999);
            $expFormat = mktime(
                date("H"),
                date("i"),
                date("s"),
                date("m"),
                date("d") + 1,
                date("Y")
            );

            $expDate = date("Y-m-d H:i:s", $expFormat);

            $update = mysqli_query($conn, "UPDATE user set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");

            $link = "<a href='http://{$_SERVER['HTTP_HOST']}/PHP_Training/Tutorial_10/reset-pw.php?key=" . $emailId . "&token=" . $token . "'>Click To Reset password</a>";

            try {
                $mail = new PHPMailer;
                //$mail->CharSet =  "utf-8";
                $mail->isSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                // GMAIL username
                $mail->Username = "tinhtarwai106330@gmail.com";
                // GMAIL password
                $mail->Password = "njldijxzesmctdxp";
                $mail->SMTPSecure = "ssl";
                $mail->SMTPDebug = 0;
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port = 465;
                $mail->From = 'tinhtarwai106330@gmail.com';
                $mail->FromName = 'thw';
                $mail->addAddress($row['email']);
                //$mailto:mail->addcc("cc@example.com");
                $mail->Subject  =  'Testing by thw';
                $mail->isHTML(true);
                $mail->Body    = 'Click On This Link to Reset Password ' . $link . '';
                $mail->Send();

                echo "<h3><center>Check Your Email and Click on the link sent to your email.</center></h3>";
            } catch (\Exception $e) {
                echo "Mail Error - >" . $e->getMessage();
            }
        } else {
            echo "Invalid Email Address. Go back";
        }
    } else {
        echo "something wrong";
    }
?>
