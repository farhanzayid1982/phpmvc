<?php

    class Home extends Controller{
        public function index()
        {
            //echo 'home/index';
            $data['judul_halaman'] = 'Home Index';
            $data['nama'] = $this->model('User_model')->getUser();
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }