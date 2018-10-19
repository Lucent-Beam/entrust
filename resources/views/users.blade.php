<!DOCTYPE html>
<html>
	<head>
		<title>User's view</title>
		<!-- 		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-print-1.5.4/datatables.min.css"/>
		<style type="text/css">
			.dataTables_filter {
			float: left !important;
			}
		</style>
	</head>
	<body>
		<div>
			{!! $dataTable->table() !!}
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- 		<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
		-->
		<!-- 		<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-print-1.5.4/datatables.min.js"></script>
		<script src="/datatable/server-side.js"></script>
		{!! $dataTable->scripts() !!}
	</body>
</html>