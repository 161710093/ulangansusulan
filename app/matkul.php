<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\matkul;

class matkul extends Model
{
    protected $table = 'matkul';

    protected $fillable = array('nama_maktul', 'kkm');


    public function mahasiswa()
    {
    	return $this->belongsToMany('App\mahasiswa', 'matkulsiswa', 'id_mahasiswa', 'id_mapel');
    }

    


}
