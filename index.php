view MYFORM.php

<html>
<head><title> Login </title></head>

<body>
<center>
<div style="border:1px slid green;width:400px;height:auto;margin-top:100px;">

<?php echo form_open('login');?>
<h5> username</h5>
<?php eecho form_error('username');?>
<input type="text" name="username" value="<?php echo set_value('username');?>">
<h5> password</h5>
<?php eecho form_error('password');?>
<input type="password" name="password" value="<?php echo set_value('password');?>">
<input type="submit" name="submit" value="submit">
<?php echo form_close();?>

</div>
</center>
</body>

</html>

CONTROLLER LOGIN.PHP

<?php
public class login extends CI_controller{

public function __construct(){

parent::construct();
}
public function index(){

$this->validation();

}
function validation(){

$this->load->helper(array('form','url'));
$this->load->library('form_validation');
$this->form_validation->set_rules('username','Username',trim|required|callback_valid_credential|xss_clean);
$this->form_validation->set_rules('password','Password',trim|required|xss_clean);
if($this->form_validation->run()== FALSE){

$this->load->view('myform');
}else{
if(is_logged_in == 1){
$this->load->view('member');
}
else{
redirect(login/restricted);

}
}
}
function valid_credential(){
$this->load->model('model_user');
if($this->model_user->is_login_in()){
$data=array(
'username'=>'$this->post->username'.
'is_logged_in'=> 1
);
return true;
}else{
$this->form_validation->set_rules('valid_credential','Incorrect Username/Password');
return false;

}

}
function logout(){

$this->session->sess_destroy();
redirect('login');
}

}
?>

user_model.php

<?php 

class user_model extends CI_Models{

function is_log_in(){

$this->db->where('username','$this->post->username('username')');
$this->db->where('password','$this->post->username('password')');
$query=$this->db->get('user');
if($query->num_row == 1){
return true;
}else{
return false;

}

}



}





?>







