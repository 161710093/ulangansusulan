<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\jurusan;
use App\dosen;
use App\mahasiswa;
use App\matkulsiswa;
use App\wali;

class mahasiswa extends Model
{
     protected $table = 'mahasiswa';
     protected $fillable = array('nama', 'nis', 'id_dosen', 'id_jurusan');

public function wali() {
		return $this->hasOne('App\wali', 'id_mahasiswa');
	}
	public function dosen() {
		return $this->belongsTo('App\dosen', 'id_dosen');
	}
	
	public function matkul() {
		return $this->belongsToMany('App\mahasiswa', 'matkulsiswa', 'id_mahasiswa', 'id_mapel');
	}
}

?>