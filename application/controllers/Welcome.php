<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('tentang_kami');
		$this->load->view('layout/footer');
	}
}
