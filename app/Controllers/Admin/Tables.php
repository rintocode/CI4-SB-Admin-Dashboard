<?php

namespace App\Controllers\Admin;
use App\Libraries\DataTables;
use App\Controllers\BaseController;

class Tables extends BaseController
{
    protected $DataTables;
    public function __construct()
    {
        $this->DataTables = new DataTables();
    }

    public function index()
    {
        return view('admin/tables');
    }


    public function data_sample()
    {
        // sql query
        $query = "SELECT kategori.nama_kategori AS nama_kategori, subkat.* FROM subkat 
                  JOIN kategori ON subkat.id_kategori = kategori.id_kategori";
        // $where  = array('nama_kategori' => 'Tutorial');
        $where  = null; 
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        $search = array('nama_kategori','subkat','tgl_add');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
}
