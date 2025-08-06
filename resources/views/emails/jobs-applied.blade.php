<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Workopia Job Application</title>
</head>
<body>
	<p>There has been a new job application to your Workopia listing</p>

	<p><strong>Job Title: </strong>{{$job->title}}</p>

	<p><strong>Application Details: </strong></p>
	
	<p><strong>Full Name: </strong>{{$job->full_name}}</p>
	<p><strong>Contact Phone: </strong>{{$job->contact_phone}}</p>
	<p><strong>Contact Email: </strong>{{$job->contact_email}}</p>
	<p><strong>Message: </strong>{{$job->message}}</p>
	<p><strong>Location: </strong>{{$job->location}}</p>


	<p>Login to you Workopia account to view the application.</p>
</body>
</html>