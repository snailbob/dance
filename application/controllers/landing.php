<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}	
	
	/***************************
		landing_view
	***************************/
	public function index(){
		$genres = $this->master->getRecords('genres');
		$days_of_week = $this->common->days_of_week();

		$data = array(
			'genres'=>$genres,
			'days_of_week'=>$days_of_week,
			'view'=>'landing_view'
		);
		
		$this->load->view('includes/view', $data);
	}


	
	/***************************
		landing_view
	***************************/
	public function search(){
		$genres = $this->master->getRecords('genres');
		$days_of_week = $this->common->days_of_week();

		$data = array(
			'genres'=>$genres,
			'days_of_week'=>$days_of_week,
			'view'=>'table'
		);
		
		$this->load->view('includes/view', $data);
	
	}

	/***************************
		search_list
	***************************/
	public function search_list(){
		$home_location = $_POST['location'];
		$location_lat = $_POST['location_lat'];
		$location_long = $_POST['location_long'];
		$genres = $_POST['genres'];
		$dayweek = $_POST['dayweek'];
		$distance = 20;
		if(isset($_POST['distance'])){
			$distance = $_POST['distance'];
		}

		$the_loc = explode(' ', $home_location);
		$string_count = count($the_loc) - 1;
		$the_loc = $the_loc[$string_count];
		$this->db->like('location', $the_loc); 
		
		$spaces = $this->master->getRecords('classes', array(), '', array('id'=>'DESC'));
	
		$places = array();
		
		if(count($spaces) > 0){
			foreach($spaces as $t=>$space){
				
				$the_distance = $this->common->distanceCalculation($location_lat, $location_long, $space['lat'], $space['lng']);
				 $places[] = array(
					  "name"=>$space['genres'],
					  "geo_name"=>$space['location'],
//					  "seeker_name"=>$this->common_model->getname($space['seeker_id']),
//					  "seeker_id"=>$space['seeker_id'],
//					  "seeker_img"=>$this->common_model->get_avatar($space['seeker_id']),
//					  "id"=>$space['id'],
//					  "distance"=>$the_distance,
//					  "space_type"=>$space['space_type'],
//					  "access"=>$this->common_model->space_access($space['access']),
//					  "security"=>$this->common_model->space_security($space['security']),
//					  "size"=>$space['size'],
//					  "price"=>$space['price'].'/month',
//					  "image"=>$this->common_model->space_image($space['id']),
					  "geo"=>array(
						$space['lat'],
						$space['lng']
					  )
				 );
			}
		}
		
		$data = array(
			'status'=>'OK',
			'places'=>$places
		);
//		$data['access'] = $access;
//		$data['loc_search'] = $the_loc;
		
		echo json_encode($data);
	
	}


	/***************************
		welcome
	***************************/
	public function welcome(){
		$this->load->view('welcome_message');
	}
	
	
	
	/***************************
		get_genres
	***************************/
	public function get_genres(){
		
		$gn = $this->master->getRecords('genres');
		
		print_r($gn);
		return false;

		$this->load->view('front/table');
	}
	
	
	
	/***************************
		get_genres
	***************************/
	public function store_genres(){
		$gen = $_POST['genres'];
		
		foreach($gen as $g){
		//	$this->master->insertRecord('genres', array('name'=>$g));

		}
		
		echo json_encode($gen);
	}
}
