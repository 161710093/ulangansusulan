<?php

use Illuminate\Database\Seeder;
use App\jurusan;
use App\dosen;
use App\mahasiswa;
use App\matkul;
use App\wali;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      	DB::table('dosen')->delete();
		DB::table('jurusan')->delete();
		DB::table('mahasiswa')->delete();
		DB::table('wali')->delete();
		DB::table('matkul')->delete();
		DB::table('matkulsiswa')->delete();


		$dosen = dosen::create(array(
			'nama' => 'Dede Koswara',
			'nipd' => '1029384756',
			'alamat' => 'London Eye'));

		$this->command->info('Data dosen telah diisi!');


			$jurusan = jurusan::create(array(
			'nama_jurusan' => 'Multimedia'));
			
		$this->command->info('Data jurusan telah diisi!');

		
		# Mahasiswa Kedua bernama annisa. Dengan NIM 27022002.
		$an = mahasiswa::create(array(
			'nama' => 'Annisa Hafitria',
			'nis'  => '27022002',
			'id_dosen' => $dosen->id,
			'id_jurusan' => $jurusan->id));

		# Mahasiswa Kedua bernama nisa. Dengan NIM 10122018.
		$ni = mahasiswa::create(array(
			'nama' => 'Nisa Fitria',
			'nis'  => '10122017',
			'id_dosen' => $dosen->id,
			'id_jurusan' => $jurusan->id));

		# Mahasiswa Ketiga bernama Puji Rahayu. Dengan NIM 1015015078.
		$ayu = mahasiswa::create(array(
			'nama' => 'Puji Rahayu',
			'nis'  => '1015015078',
			'id_dosen' => $dosen->id,
			'id_jurusan' => $jurusan->id));

		# Informasi ketika mahasiswa telah diisi.
		$this->command->info('Mahasiswa telah diisi!');


		wali::create(array(
			'nama'  => 'Achmad S',
			'alamat'  => 'bobojong',
			'id_mahasiswa' => $an->id
		));
		# Ciptakan wali si $dije
		wali::create(array(
			'nama'  => 'Entahlah',
			'alamat'  => 'cibiuk',

			'id_mahasiswa' => $ni->id
		));
		# Ciptakan wali si $ayu
		wali::create(array(
			'nama'  => 'Bodo Amat',
			'alamat'  => 'Sukaluyu',
			'id_mahasiswa' => $ayu->id
		));

		# Informasi ketika semua wali telah diisi.
		$this->command->info('Data mahasiswa dan wali telah diisi!');

			

		$Ind = matkul::create(array('nama_matkul' => 'Indonesia', 'kkm' => '78'));
		$Ing = matkul::create(array('nama_matkul' => 'Inggris',  'kkm' => '76'));

		# Hubungkan Mahasiswa dengan Hobinya masing-masing
		$an->matkul()->attach($Ind->id);
		$an->matkul()->attach($Ing->id);
		$ni->matkul()->attach($Ind->id);
		$ayu->matkul()->attach($Ing->id);

		# Tampilkan pesan ini bila berhasil diisi
		$this->command->info('Mahasiswa beserta Matkul telah diisi!');



    }
}
