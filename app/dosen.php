<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\dosen;

class dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = array('nama', 'nipd', 'alamat');


   public function mahasiswa()
    {
    	return $this->belongsToMany('App\mahasiswa', 'id_dosen');
    }


}
