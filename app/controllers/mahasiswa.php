<?php 

class mahasiswa extends controller {
    public function index(){
        $data['judul'] = 'daftar Mahasiswa';
        $data['mhs'] = $this->model('mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index',$data );
        $this->view('templates/footer');
    }

    public function detail($id){
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail',$data );
        $this->view('templates/footer');
    }

    public function tambah(){
        if ($this->model('mahasiswa_model')->tambahDataMahasiswa($_POST) > 0){
            flasher::setFlash('berhasil ', ' ditambahkan ', 'success');
            header('Location: ' . BASEURL .  '/mahasiswa');
            exit;
        }else {
            flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL .  '/mahasiswa');
            exit;
        }
    }
    public function hapus($id){
        if ($this->model('mahasiswa_model')->hapusDataMahasiswa($id) > 0){
            flasher::setFlash('berhasil ', ' dihapus ', 'success');
            header('Location: ' . BASEURL .  '/mahasiswa');
            exit;
        }else {
            flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL .  '/mahasiswa');
            exit;
        }
    }

    public function getubah(){
        if (isset($_POST['id'])) {
            header("Access-Control-Allow-Origin: http://localhost:8080");
            header("Access-Control-Allow-Methods: POST");
            header("Access-Control-Allow-Headers: Content-Type");
            echo json_encode($this->model('mahasiswa_model')->getMahasiswaById($_POST['id']));
        } else {
            echo "ID tidak ditemukan.";
        }
    }
    

    public function ubah(){
        if ($this->model('mahasiswa_model')->ubahDataMahasiswa($_POST) > 0){
            flasher::setFlash('berhasil ', ' diubah ', 'success');
            header('Location: ' . BASEURL .  '/mahasiswa');
            exit;
        }else {
            flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL .  '/mahasiswa');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'daftar Mahasiswa';
        $data['mhs'] = $this->model('mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index',$data );
        $this->view('templates/footer');
    }




    }


?>