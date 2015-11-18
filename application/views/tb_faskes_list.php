<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Tb_faskes List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('faskes/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('faskes/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>nama_faskes</th>
		    <th>id_tipe</th>
		    <th>alamat</th>
		    <th>no_telpon</th>
		    <th>foto</th>
		    <th>location</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($faskes_data as $faskes)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $faskes->nama_faskes ?></td>
		    <td><?php echo $faskes->id_tipe ?></td>
		    <td><?php echo $faskes->alamat ?></td>
		    <td><?php echo $faskes->no_telpon ?></td>
		    <td><?php echo $faskes->foto ?></td>
		    <td><?php echo $faskes->location ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('faskes/read/'.$faskes->id_faskes),'Read'); 
			echo ' | '; 
			echo anchor(site_url('faskes/update/'.$faskes->id_faskes),'Update'); 
			echo ' | '; 
			echo anchor(site_url('faskes/delete/'.$faskes->id_faskes),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>
</html>