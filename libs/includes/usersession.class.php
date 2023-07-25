<?php


class usersession
{
    private $conn;
    public $id;
    public $data;
    public $uid;
    public $token;
    public static function authenticate($user, $pass)
    {
        $username = user::login($user, $pass);
        $user = new user($username);
        if($username) {
            $conn = database::getconnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0, 9999999) .$ip.$agent.time());
            $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)
            VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1')";
            if($conn->query($sql)) {
                session::set('session_token', $token);
                return $token;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function authorize($token)
    {
        $sess = new usersession($token);
    }

    public function __construct($token)
    {
        $this->conn = database::getconnection();
        $this->token = $token;
        $this->data= null;
        $sql = "SELECT * FROM `session` WHERE `token` = $token LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->id = $row['id'];
        } else {
            throw new Exception("Session is Invalid. ");
        }
    }

    public function getUser()
    {
        return new user($this->uid);
    }

    public function isValid()
    {

    }

    public function getIp()
    {

    }
    public function getUserAgent()
    {

    }
    public function deactivate()
    {

    }
}
