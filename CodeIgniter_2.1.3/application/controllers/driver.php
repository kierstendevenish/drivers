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
            $esls = $this->user->getUserEsls();

            $this->load->view('list_esls');
        }

?>