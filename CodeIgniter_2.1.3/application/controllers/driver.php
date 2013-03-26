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
            redirect('https://foursquare.com/oauth2/authenticate?client_id=Y4XZ44AUGUG031Q0A0Y0LVYIJA2IFU4XMAYZ4QGTJIOSL2I3&response_type=code&redirect_uri=https://students.cs.byu.edu/~kdevenis/CS462-driver/drivers/CodeIgniter_2.1.3/index.php/driver/code');

            /*$fields_str = "client_id=Y4XZ44AUGUG031Q0A0Y0LVYIJA2IFU4XMAYZ4QGTJIOSL2I3&return_type=code&redirect_uri=https://students.cs.byu.edu/~kdevenis/CS462-driver/drivers/CodeIgniter_2.1.3/index.php/driver/code";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://foursquare.com/oauth2/authenticate");
                curl_setopt($ch, CURLOPT_POST, 3);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_str);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_exec($ch);
                curl_close($ch);*/
        }

        function code()
        {
            $code = $_GET['code'];

            /*$fields_str = "client_id=Y4XZ44AUGUG031Q0A0Y0LVYIJA2IFU4XMAYZ4QGTJIOSL2I3&client_secret=4LVOFP5XYM3BBBXKLVY4OYTXZGC53ZNE41FB3F0KD0XXX0KF&grant_type=authorization_code&redirect_uri=https://students.cs.byu.edu/~kdevenis/CS462-driver/drivers/CodeIgniter_2.1.3/index.php/driver/token&code=".$code;
            $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://foursquare.com/oauth2/access_token");
                curl_setopt($ch, CURLOPT_POST, 5);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_str);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($ch, CURLOP_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);

                $json = json_decode($result, true);
                $token = $json['access_token'];
                var_dump($result);*/
                $url = "https://foursquare.com/oauth2/access_token?client_id=Y4XZ44AUGUG031Q0A0Y0LVYIJA2IFU4XMAYZ4QGTJIOSL2I3&client_secret=4LVOFP5XYM3BBBXKLVY4OYTXZGC53ZNE41FB3F0KD0XXX0KF&grant_type=authorization_code&redirect_uri=https://students.cs.byu.edu/~kdevenis/CS462-driver/drivers/CodeIgniter_2.1.3/index.php/driver/token&code=".$code;
                $json = file_get_contents($url);
                $result = json_decode($json, true);
                $token = $result['access_token'];

                $this->load->model('user');
                $session_data = $this->session->userdata('logged_in');
                $username = $session_data['username'];
                $this->user->saveFoursquareToken($username, $token);

                $this->load->view('foursquare_success');
        }

        function token()
        {
            $this->load->view('foursquare_success');
        }

        function updateLocation()
        {
            $checkin = $this->input->post('checkin');
            log_message("info", 'got checkin');
        }

}

?>