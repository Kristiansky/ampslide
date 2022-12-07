<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Ticket as TicketModel;
	
class Ticket extends BaseController
{
	protected $helpers = ['form'];
	
	// show tickets list
	public function index(){
		$ticketModel = new TicketModel();
		$data['tickets'] = $ticketModel->orderBy('id', 'DESC')->findAll();
		return view('tickets/index', $data);
	}
	
	// add ticket form
	public function create(){
		return view('tickets/add');
	}
	
	// insert data
	public function store() {
		$ticketModel = new TicketModel();
		$data = [
			'title' => $this->request->getVar('title'),
			'content'  => $this->request->getVar('content'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		];
		
		$rules = [
			'title' => 'required|min_length[2]',
			'content' => 'required|min_length[10]',
		];
		
		if (!$this->validate($rules)) {
			return view('tickets/add', [
				'validation' => $this->validator,
			]);
		}
		
		$ticketModel->insert($data);
		return $this->response->redirect(site_url('/tickets-list'));
	}
	
	// show single ticket
	public function singleTicket($id = null){
		$ticketModel = new TicketModel();
		$data['ticket_obj'] = $ticketModel->where('id', $id)->first();
		return view('tickets/edit', $data);
	}
	
	// update ticket data
	public function update(){
		$ticketModel = new TicketModel();
		$id = $this->request->getVar('id');
		$data = [
			'title' => $this->request->getVar('title'),
			'content'  => $this->request->getVar('content'),
			'updated_at' => date('Y-m-d H:i:s'),
		];
		
		$rules = [
			'title' => 'required|min_length[2]',
			'content' => 'required|min_length[10]',
		];
		
		if (!$this->validate($rules)) {
			return view('tickets/edit', [
				'validation' => $this->validator,
				'ticket_obj' => $ticketModel->where('id', $id)->first()
			]);
		}
		
		$ticketModel->update($id, $data);
		return $this->response->redirect(site_url('/tickets-list'));
	}
	
	// delete ticket
	public function delete($id = null){
		$ticketModel = new TicketModel();
		$data['ticket'] = $ticketModel->where('id', $id)->delete($id);
		return $this->response->redirect(site_url('/tickets-list'));
	}
}
