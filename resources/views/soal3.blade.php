<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@foreach($jurusan as $naon)
	nama jurusan : {{$naon->nama_jurusan}}
	nama siswa : {{$naon->mahasiswa->nama}}
@endforeach 
</body>
</html>