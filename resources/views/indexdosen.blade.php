<h2>Tampil data</h2>

<?php
$model=new App\Models\Dosen;

echo "<pre>";
$data=$model->all();
foreach($data as $isi) {
    echo "NIDN : ".$isi->nidn."<br />";
    echo "Nama : ".$isi->nama."<br/>";
    echo "Alamat : ".$isi->alamat."<br/>";
    echo "Jurusan : ".$isi->jurusan."<br/>";
    echo  "<hr/>";

}
?>