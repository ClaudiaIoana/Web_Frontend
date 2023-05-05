<?php

class Destinations{
	public $id;
	public $location_name;
	public $country_name;
	public $description;
	public $tourist_targets;
	public $estimated_cost;

	function __construct($id, $location_name, $country_name, $description, $tourist_targets, $estimated_cost){
		$this->id = $id;
		$this->location_name = $location_name;
		$this->country_name = $country_name;
		$this->description = $description;
		$this->tourist_targets = $tourist_targets;
		$this->estimated_cost = $estimated_cost;
	}

	function get_id(){
		return $this->id;
	}

	function get_location_name(){
		return $this->location_name;
	}

	function get_country_name(){
		return $this->country_name;
	}

	function get_description(){
		return $this->description;
	}

	function get_tourist_targets(){
		return $this->tourist_targets;
	}

	function get_estimated_cost(){
		return $this->estimated_cost;
	}

	function set_id($new){
		$this->id = $new;
	}

	function set_location_name($new){
		$this->location_name = $new;
	}

	function set_country_name($new){
		$this->country_name = $new;
	}

	function set_description($new){
		$this->description = $new;
	}

	function set_tourist_targets($new){
		$this->tourist_targets = $new;
	}

	function set_estimated_cost($new){
		$this->estimated_cost = $new;
	}
}