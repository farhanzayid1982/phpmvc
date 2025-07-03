<?php

    class Mahasiswa extends Controller{
        public function index()
        {
            //echo 'mahasiswa/index';
            $data['judul_halaman'] = 'Mahasiswa Index';
            $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }

        public function detail($id)
        {
            //echo 'mahasiswa/index';
            $data['judul_halaman'] = 'Mahasiswa Detail';
            $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
            $this->view('templates/header', $data);
            $this->view('mahasiswa/detail', $data);
            $this->view('templates/footer');
        }

        public function tambah()
        {
            //var_dump($_POST);
            
            if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
                //Jika berhasil akan manampilkan flasher sukses
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                //Jika berhasil akan manampilkan flasher sukses
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function hapus($id)
        {
            //var_dump($_POST);
            
            if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
                //Jika berhasil akan manampilkan flasher sukses
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                //Jika berhasil akan manampilkan flasher sukses
                Flasher::setFlash('gagal', 'dihapus', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function getubah()
        {
            //echo $_POST['id'];
            echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
        }

        public function ubah()
        {
            if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
                //Jika berhasil akan manampilkan flasher sukses
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                //Jika berhasil akan manampilkan flasher sukses
                Flasher::setFlash('gagal', 'diubah', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function cari()
        {
            //echo 'mahasiswa/index';
            $data['judul_halaman'] = 'Mahasiswa Index';
            $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }
    }
