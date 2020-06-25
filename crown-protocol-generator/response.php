<?php
global $wpdb;
require_once ('../../../wp-config.php');
//include('crown.php');
$plugin_dir = ABSPATH . 'wp-content/plugins/crown-protocol-generator';
$plugin_url_cr = plugin_dir_url($plugin_dir);
//echo $plugin_dir;
?>
<link rel='stylesheet'  href='<?php echo $plugin_url_cr; ?>crown-protocol-generator/css/bootstrap.min.css?ver=4.9.8' type='text/css' media='all' />
<link rel='stylesheet'  href='<?php echo $plugin_url_cr; ?>crown-protocol-generator/css/dataTables.bootstrap.css' type='text/css' media='all' />
<link rel='stylesheet'  href='<?php echo $plugin_url_cr; ?>crown-protocol-generator/css/dataTables.responsive.css?ver=4.9.8' type='text/css' media='all' />
<link rel='stylesheet'  href='<?php echo $plugin_url_cr; ?>crown-protocol-generator/css/custom.css' type='text/css' media='all' />
<style>
    body {
            font-size: 140%;
        }
        table.dataTable th,
        table.dataTable td {
            white-space: nowrap;
        }
div.container { max-width: 1200px }
</style>
<div class=" container table-responsive">
<div class="conatiner btn-entry">
    <button type="button" class="btn btn-primary"><a href="https:WEBSITEURL">Create New Entry</a></button>
</div>
<table id="data_table" class="table table-bordered table-striped"  style="width:100%">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>NFTProto</th>
			<th>ProtoName</th>
			<th>ProtoOwnerAddress</th>
			<th>SelfSign</th>
			<th>TypeMime</th> 
			<th>SchemaUri</th>
			<th>Transferable</th>
			<th>MetaEmbedded</th>
			<th>MetaSize</th>
			<th>ProtoHash</th>
            <th>Date</th>
		</tr>
	</thead>
<?php
//	print_r($_GET);
$result = $wpdb->get_results('SELECT * FROM wp_crownform1 ORDER BY created DESC'
);

?>
<tbody>
<?php
foreach($result as $row){   
//print_r($row);
?>

	<tr>
		<td><?php echo $row->id;?></td>
		<td><?php echo $row->Username;?></td>
		<td><?php echo $row->Email;?></td>
		<td><?php echo $row->NFTProto;?></td>
		<td><?php echo $row->ProtoName;?></td>
		<td><?php echo $row->ProtoOwnerAddress;?></td>
		<td><?php echo $row->SelfSign;?></td>
		<td><?php echo $row->TypeMime;?></td>
		<td><?php echo $row->SchemaUri;?></td>
		<td><?php echo $row->Transferable;?></td>
		<td><?php echo $row->MetaEmbedded;?></td>
		<td><?php echo $row->MetaSize;?></td>
		<td><?php echo $row->ProtoHash;?></td>
		<td><?php echo $row->created?></td>
	</tr>

<?php

 }
 ?>

 </tbody>

 </table>
</div>
<script type='text/javascript' src='<?php echo $plugin_url_cr; ?>crown-protocol-generator/js/jquery.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr; ?>crown-protocol-generator/js/bootstrap.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr;  ?>crown-protocol-generator/js/popper.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr;  ?>crown-protocol-generator/js/jquery.dataTables.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr;  ?>crown-protocol-generator/js/dataTables.responsive.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr;  ?>crown-protocol-generator/js/dataTables.bootstrap.js?ver=4.9.8'></script>
<script>
    $(document).ready(function(){
         $('#data_table').DataTable( {
             responsive: true

                });
    })
</script>

