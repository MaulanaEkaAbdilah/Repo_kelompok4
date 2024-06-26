<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';

    protected $useAutoIncrement = true;

    // Fields that can be set using mass assignment
    protected $allowedFields = ['nim', 'nama', 'tmplahir', 'tgllahir', 'jenkel'];
}
?>
