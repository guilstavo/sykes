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
			<h1>Welcome to Sykes Cottages!</h1>
			<table class="table">
				<thead>
					<tr>
						<th>Location Name</th>
						<th>Property Name</th>
						<th>Near Beach</th>
						<th>Accept Pets</th>
						<th>Sleeps</th>
						<th>Beds</th>
						<th>Start Date</th>
						<th>End Date</th>
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
						<td><?= $cottage["start_date"] ?></td>
						<td><?= $cottage["end_date"] ?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</body>
</html>