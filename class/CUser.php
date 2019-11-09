<?php
class CUser{
    private $id;
    private $login;
    private $f_name;
    private $l_name;
    private $tooken;
    private $isAuth;
    private $DB;

    public function __construct($data_connection)
    {
        $this->DB = $data_connection;

            if(isset($_SESSION["AUTH"])){
                $this->id = $_SESSION["ID"];
                $this->login = $_SESSION["LOGIN"];
                $this->f_name = $_SESSION["F_NAME"];
                $this->l_name = $_SESSION["L_NAME"];
                $this->tooken = $_SESSION["TOOKEN"];
                $this->isAuth = true;
            }
            else{
               $this->isAuth = false;
            }
    }

    public function __destruct()
	{
		echo "CUser closed"."<br>";
	}

	public function Login($login, $password){
        if($this->isAuth)
            return false;
        $dbResult = $this->DB->query("SELECT * FROM `t_user` WHERE `LOGIN` LIKE '{$login}' AND 
                                                                            `PASSWORD` LIKE '{$password}'");
        if($item = $dbResult->fetch_assoc()){
            $User[] = $item;
        }
        else{
            return false;
        }

        $_SESSION["ID"] = $User[0]["ID"];
        $_SESSION["LOGIN"] = $User[0]["LOGIN"];
        $_SESSION["F_NAME"] = $User[0]["F_NAME"];
        $_SESSION["L_NAME"] = $User[0]["L_NAME"];
        $_SESSION["TOOKEN"] = $User[0]["TOOKEN"];
        $_SESSION["AUTH"] = 1;
        $this->isAuth = true;
    }

    public function Reg($userDataArray){
        if($this->isAuth)
            return false;
        $login = $userDataArray["LOGIN"];

        $dbResult = $this->DB->query("SELECT * FROM `t_user` WHERE `LOGIN` LIKE '{$login}'");
        if($item = $dbResult->fetch_assoc()){
           return false;
        }

        if(isset($userDataArray["TOOKEN"]))
            unset($userDataArray["TOOKEN"]);
        $userDataArray["TOOKEN"] = md5($userDataArray["LOGIN"]);

        $arFields = array();
        $arValues = array();
        foreach ($userDataArray as $key => $value){
            $arFields[] = "`".$key."`";
            $arValues[] = "'".$value."'";
        }

        $dbResult = $this->DB->query(
            "INSERT INTO `t_user`(".implode(', ',$arFields).") VALUES (".implode(", ",$arValues).")"
        );

        return $dbResult;
    }

    public function Logout(){
        if($this->isAuth){
            session_destroy();
            return true;
        }
        else{
            return false;
        }
    }

	public function isAuthorized()
	{
		return $this->isAuth;
	}

    public function GetID(){
		if($this->isAuth){
			return $this->id;
		}
	}
}