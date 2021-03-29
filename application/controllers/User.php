<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  function __construct() {
    parent::__construct();

    $this->load->model('User_model', 'user');
    $this->load->library(array('form_validation', 'session'));
  }

  public function Login(){
    $this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|valid_email|trim');
    $this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]|trim');

    if($this->form_validation->run() == FALSE) {
      $data['error'] = validation_errors();
    } else {
      $dataLogin = $this->input->post();
      $res = $this->user->Login($dataLogin);

      if($res) {
        foreach($res as $result){
          if(password_verify($dataLogin['password'], $result->password)){
            $data['error'] = null;
            $this->session->set_userdata('logged', TRUE);
            $this->session->set_userdata('email', $result->email);
            $this->session->set_userdata('id', $result->id);
            
            redirect();
          } else {
            $data['error'] = 'Senha incorreta';
          }
        }
      } else {
        $data['error'] = 'Usuário não cadastrado';
      }
    }

    $this->load->view('login', $data);
  }

  public function Logout() {
    $this->session->unset_userdata('logged');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('id');

    redirect();
  }

  public function Register(){
    $this->form_validation->set_rules('name', 'Nome', 'required|min_length[3]|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|valid_email|trim');
    $this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]|trim');

    if($this->form_validation->run() == FALSE){
      $data['error'] =validation_errors();
    } else {
      $dataRegister = $this->input->post();
      $res = $this->user->Save($dataRegister);
      
      if($res){
        $data['error'] = null;
      } else {
        $data['error'] = 'Não foi possivel criar o usuário';
      }
    }

    if($data['error'])
      $this->load->view('login', $data);
    else{
      $this->session->set_userdata('logged', true);
      $this->session->set_userdata('email', $res->email);
      $this->session->set_userdata('id', $res->id);

      redirect();
    }
  }

  public function UpdatePassword(){
    $data['success'] = null;
    $data['error'] = null;

    $this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]|trim');

    if($this->form_validation->run() == FALSE){
      $data['error'] = validation_errors();
    } else {
      $data = $this->input->post();
      $this->user->update($data);
      $data['success'] = 'Senha alterada com sucesso';
      $data['error'] = null;
    }

    $data['user'] = $this->user->GetUser($this->session->userdata('id'));
    $this->load->view('change-pass', $data);
  }

  public function URLs() {
    $this->load->model('Urls_model', 'url');
    $urls = $this->url->GetAllByUser($this->session->userdata('id'));

    $data['urls'] = $urls;
    $data['error'] = null;
    $data['short_url'] = false;

    $this->load->view('my-urls', $data);

  }
}