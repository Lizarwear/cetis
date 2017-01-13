<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user');
 }

 function index()
 {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $resultado = $this->user->login($username,$password);

    if(! empty($resultado)){
        $this->load->view('home_view_inicio');

    }else{
      ?>
      <script type="text/javascript">
        alert("El usuario o contraseña son incorrectos, intente otra vez");
      </script>
      <?php
      redirect('/..','refresh');
    }
     //Go to private area
     //redirect('home', 'refresh');
   //}

 }
}
?>