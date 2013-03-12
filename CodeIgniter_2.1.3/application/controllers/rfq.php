<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rfq extends CI_Controller {

	function __construct()
 	{
		parent::__construct();
 	}

	function index($uid = '')
	{
            //get user with uid
            $this->load->model('user');
            $user = $this->user->getUserByEsl($uid);

            //get n miles and location from event body
            //if within n miles
                //submit bid to flower shop
                //text driver with bid details
            //else
                //text driver with delivery request
	}

?>