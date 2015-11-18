<div class="container">


        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Tipe Warung</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('warung/tipe/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
            		    <th>deskripsi</th>
            		    <th>Action</th>
                </tr>
            </thead>
	           <tbody>
            <?php
            $start = 0;
            foreach ($warung_tipe_data as $warung_tipe)
            {
                ?>
                <tr>
          		    <td><?php echo ++$start ?></td>
          		    <td><?php echo $warung_tipe->deskripsi ?></td>
          		    <td style="text-align:center">
            			<?php
            			//echo anchor(site_url('warung_tipe/read/'.$warung_tipe->id),'Read');
            			//echo ' | ';
            			echo anchor(site_url('warung/tipe/update/'.$warung_tipe->id),'Update');
            			echo ' | ';
            			echo anchor(site_url('warung/tipe/delete/'.$warung_tipe->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
            			?>
            		  </td>
            	  </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
</div>
