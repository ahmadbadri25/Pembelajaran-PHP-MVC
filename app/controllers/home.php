<?php 

class home extends controller {
    public function index(){
        $data['judul'] = 'home';
        $data['nama'] = $this->model('user_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('home/index',$data );
        $this->view('templates/footer');

    }
}


?>