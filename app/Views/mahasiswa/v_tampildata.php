<?= $this->extend('layout/v_main') ?>
<?= $this->extend('layout/v_menu') ?>
<?= $this->section('isi') ?>

<div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title">Data Mahasiswa</h4>
    </div>
</div>
    <div class="col-sm-12">
        <div class="card m-b-30">
            <div clasS="card-body">
                <div class="card-title">
                    <button type="button" class="btn btn-primary tomboltambah">
                        <i class="bi bi-plus-circle-fill"></i>Tambah Data
                    </button>
                </div>
                <p class="card-text viewdata">

                </p>
            </div>    
        </div>
    </div>
    <div class="viewmodal" style="display:none;"></div>
    <script>
        function datamahasiswa(){
            $.ajax({
                url: "<?= site_url('Mahasiswa/ambildata') ?>",
                dataType: "json",
                success: function(response){
                    $('.viewdata').html(response.data);
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
        $(document).ready(function(){
            datamahasiswa();
            $('.tomboltambah').click(function(e){
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url('Mahasiswa/formtambah')?>",
                    dataType:"json",
                    success: function(response){
                        $('.viewmodal').html(response.data).show();
                        $('#modaltambah').modal('show');
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" +xhr.responseText + "\n" + thrownError);
                    }
                });
            })
        });
    </script>
<?= $this->endSection() ?>
