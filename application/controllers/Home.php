<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends EduAppGT
{
    /*
        Software: EduAppGT PRO - School Management System
        Author: GuateApps - Software, Web and Mobile developer.
        Author URI: https://guateapps.app.
        PHP: 5.6+
        Created: 27 September 16.
    */
    
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('user_agent');
        $this->load->library('session');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }
   
    public function index()
    {
      
		$data['page_name']		=	'home';
		$data['page_title']		=	getEduAppGTLang('home_page');
		$this->load->view('frontend/index' , $data);
    }
}