//Jika document ready
$(function() {

    
    $('.tampilModalTambah').on('click', function() {
        
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Simpan Penambahan');
    });
    
    $('.tampilModalUbah').on('click', function() {

        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Simpan Ubahan');
        $('.modal-body form').attr('action', 'http://localhost/mvc/public/mahasiswa/ubah');
        const id = $(this).data('id');

        $.ajax({
            url:'http://localhost/mvc/public/mahasiswa/getubah',
            data:{id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                $('#txtnama').val(data.nama);
                $('#txtnim').val(data.nim);
                $('#txtemail').val(data.email);
                $('#cbjurusan').val(data.jurusan);
                $('#txtid').val(data.id);
            }
        });
    });

  
})