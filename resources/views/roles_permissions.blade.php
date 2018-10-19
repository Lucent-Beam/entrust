<!DOCTYPE html>
<html>
<head>
	<title>Roles and permissions!</title>
</head>
<body>

	<h1>Roles and Permissions!</h1>
	@role('owner')
	<div><h3>I'm an owner!</h3></div>
	@endrole

	@role('admin')
	<div><h3>I'm an admin!</h3></div>
	@endrole

	@role('seller')
	<div><h3>I'm a seller person!</h3></div>
	@endrole

	@role('owner')
	<div><button>My button as an owner</button></div>
	@endrole

	@role('seller')
	<div><button>My button as an seller</button></div>
	@endrole

	@role('admin')
	<div><button>My button as an admin</button></div>
	@endrole

	<hr>

	<h3>Permissions!!</h3>
	@permission('create-post')
	<div><button>Crear post!</button></div>
	@endpermission

	@permission('edit-user')
	<div><button>Editar usuario</button></div>
	@endpermission

</body>
</html>