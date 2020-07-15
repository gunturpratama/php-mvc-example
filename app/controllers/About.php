<?php

class About extends Controller {
    public function index($nama = 'Guntur',$pekerjaan = 'murid',$umur = 24){
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;

        $data['title'] = 'About';
        $this->view('common/header',$data);
        $this->view('about/index', $data);
        $this->view('common/footer');
    }
    public function page(){
        $data['title'] = 'Page';
        $this->view('common/header',$data);
        $this->view('about/page');
        $this->view('common/footer');
    }
}