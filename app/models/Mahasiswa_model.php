<?php

    class Mahasiswa_model {
/*         private $mhs = [
            [
                "nama" => "Nama mahasiswa",
                "nim" => "Nim mahasiswa",
                "email"=> "Email mahasiswa",
                "jurusan"=> "Jurusan mahasiswa"
            ],
            [
                "nama" => "Nama mahasiswa 02",
                "nim" => "Nim mahasiswa 02",
                "email"=> "Email mahasiswa 02",
                "jurusan"=> "Jurusan mahasiswa 02"
            ],
            [
                "nama" => "Nama mahasiswa 03",
                "nim" => "Nim mahasiswa 03",
                "email"=> "Email mahasiswa 03",
                "jurusan"=> "Jurusan mahasiswa 03"
            ],
            ]; */

            /*
            //Dipindahkan ke core/Database.php
            //Database Handler
            private $dbh;
            private $stmt;

            public function __construct()
            {
                //Database Source Name
                $dsn = 'mysql:host=localhost;dbname=mvc';

                try {
                    $this->dbh = new PDO($dsn, 'root', '');
                } catch(PDOException $e) {
                    die($e->getMessage());
                } 
            } */

            private $table = 't_mahasiswa';
            private $db;

            public function __construct()
            {
                $this->db = new Database;
            }

            public function getAllMahasiswa()
            {
                /*
                $this->stmt = $this->dbh->prepare('select * from t_mahasiswa');
                $this->stmt->execute();
                //return $this->mhs;
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                */
                $this->db->query('SELECT * FROM ' . $this->table);
                return $this->db->resultSet();
            }
            public function getMahasiswaById($id)
            {
                $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
                $this->db->bind('id', $id);
                return $this->db->single();
            }

            public function tambahDataMahasiswa($data)
            {
                $query = "INSERT INTO t_mahasiswa
                          VALUES
                          ('', :nim, :nama, :email, :jurusan)
                ";
                $this->db->query($query);
                $this->db->bind('nama', $data['txtnama']);
                $this->db->bind('nim', $data['txtnim']);
                $this->db->bind('email', $data['txtemail']);
                $this->db->bind('jurusan', $data['cbjurusan']);

                $this->db->execute();

                return $this->db->rowCount();
            }

            public function hapusDataMahasiswa($id) 
            {
                $query = 'DELETE FROM t_mahasiswa WHERE id=:id';
                $this->db->query($query);
                $this->db->bind('id', $id);
                $this->db->execute();

                return $this->db->rowCount();
            }

            public function ubahDataMahasiswa($data)
            {
                $query = "UPDATE t_mahasiswa SET
                          nama = :nama,
                          nim = :nim,
                          email = :email,
                          jurusan = :jurusan
                          WHERE id = :id

                ";
                $this->db->query($query);
                $this->db->bind('nama', $data['txtnama']);
                $this->db->bind('nim', $data['txtnim']);
                $this->db->bind('email', $data['txtemail']);
                $this->db->bind('jurusan', $data['cbjurusan']);
                $this->db->bind('id', $data['txtid']);

                $this->db->execute();

                return $this->db->rowCount();
            }

            public function cariDataMahasiswa()
            {
                $keyword = $_POST['txtkeyword'];
                $query = "SELECT * FROM t_mahasiswa WHERE nama LIKE :keyword or nim LIKE :keyword or jurusan LIKE :keyword";
                $this->db->query($query);
                $this->db->bind('keyword', "%$keyword%");
                return $this->db->resultSet();

            }

    }