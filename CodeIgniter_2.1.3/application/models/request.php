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
            return sqrt(pow(($endLat - $startLat), 2) + pow(($endLong - $startLong), 2));
        }

        function getReqDeliveryId()
        {
            log_message("info", $id);
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $result = $db->query("SELECT dataValue FROM Users WHERE dataKey='deliveryId';");

            if(count($result) == 1)
                {
                    foreach ($result as $row)
                    {
                        $data = $row['dataValue'];
                    }

                    return $data;
                }

                return '';
        }

        function getReqShopEsl()
        {
            log_message("info", $id);
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $result = $db->query("SELECT dataValue FROM Users WHERE dataKey='fs_esl';");

            if(count($result) == 1)
                {
                    foreach ($result as $row)
                    {
                        $data = $row['dataValue'];
                    }

                    return $data;
                }

                return '';
        }

        function getReqDeliveryTime()
        {
            log_message("info", $id);
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $result = $db->query("SELECT dataValue FROM Users WHERE dataKey='deliveryTime';");

            if(count($result) == 1)
                {
                    foreach ($result as $row)
                    {
                        $data = $row['dataValue'];
                    }

                    return $data;
                }

                return '';
        }

        function getReqDeliveryAddr()
        {
            log_message("info", $id);
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $result = $db->query("SELECT dataValue FROM Users WHERE dataKey='deliveryAddr';");

            if(count($result) == 1)
                {
                    foreach ($result as $row)
                    {
                        $data = $row['dataValue'];
                    }

                    return $data;
                }

                return '';
        }

        function getReqPickupTime()
        {
            log_message("info", $id);
            $db = new PDO('sqlite:./application/db/deliveryDrivers');
            $result = $db->query("SELECT dataValue FROM Users WHERE dataKey='pickupTime';");

            if(count($result) == 1)
                {
                    foreach ($result as $row)
                    {
                        $data = $row['dataValue'];
                    }

                    return $data;
                }

                return '';
        }
}
?>