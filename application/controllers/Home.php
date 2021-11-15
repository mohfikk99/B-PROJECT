<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
  }


  public function index()
  {

    $this->load->view('Home/login');

  }

  public function proses_login()
  {


                //set form validation
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $nama = $this->input->post("nama", TRUE);
                $password = md5($this->input->post('password'));

                //checking data via model
                $checking = $this->Login_model->check_login('petugas', array('nama' => $nama), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(

                            'nama' => $apps->nama,
                            'user_pass' => $apps->password,
                            'level'      => $apps->level
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("level") == "petugas"){
                            redirect('petugas');
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> MAAF</b> username atau password salah!</div></div>';
                    $this->load->view('home/login', $data);
                }

            }else{

                $this->load->view('home/login');
            }




  }


  public function logout()
  {
    $this->load->view('home/login');

  }











}

  /* End of file Home.php */
