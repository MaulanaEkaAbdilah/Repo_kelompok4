<?php

namespace App\Controllers;

use App\Models\Modelmahasiswa;

class Mahasiswa extends BaseController
{
    public function index()
    {
        return view('Mahasiswa/v_Tampildata');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()){
            $mhs = new Modelmahasiswa();
            $data = [
                'tampildata' => $mhs->findAll()
            ];
            $msg = [
                'data' => view('Mahasiswa/datamahasiswa', $data) // Tambahkan $ sebelum data
            ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat diproses');
        }
    }

    public function formtambah()
    {
        if($this->request->isAJAX()){
            $msg = [
                'data' => view('Mahasiswa/modeltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat diproses');
        }
    }

    public function simpandata()
{
    if ($this->request->isAJAX()) {
        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Tidak boleh ada yang sama, silahkan coba yang lain',
                ]
            ],
            'nama' => [
                'label' => 'NAMA',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tmptlahir' => [
                'label' => 'Tempat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tgllahir' => [
                'label' => 'Tanggal lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jenkel' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ]);

        if (!$valid) {
            $msg = [
                'error' => [
                    'nim' => $validation->getError('nim'),
                    'nama' => $validation->getError('nama'),
                    'tmptlahir' => $validation->getError('tmptlahir'),
                    'tgllahir' => $validation->getError('tgllahir'),
                    'jenkel' => $validation->getError('jenkel'),
                ]
            ];
            echo json_encode($msg);
        } else {
            // jika benar/valid
            $simpandata =[
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'tmplahir' => $this->request->getPost('tmptlahir'),
                'tgllahir' => $this->request->getPost('tgllahir'),
                'jenkel' => $this->request->getPost('jenkel'),
            ];
            $mhs = new ModelMahasiswa;
            $mhs ->insert($simpandata);
            
            $msg = [
                'success' => 'Data mahasiswa berhasil disimpan'
            ];
            echo json_encode($msg);
        }
    } else {
        exit('Maaf tidak dapat diproses');
    }
}
public function formedit()
{
    if($this->request->isAJAX()){
        $id_mahasiswa = $this->request->getVar('id_mahasiswa');

        $mhs =new ModelMahasiswa;
        $row = $mhs->find($id_mahasiswa);
        $data =[
            //sebelah kanan filed pada tabel mahasiswa
            'id_mahasiswa' => $row['id_mahasiswa'],
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'tmplahir' => $row['tmplahir'],
            'tgllahir' => $row['tgllahir'],
            'jenkel' => $row['jenkel'],
        ];
        $msg =[
            'sukses' => view('Mahasiswa/modaledit', $data)
        ];
        echo json_encode($msg);
    }
}

public function updatedata()
{
    if($this->request->isAJAX()){
        //jika benar/valid
        $simpandata = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'tmplahir' => $this->request->getPost('tmptlahir'),
            'tgllahir' => $this->request->getPost('tgllahir'),
            'jenkel' => $this->request->getPost('jenkel'),
        ];
        $mhs = new ModelMahasiswa;
        $id_mahasiswa = $this->request->getVar('id_mahasiswa');
        $mhs->update($id_mahasiswa, $simpandata);

        $msg =[
            'sukses' => 'Data Mahasiswa Berhasil di Update !!!'
        ];
        echo json_encode($msg);
    }else{
        exit('maaf tidak dapat diproses');
    }
}
public function hapus()
{
    if($this->request->isAJAX()){
        $id_mahasiswa = $this->request->getVar('id_mahasiswa');
        $mhs = new ModelMahasiswa;

        $mhs->delete($id_mahasiswa);

        $msg=[
            'sukses' => "Mahasiswa Berhasil Di Hapus !!!"
        ];
        echo json_encode($msg);
    }
}    
}
?>
