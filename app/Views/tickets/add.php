<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter 4 Add Ticket With Validation Demo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<style>
		.error {
			display: block;
			padding-top: 5px;
			font-size: 14px;
			color: red;
		}
	</style>
</head>
<body>
<div class="container mt-5">
	<div class="row">
		<div class="col-12 col-lg-6 offset-lg-3">
			<?= isset($validation) ? $validation->listErrors() : '' ?>
			<?= form_open(site_url('/submit-form'), ['method'=>'post', 'id'=>'add_create', 'name'=>'add_create']) ?>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" id="title" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" class="form-control" id="content"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
	if ($("#add_create").length > 0) {
		$("#add_create").validate({
			rules: {
				title: {
					required: true,
					minlength: 2
				},
				content: {
					required: true,
					minlength: 10
				},
			},
			messages: {
				name: {
					required: "Name is required.",
					minlength: "Name is too short.",
				},
				email: {
					required: "Content is required.",
					minlength: "Content is too short.",
				},
			},
		});
	}
</script>
</body>
</html>