<!DOCTYPE html>
<html>
<head>
    <title>Challenge Mail</title>
</head>
<body>
<h1>Mr./Mrs.{{ $data['name'] }}</h1>
<p>Has challenge your this video {{ $data['title'] }} please give a response</p>
<a href="{{$data['url']}}">{{$data['title']}}</a>

<p>Thank you</p>
</body>
</html>