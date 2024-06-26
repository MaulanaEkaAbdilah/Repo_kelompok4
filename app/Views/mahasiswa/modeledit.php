<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Mahasiswa/updatedata', ['class' => 'formmahasiswa']) ?>
            <?= csrf_field();?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control is-valid" id="id_mahasiswa" name="id_mahasiswa" placeholder="Masukan NIM" value="<?=$id_mahasiswa?>" readonly>
                        <input type="text" class="form-control is-valid" id="nim" name="nim" placeholder="Masukan NIM" value="<?=$nim?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control is-valid" id="nama" name="nama" placeholder="Masukan Nama" value="<?=$nama?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tmptlahir" class="col-sm-2 col-form-label">Tempat & tanggal lahir</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control is-valid" id="tmptlahir" name="tmptlahir" placeholder="Masukan Tempat Lahir" value="<?=$tmplahir?>" >
                        <div class="invalid-feedback errortmptlahir"></div>
                    </div>
                    <div class="col-sm-5">
                        <input type="date" class="form-control is-valid" id="tgllahir" name="tgllahir" value="<?=$tgllahir?>" >
                        <div class="invalid-feedback errortgllahir"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jenkel" id="jenkel" class="form-control is-valid">
                            <option value="">------Silahkan Pilih------</option>
                            <option value="Laki-Laki" <?php if($jenkel == 'Laki-Laki')echo "selected";?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if($jenkel == 'Perempuan')echo "selected";?>>Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.formmahasiswa').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function(){
                    $('.btnsimpan').attr('disabled', 'disabled');
                    $('.btnsimpan').html('<i class="bi bi-arrow-repeat"></i>');
                },
                complete: function(){
                    $('.btnsimpan').removeAttr('disabled');
                    $('.btnsimpan').html('Update');
                },
                success: function(response){
                        // jika tidak ada error, modal akan ditutup
                        //jika valid
                        //alert(response.sukses)
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.sukses,
                        });
                        //tutup model edit
                        $('#modaledit').modal('hide');
                        // panggil fungsi data mahasiswa yang berada pada view tampil data
                        datamahasiswa();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>
