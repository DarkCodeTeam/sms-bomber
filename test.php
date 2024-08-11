<?php

class SmsSender
{
    private $phone;

    public function __construct($phone)
    {
        if (preg_match("/^([0][9][0-9]{9})$/", $phone)) {
            $this->phone = $phone;
        } else {
            header("Location:index.php?number=0");
            exit();
        }
    }

    public function sendAll()
    {
        $this->sendDivar();
        $this->sendNobatir();
        
        header("Location:index.php?ok=true");
    }

    private function sendDivar()
    {
        $url = 'https://api.divar.ir/v5/auth/authenticate';
        $phone_value = '{"phone":"' . $this->phone . '"}';
        $this->sendCurlSms($url, $phone_value);
    }

    private function sendNobatir()
    {
        $url = 'https://nobat.ir/api/public/patient/login/phone';
        $phone_value = "------WebKitFormBoundary5wscOwxMqnICoiZY\r\nContent-Disposition: form-data; name=\"mobile\"\r\n\r\n" . $this->phone . "\r\n------WebKitFormBoundary5wscOwxMqnICoiZY--\r\n";
        $header = 'content-type: multipart/form-data; boundary=----WebKitFormBoundary5wscOwxMqnICoiZY';
        $this->sendCurlSms($url, $phone_value, $header);
    }


    private function sendCurlSms($url, $phone_value, $header1 = NULL, $header2 = NULL)
    {
        date_default_timezone_set("Asia/Tehran");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        if ($header1 != NULL) {
            if ($header2 != NULL) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    $header1, $header2
                ]);
            } else {
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    $header1
                ]);
            }
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $phone_value);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        file_put_contents('log_sms.txt', '[' . date("Y-m-d h:i:sa") . '--URL=' . $url . ']' . $response . "\n\n", FILE_APPEND);
        curl_close($ch);
        sleep(2);
    }
}
