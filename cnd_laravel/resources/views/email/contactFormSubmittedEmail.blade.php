<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Contact form submitted:
<div>
    User information:
    <div>Name
        <b>
            {{$data->contact->name}}
        </b>
    </div>
    <div>Email
        <b>
            {{$data->contact->email}}
        </b>
    </div>
    <div style="margin:20px 0;">
        <div><b>{{$data->subject}}</b></div>
        <div>{{$data->message}}</div>
    </div>
</div>

</body>
</html>
