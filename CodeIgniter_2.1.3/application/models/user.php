<?php

Class User extends CI_Model
{

	function login($username, $password)
	{
		$db = new PDO('sqlite:./application/db/deliveryDrivers');
		$result = $db->query("SELECT * FROM Users WHERE username='" . $username . "' AND password='" . $password . "' LIMIT 1;");


		if(count($result) == 1)
		{
		     return $result;
		}
		else
		{
		     return false;
		}
	}
        
        function getEsl($username)
        {
                $db = new PDO('sqlite:./application/db/deliveryDrivers');
                $result = $db->query("SELECT esl FROM Users WHERE username='" . $username . "' LIMIT 1;");
                
                if(count($result) == 1)
                {
                    foreach ($result as $row)
                    {
                        $esl = $row['esl'];
                    }
                    
                    return $esl;
                }
                
                return '';
        }
        
        function setEsl($username, $esl)
        {
                $db = new PDO('sqlite:./application/db/deliveryDrivers');
                $result = $db->query("UPDATE Users SET esl='" . $esl . "' WHERE username='" . $username . "';");
        }
     
        
        function register($username, $password, $name, $phone, $rate = "")
        {
                $db = new PDO('sqlite:./application/db/deliveryDrivers');
                $query = "INSERT INTO Users VALUES ('" . $username . "','" . $password . "','" . $name . "','" . $phone . "','" . $rate . "');";
                $result = $db->query($query);
        }
        
        function getALlEsls()
        {
                $db = new PDO('sqlite:./application/db/deliveryDrivers');
                $result = $db->query("SELECT esl FROM Users;");
                
                return $result;
        }

        function saveEsl($username = '', $esl = '')
        {
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $query = "INSERT INTO Esls (username, esl) VALUES ('" . $username . "','" . $esl . "');";
            $result = $db->query($query);
        }

        function getUserEsls($username = '')
        {
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $result = $db->query("SELECT esl FROM Esls WHERE username='".$username."';");

            return $result;
        }

        function getUserByEsl($uid = '')
        {
            $esl = site_url() . "rfq/" . $uid;
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $result = $db->query("SELECT username FROM Users WHERE esl='".$esl."' LIMIT 1;");

            if(count($result) == 1)
            {
                return $result[0]['username'];
            }
            else
            {
		return '';
            }
        }
}
?>