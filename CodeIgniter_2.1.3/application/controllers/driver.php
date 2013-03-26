<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Driver extends CI_Controller {

	function __construct()
 	{
		parent::__construct();
 	}

	function index()
	{
	}

        function listEsls()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('user');
            $data['esls'] = $this->user->getUserEsls($data['username']);

            $this->load->view('list_esls', $data);
        }

        function listBids()
        {
            //TODO
        }

        function foursquareAuth()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            $fields_str = "client_id=Y4XZ44AUGUG031Q0A0Y0LVYIJA2IFU4XMAYZ4QGTJIOSL2I3&return_type=code&redirect_uri=https://students.cs.byu.edu/~kdevenis/CS462-driver/drivers/CodeIgniter_2.1.3/index.php/driver/code";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://foursquare.com/oauth2/authenticate");
                curl_setopt($ch, CURLOPT_POST, 3);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_str);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_exec($ch);
                curl_close($ch);
        }

        function code()
        {
            $code = $_GET['code'];

            $fields_str = "client_id=Y4XZ44AUGUG031Q0A0Y0LVYIJA2IFU4XMAYZ4QGTJIOSL2I3&client_secret=4LVOFP5XYM3BBBXKLVY4OYTXZGC53ZNE41FB3F0KD0XXX0KF&grant_type=authorization_code&redirect_uri=https://students.cs.byu.edu/~kdevenis/CS462-driver/drivers/CodeIgniter_2.1.3/index.php/driver/token&code=" + $code;
            var_dump($fields_str);
            $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://foursquare.com/oauth2/access_token");
                curl_setopt($ch, CURLOPT_POST, 5);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_str);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                $result = curl_exec($ch);
                curl_close($ch);

                var_dump($result);
        }

        function token()
        {
            var_dump("token");
        }

        function updateLocation()
        {
        }

}

?>