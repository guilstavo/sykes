<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sykes Cottages</title>
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
	<body>
		<div class="container">
			<h1>Welcome to Sykes Interview!</h1>
			
			<?php

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
			<?php
			echo form_button(array(
				"class" => "btn btn-primary",
				"content" => "Submit",
				"type" => "submit"
			));

			echo form_close();

			?>
			<!-- <table class="table">
				<thead>
					<tr>
						<th>Location Name</th>
						<th>Property Name</th>
						<th>Near Beach</th>
						<th>Accept Pets</th>
						<th>Sleeps</th>
						<th>Beds</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($cottages as $key => $cottage) : ?>
					<tr>
						<td><?= $cottage["location_name"] ?></td>
						<td><?= $cottage["property_name"] ?></td>
						<td><?= $cottage["near_beach"] ?></td>
						<td><?= $cottage["accepet_pets"] ?></td>
						<td><?= $cottage["sleeps"] ?></td>
						<td><?= $cottage["beds"] ?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table> -->
		</div>
	</body>
</html>