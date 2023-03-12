<?php

namespace App\Repositories\Viewer;

use App\Models\BannerContact;
use App\Models\Config;
use App\Models\ContactUs;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

//            if (isset($params['file'])) {
//                $file_tmp  = $_FILES['file']['tmp_name'];
//                $file_name = $_FILES['file']['name'];
//                $mail->addAttachment($file_tmp, $file_name);
//            }

            $this->store($params);

            $mail->Subject = $params['name'];
            $html = "<b>Info:</b><br><br>";
            $html .= "Name: " . $params['name'] . "<br>";
            $html .= "Email: " . $params['email'] . "<br>";

            if (isset($params['message'])) {
                $html .= "Message: ";
                $html .= "<br><br>";
                $html .= $params['message'];
            }

            $html .= "<br>" . "Link: " . $params['link'] . "<br>";

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

    public function store($params) {
        $contact = new ContactUs;
        if (isset($params['file'])) {
            $file = $params['file'];
            $fileName = time() . $this->generateRandomString() . "." . $file->extension();
//            $file->move(public_path("upload/viewer/contact_us"), $fileName);
            $params['file'] = $file->getClientOriginalName();
            $params['file_name'] = $fileName;
//            Storage::disk('s3')->put('avatars/1', file_get_contents($file));
            $file->storeAs('contact-us', $fileName, 's3');

        }
        $contact->fill($params);
        $contact->save();
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
