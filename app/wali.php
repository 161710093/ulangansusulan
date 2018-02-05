<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\wali;
class wali extends Model
{
    protected $table = 'wali';

    protected $fillable = array('nama', 'alamat' ,'id_mahasiswa');


    public function mahasiswa() {
		return $this->belongsTo('App\mahasiswa', 'id_mahasiswa');}



}
