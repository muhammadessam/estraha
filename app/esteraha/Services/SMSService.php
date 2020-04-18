<?php namespace App\Esteraha\Services;

class SMSService
{

    protected $username = 'astraha';
    protected $password = 'azmvd33545';
    protected $senderName = 'estraha.sa';
    protected $domain = 'http://api-server3.com';

    public function prepareSendSMS($number, $msg)
    {
        $filter_number = preg_replace('/^'.preg_quote('05', '/').'/', '9665', $number, 1);
        \Log::info('Original number : ' . $number . " \n Filter number : " . $filter_number);
        return $this->send($this->username, $this->password, $filter_number, $msg, $this->senderName);
    }


    public function send($username, $password, $mobile, $message, $senderName)
    {
        $url = $this->domain."/api/send.aspx?username=".$username."&password=".$password."&mobile=".$mobile."&message=".$message."&sender=".$senderName.'&language=2';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $content = curl_exec($ch);
        $array  = explode(',', $content);
        return $array;
    }


    public function GetBalance($username,$password)
    {
        $url = $this->domain."/api/balance.aspx?username=".$username."&password=".$password;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $content = curl_exec($ch);
        return $content;
    }

}