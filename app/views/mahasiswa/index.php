<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#formModal">
                Tambah
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari...?(Nama/NIM/JURUSAN)" name="txtkeyword" id="txtkeyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>

                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin?');">hapus</a>

                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal"data-target="#formModal" data-id="<?= $mhs['id']; ?>" >Ubah</a>
                        
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right ml-1">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Dipindahkan ke Bootstrap atas -->
            <?php //foreach($data['mhs'] as $mhs) : ?>
                <!--ul>
                    <li><?//= $mhs['nim']; ?></li>
                    <li><?//= $mhs['nama']; ?></li>
                    <li><?//= $mhs['email']; ?></li>
                    <li><?//= $mhs['jurusan']; ?></li>
                </ul-->
            <?php //endforeach; ?>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <input type="hidden" name="txtid" id="txtid">
            <div class="form-group">
                <label for="txtnama">Nama</label>
                <input type="text" class="form-control" id="txtnama" name="txtnama" placeholder="nama">
            </div>
            <div class="form-group">
                <label for="txtnim">NIM</label>
                <input type="number" class="form-control" id="txtnim" name="txtnim" placeholder="nim">
            </div>
            <div class="form-group">
                <label for="txtemail">email</label>
                <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="email">
            </div>
            <div class="form-group">
                <label for="cbjurusan">Jurusan</label>
                <select class="form-control" id="cbjurusan" name="cbjurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
                </select>
            </div>
      </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>