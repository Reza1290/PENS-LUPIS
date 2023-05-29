<!DOCTYPE html>
<html>
<head>
	<title>Card with Nested Card</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		.card {
			display: flex;
			flex-direction: column;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: 0 2px 5px rgba(0,0,0,0.3);
			padding: 20px;
			margin: 20px;
			max-width: 300px;
			min-height: 400px;
			box-sizing: border-box;
		}

		.card .header {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
		}

		.card .content {
			flex-grow: 1;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}

		.inner-card {
			background-color: #eee;
			border: 1px solid #ccc;
			padding: 10px;
			margin: 10px;
			max-width: 200px;
			box-sizing: border-box;
		}

		.inner-card .header {
			font-size: 18px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.inner-card .content {
			font-size: 14px;
		}
	</style>
</head>
<body>
	<div class="card">
		<div class="header">Card with Nested Card</div>
		<div class="content">
			<div class="inner-card">
				<div class="header">Nested Card 1</div>
				<div class="content">
					<p>Ini adalah konten dari Nested Card 1</p>
				</div>
			</div>
			<div class="inner-card">
				<div class="header">Nested Card 2</div>
				<div class="content">
					<p>Ini adalah konten dari Nested Card 2</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
