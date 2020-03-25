<?php

class Mahasiswa extends Controller{
    public function index(){
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('tamplates/header', $data);
        $this->view('mahasiswa/index',$data);
        $this->view('tamplates/footer');
    }
    public function detail($id){
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('tamplates/header', $data);
        $this->view('mahasiswa/detail',$data);
        $this->view('tamplates/footer');
    }
    public function tambah(){
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ){
            Flasher::setFlash('Berhasil','Ditambahkan','success');
            header('Location: ' .BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','Ditambahkan','danger');
            header('Location: ' .BASEURL.'/mahasiswa');
            exit;
        }
    }
    public function hapus($id){
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ){
            Flasher::setFlash('Berhasil','Dihapus','success');
            header('Location: ' .BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','Dihapus','danger');
            header('Location: ' .BASEURL.'/mahasiswa');
            exit;
        }
    }
    public function getubah(){
          echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
    public function ubah(){
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ){
            Flasher::setFlash('Berhasil','DiUbah','success');
            header('Location: ' .BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','DiUbah','danger');
            header('Location: ' .BASEURL.'/mahasiswa');
            exit;
        }
    }
    public function cari(){
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('tamplates/header', $data);
        $this->view('mahasiswa/index',$data);
        $this->view('tamplates/footer');
    }
}