<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\jurusan;

class jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = array('nama_jurusan');

    public function mahasiswa()
    {
    	return $this->belongsTo('App\mahasiswa', 'id_jurusan');
    }



}
