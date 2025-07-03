<?php

    class Mahasiswa_model {
            private $table = 't_mahasiswa';
            private $db;

            public function __construct()
            {
                $this->db = new Database;
            }

            public function getAllMahasiswa()
            {
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