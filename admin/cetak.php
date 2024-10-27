<!DOCTYPE html>
<html>
<body>
<style type="text/css">
	
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }
    .tengah{
        text-align: center;
    }
 </style>

	<center>
		<h2>LAPORAN AGENDA KADIS</h2>
	</center>
 
 <br>
            
	<?php 
	include "../koneksi.php"
	?>
 
	<table>
		<tr>
			<th width="2%">No</th>
			<th>Hari</th>
			<th>Judul</th>
			<th>Keterangan</th>
			<th>Lokasi</th>
			<th>Waktu</th>
		</tr>


		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from agenda");
		while($data = mysqli_fetch_array($sql)){ 		/* Code Untuk Menampilkan format database*/

		/* Code untuk print Excel
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Agenda Kadis.xls");
		*/
		?> 

		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['hari']; ?></td>
			<td><?php echo $data['judul']; ?></td>
			<td><?php echo $data['keterangan']; ?></td>
			<td><?php echo $data['lokasi']; ?></td>
			<td><?php echo $data['waktu']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>








