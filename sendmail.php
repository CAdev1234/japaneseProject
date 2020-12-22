<?php
if (isset($_POST['UserName'])) {
    $user_name = $_REQUEST['UserName'];
    echo($user_name);
}
if (isset($_POST['UserPhone'])) {
    $user_phone = $_REQUEST['UserPhone'];
}
if (isset($_POST['UserEmail'])) {
    $user_email = $_REQUEST['UserEmail'];
}
if (isset($_POST['UserAddress'])) {
    $user_address = $_REQUEST['UserAddress'];
}
if (isset($_POST['UserContactTime'])) {
    $user_contact_time = $_REQUEST['UserContactTime'];
}
if (isset($_POST['UserHouse'])) {
    $user_house = $_REQUEST['UserHouse'];
}
if (isset($_POST['UserDetail'])) {
    $user_detail = $_REQUEST['UserDetail'];
}
if (isset($_POST['PlanName'])) {
    $plan_name = $_REQUEST['PlanName'];
}
echo($_POST['PlanName']);

require 'PHPMailer.php';
require 'Exception.php';
require  'SMTP.php';

$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
$smtp = new \PHPMailer\PHPMailer\SMTP();

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.kagoya.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'octvhp.octvinq';                     // SMTP username
    $mail->Password   = 'rW5fgj4A';                               // SMTP password
    $mail->SMTPSecure = "tls";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('octv.s@octv.ne.jp', 'OCTV');
    $mail->addAddress($user_email);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '【料金シミュレーション】お申込に関するお問合せ';
    $mail->Body    = 'Subject:<br>【料金シミュレーション】お申込に関するお問合せ<br>Content:この度はOCTVのサービスにお問合せいただき、誠にありがとうございます。数日中に担当より連絡させて頂きますので、今しばらくお待ちください。ありがとうございました。'.'この度はOCTVのサービスにお問合せいただき、誠にありがとうございます。'.'<br>'.'数日中に担当より連絡させて頂きますので、今しばらくお待ちください。'.'<br>'.'ありがとうございました。'.'<br>'.'[申込内容]'.'<br>'.$plan_name.'<br>'.'[お名前]'.$user_name.'<br>'.'[電話番号]'.$user_phone.'<br>'.'[連絡可能な時間帯]'.$user_contact_time.'<br>'.'[E-mail]'.$user_email.'<br>'.'[ご住所]'.$user_address.'<br>'.'[建物タイプ]'.$user_house.'<br>'.'[ご不明な点等]'.$user_detail.'<br>'.'株式会社 帯広シティーケーブル'.'<br>'.'メール octv.b@octv.ne.jp'.'<br>'.'TEL 0120-16-6511（平日 9:00-18:30／土日祝 9:00-17:00）<br> 帯広市東1条南8丁目2番地 勝毎ビル4階';


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>