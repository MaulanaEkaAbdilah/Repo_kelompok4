<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Mahasiswa/simpandata', ['class' => 'formmahasiswa']) ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control is-valid" id="nim" name="nim" placeholder="Masukan NIM">
                        <div class="invalid-feedback errornim"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control is-valid" id="nama" name="nama" placeholder="Masukan Nama">
                        <div class="invalid-feedback errornama"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tmptlahir" class="col-sm-2 col-form-label">Tempat & tanggal lahir</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control is-valid" id="tmptlahir" name="tmptlahir" placeholder="Masukan Tempat Lahir">
                        <div class="invalid-feedback errortmptlahir"></div>
                    </div>
                    <div class="col-sm-5">
                        <input type="date" class="form-control is-valid" id="tgllahir" name="tgllahir">
                        <div class="invalid-feedback errortgllahir"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jenkel" id="jenkel" class="form-control is-valid">
                            <option value="">------Silahkan Pilih------</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback errorjenkel"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
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
                    $('.btnsimpan').html('Simpan');
                },
                success: function(response){
                    //validasi
                    if(response.error){
                        if(response.error.nim){
                            $('#nim').addClass('is-invalid');
                            $('.errornim').html(response.error.nim);
                        } else {
                            $('#nim').removeClass('is-invalid');
                            $('.errornim').html('');
                        }

                        if(response.error.nama){
                            $('#nama').addClass('is-invalid');
                            $('.errornama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errornama').html('');
                        }

                        if(response.error.tmptlahir){
                            $('#tmptlahir').addClass('is-invalid');
                            $('.errortmptlahir').html(response.error.tmptlahir);
                        } else {
                            $('#tmptlahir').removeClass('is-invalid');
                            $('.errortmptlahir').html('');
                        }

                        if(response.error.tgllahir){
                            $('#tgllahir').addClass('is-invalid');
                            $('.errortgllahir').html(response.error.tgllahir);
                        } else {
                            $('#tgllahir').removeClass('is-invalid');
                            $('.errortgllahir').html('');
                        }

                        if(response.error.jenkel){
                            $('#jenkel').addClass('is-invalid');
                            $('.errorjenkel').html(response.error.jenkel);
                        } else {
                            $('#jenkel').removeClass('is-invalid');
                            $('.errorjenkel').html('');
                        }
                    } else {
                        // jika tidak ada error, modal akan ditutup
                        //jika valid
                        //alert(response.sukses)
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.sukses,
                        });
                        //tutup model tambah
                        $('#modaltambah').modal('hide');
                        // panggil fungsi data mahasiswa yang berada pada view tampil data
                        datamahasiswa();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>
