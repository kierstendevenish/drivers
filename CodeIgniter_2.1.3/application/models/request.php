<?php

Class Request extends CI_Model
{
        function create($shopAddr, $pickupTime, $deliveryAddr, $deliveryTime)
        {
                $db = new PDO('sqlite:./application/db/deliveryDrivers');
                $result = $db->query("INSERT INTO Requests (shopAddr, pickupTime, deliveryAddr, deliveryTime, delivered) VALUES ('" . $shopAddr . "','" . $pickupTime . "','" . $deliveryAddr . "','" . $deliveryTime . "',0);");
        }
        
        function allOpen()
        {
                $db = new PDO('sqlite:./application/db/deliveryDrivers');
                $result = $db->query("SELECT * FROM Requests WHERE delivered=0;");
                return $result;
        }

        function makeBid($username, $id, $fs_esl, $deliveryTime, $deliveryAddr, $pickupTime)
        {
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $result = $db->query("INSERT INTO Bids VALUES ('" . $username . "','" . $fs_esl . "','" . $id . "','" . $deliveryAddr . "','" . $deliveryTime . "','" . $pickupTime . "', 0, 0);");
        }

        function calcDistance($startLat, $startLong, $endLat, $endLong)
        {
            var_dump($startLat . "-" . $startLong);
            var_dump($endLat . "-" . $endLong);
            return sqrt(pow(($endLat - $startLat), 2) + pow(($endLong - $startLong), 2));
        }
}
?>