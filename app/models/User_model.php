<?php

class User_model {
    private $nama = 'Test Nama Hardcoded';

    public function getUser()
    {
        return $this->nama;
    }
}