<?php

namespace App\Repositories\Viewer;

use App\Models\BannerContact;
use App\Models\Config;
use App\Repositories\BaseRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class ContactUsRepository extends BaseRepository {
    public function model()
    {
        return BannerContact::class;
    }

    public function index() {
        $query = $this->model->where('status', 1);
        $bannerContact = $query->first();
        return view('viewer.pages.contact_us', compact('bannerContact'));
    }

    public function sendMail($params) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = env('PHPMAILER_HOST');
            $mail->SMTPAuth   = env('PHPMAILER_SMTPAUTH');
            $mail->Username   = env('PHPMAILER_USERNAME');
            $mail->Password   = env('PHPMAILER_PASSWORD');
            $mail->SMTPSecure = env('PHPMAILER_SMTPSECURE');
            $mail->Port = env('PHPMAILER_PORT');

            $config = Config::first();
            $toMail = $config ? $config->email_admin : "dtuan5161@gmail.com";
            $mail->addAddress($toMail);

            $mail->isHTML(true);  // Set email content format to HTML

            if (isset($params['file'])) {
                $file_tmp  = $_FILES['file']['tmp_name'];
                $file_name = $_FILES['file']['name'];
                $mail->addAttachment($file_tmp, $file_name);
            }
            $mail->Subject = $params['name'];
            $html = "<b>Info:</b><br><br>";
            $html .= "Name: " . $params['name'] . "<br>";
            $html .= "Email: " . $params['email'] . "<br>";

            if (isset($params['message'])) {
                $html .= "Message: ";
                $html .= "<br><br>";
                $html .= $params['message'];
            }

            $mail->Body = $html;
            $mail->CharSet = "UTF-8";

            if( !$mail->send() ) {
                return false;
            }
            else {
                return true;
            }

        } catch (Exception $e) {
            return "error,Message could not be sent.";
        }
    }
}
