<div class="container">


        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Warung List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('warung/warung/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
            		    <th>Nama Lokasi</th>
            		    <th>Tipe</th>
            		    <th>Jam Buka</th>
            		    <th>Jam Tutup</th>
            		    <th>Latitude</th>
            		    <th>Longitude</th>
            		    <th>ID User</th>
            		    <th>rate</th>
            		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($warung_data as $warung)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $warung->nama_lokasi ?></td>
		    <td><?php echo $warung->id_tipe ?></td>
		    <td><?php echo $warung->jam_buka ?></td>
		    <td><?php echo $warung->jam_tutup ?></td>
		    <td><?php echo $warung->latitude ?></td>
		    <td><?php echo $warung->longitude ?></td>
		    <td><?php echo $warung->id_user ?></td>
		    <td><?php echo $warung->rate ?></td>
		    <td style="text-align:center">
			<?php
			//echo anchor(site_url('warung/read/'.$warung->id),'Read');
		//	echo ' | ';
			echo anchor(site_url('warung/warung/update/'.$warung->id),'Update');
			echo ' | ';
			echo anchor(site_url('warung/warung/delete/'.$warung->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
      </div>
