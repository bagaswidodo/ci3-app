Pilih Siswa :
<select name="id_desa" id="id_desa">
    <?php
	if(count($siswa->result_array())>0)
	{
		echo "<option>- Pilih Nama Siswa -</option>";
		foreach($siswa->result_array() as $k)
		{
			echo "<option value='".$k['id_siswa']."'>Kelas ".$k['nama_kelas']." - ".$k['nama_siswa']."</option>";
		}
	}
	else{
		echo "<option>- Data Belum Tersedia -</option>";
	}
    ?>
	</select>
