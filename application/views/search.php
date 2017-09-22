<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sykes Cottages</title>
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>">
	<link rel="stylesheet" href="<?= base_url("css/bootstrap-datepicker.min.css") ?>">
</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Welcome to Sykes Interview!</h1>
						<?= validation_errors('<p class ="alert alert-danger">', '</p>'); ?>
						<?php
						$options = array(
							'1'=> '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6',
							'7' => '7',
							'8' => '8',
							'9' => '9',
							'10' => '10'
						);
						echo form_open("cottages/search");

						echo form_label("Location", "location");
						echo form_input(array(
							"name" => "location",
							"class" => "form-control",
							"id" => "location",
							"maxlength" => "255",
							"value" => ""
						));
						?>
						<div class="form-check">
							<label class="form-check-label">
								<? echo form_checkbox('near_beach', '1', FALSE); ?>
								Near the Beach
							</label>
						</div>

						<div class="form-check">
							<label class="form-check-label">
								<? echo form_checkbox('accepts_pets', '1', FALSE); ?>
								Accepts Pets
							</label>
						</div>

						<div class="form-group">
							<label>Sleeps</label>
							<? echo form_dropdown('sleeps', $options, '1'); ?>
						</div>

						<div class="form-group">
							<label>Beds</label>
							<? echo form_dropdown('beds', $options, '1'); ?>
						</div>

						<?= form_label("From", "from_date"); ?>
						<input id="datepickerFrom" name="from_date" data-provide="datepicker">

						<?= form_label("To", "to_date"); ?>
						<input id="datepickerTo" name="to_date">

						<?php
						echo form_button(array(
							"class" => "btn btn-primary",
							"content" => "Submit",
							"type" => "submit"
						));

						echo form_close();
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="<?= base_url("js/jquery.min.js") ?>"></script>
	<script type="text/javascript" src="<?= base_url("js/bootstrap.min.js") ?>"></script>
	<script type="text/javascript" src="<?= base_url("js/bootstrap-datepicker.min.js") ?>"></script>
	<script type="text/javascript" src="<?= base_url("js/sykes.js") ?>"></script>
</html>