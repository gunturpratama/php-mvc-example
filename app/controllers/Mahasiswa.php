<?php


Class Mahasiswa extends Controller {

    public function index(){
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('common/header',$data);
        $this->view('mahasiswa/index',$data);
        $this->view('common/footer');
    }
    
    public function detail($id){
        $data['title'] = 'Detail Mahasiwa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiwaById($id);
        $this->view('common/header',$data);
        $this->view('mahasiswa/detail',$data);
        $this->view('common/footer');
    }

    public function tambah(){
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            # code...
            Flasher::setFlash('Berhasil','ditambahkan','success');
            header('location:'. BASEURL . '/mahasiswa');
            exit;
        } else {
            # code...
            Flasher::setFlash('Gagal','ditambahkan','danger');
            header('location:'. BASEURL . '/mahasiswa');
            exit;
        }
    }
    public function hapus($id){
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            # code...
            Flasher::setFlash('Berhasil','dihapus','success');
            header('location:'. BASEURL . '/mahasiswa');
            exit;
        } else {
            # code...
            Flasher::setFlash('Gagal','dihapus','danger');
            header('location:'. BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiwaById($_POST['id']));
    }

    public function ubah(){
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            # code...
            Flasher::setFlash('Berhasil','diubah','success');
            header('location:'. BASEURL . '/mahasiswa');
            exit;
        } else {
            # code...
            Flasher::setFlash('Gagal','diubah','danger');
            header('location:'. BASEURL . '/mahasiswa');
            exit;
        }
    }


    public function cari(){
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('common/header',$data);
        $this->view('mahasiswa/index',$data);
        $this->view('common/footer');
    }

}