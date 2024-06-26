<?= $this->extend('Layout/v_main')?>
<?= $this->Section('menu')?>
<li class="has-submenu">
    <a href="<?= site_url('Layout/index')?>"><i class="mdi mdi-airplay"></i>Beranda</a>
</li>
<li class="has-submenu">
    <a href="<?= site_url('Layout/index')?>">Mahasiswa</a>
</li>
<?= $this->endSection()?>