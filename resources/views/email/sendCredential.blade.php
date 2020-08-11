<html>
	<head>
		<title>User Crdential</title>
	</head>
	<body>
		<h3>Hi, {{$data['name']}}</h3>
		<p>{{$data['subject']}}</p>
		<table border="2">

			@if(isset($data['name']) && !empty($data['name']))
			<tr>
				<th>Name</th>
				<td>{{$data['name']}}</td>
			</tr>
			@endif

			@if(isset($data['email']) && !empty($data['email']))
			<tr>
				<th>Email</th>
				<td>{{$data['email']}}</td>
			</tr>
			@endif

			@if(isset($data['verifyUrl']) && isset($data['verifyToken']) && !empty($data['verifyUrl']) && !empty($data['verifyToken']))
			<tr>
				<th>Click Here to verify : </th>
				<td>
					<a href="{{$data['verifyUrl']}}/{{$data['verifyToken']}}" target="_blank">{{$data['verifyToken']}}</a>
				</td>
			</tr>
			@endif
		</table>
	</body>
</html>