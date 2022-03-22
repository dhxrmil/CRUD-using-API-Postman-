<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->model('Apimodel');	
	}

	public function index()
	{
		echo "hello";
	}

	public function insert()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');

		if($name != '' && $email != '')
		{
			$this->Apimodel->insert($name, $email);
			$result = (array('success' => true, 'message' => 'Data Inserted'));
		}
		else
		{
			$result = (array('error' => false, 'message' => 'Not Inserted!'));
		}
		
		//echo "<pre>"; print_r($result); exit;
		echo json_encode($result);
	}

	public function update($id)
	{		
		$name = $this->input->post('name');
		$email = $this->input->post('email');

		if($name != '' && $email != '')
		{
			$usr = $this->Apimodel->update($id, $name, $email);
			$abc = $this->Apimodel->edit($id);
			if($usr)
			{
				$result = (array('success' => true, 'message' => 'Data Updated', 'data' => $abc));
			}
			else
			{
				$result = (array('success' => true, 'message' => 'Data Updated', 'data' => []));
			}

		}
		else
		{
			$result = (array('error' => false, 'message' => 'Not Updated!'));
		}
		
		 echo json_encode($result);
	}

	function delete($id)
	{
		$this->Apimodel->deleterecords($id); 
		//echo  json_encode($data);
	}
}

