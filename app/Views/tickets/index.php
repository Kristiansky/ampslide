<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Codeigniter 4 CRUD App Example - positronx.io</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
	<div class="d-flex justify-content-end">
		<a href="<?php echo site_url('/ticket-form') ?>" class="btn btn-success mb-2">Add Ticket</a>
	</div>
	<div class="mt-3">
		<table class="table table-bordered" id="tickets-list">
			<thead>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Created</th>
				<th>Updated</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php if($tickets): ?>
				<?php foreach($tickets as $ticket): ?>
					<tr>
						<td><?php echo $ticket['id']; ?></td>
						<td><?php echo $ticket['title']; ?></td>
						<td><?php echo $ticket['created_at']; ?></td>
						<td><?php echo $ticket['updated_at']; ?></td>
						<td>
							<a href="<?php echo base_url('edit-view/'.$ticket['id']);?>" class="btn btn-primary btn-sm">Edit</a>
							<a href="<?php echo base_url('delete/'.$ticket['id']);?>" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready( function () {
		$('#tickets-list').DataTable();
	} );
</script>
</body>
</html>