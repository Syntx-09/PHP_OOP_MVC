<?php


class Home extends Controller
{

	public function index()
	{
		$data['username'] = isset($_SESSION['user']) ? $_SESSION['user']->name : 'Anon';
		
		$this->view('home', $data);
		
	}

	public function edit() {
		$this->view('home');
		echo "this is edit function";
	}

	public function move() {
		echo "this is the move arean";
		$this->view('home');
	}
}



