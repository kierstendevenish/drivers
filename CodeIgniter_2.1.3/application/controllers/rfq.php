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
                $deliveryAddr = $this->input->post('deliveryAddr');
                $deliveryTime = $this->input->post('deliveryTime');
                $pickupTime = $this->input->post('pickupTime');
                $shopCoords = $this->input->post('shopCoords');
                $shopCoordsArr = split(',', $shopCoords);
                $latitude = $shopCoords[0];
                $longitude = $shopCoords[1];
                $shopName = $this->input->post('shopName');
                $shopEsl = $this->input->post('shopEsl');
                //text driver with bid details
            //else
                //text driver with delivery request
	}

        function makeBid($fs_esl = '', $deliveryTime = '')
        {
            
        }

?>