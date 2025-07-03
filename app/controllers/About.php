<?php

    class About extends Controller{
        public function index($param1 = 'Nilai default', $param2 = 'Nilai default', $param3 = 'Nilai default')
        {
            //echo 'About/index';
            //echo "ini adalah paramter pertama $param1 dan ini adalah parameter ke dua $param2";
            $data['param1'] = $param1;
            $data['param2'] = $param2;
            $data['param3'] = $param3;
            $data['judul_halaman'] = 'About Index';
            $this->view('templates/header', $data);
            $this->view('about/index', $data);
            $this->view('templates/footer');
        }

        public function page()
        {
            //echo 'About/page';
            $data['judul_halaman'] = 'About Page';
            $this->view('templates/header', $data);
            $this->view('about/page');
            $this->view('templates/footer');
        }
    }