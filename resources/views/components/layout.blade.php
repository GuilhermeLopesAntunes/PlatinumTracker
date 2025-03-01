<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PlatinumTracker - {{$title}}</title>
    <link rel= "stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

<div class="container">
    <h1 class="text-center mb-4">{{$title}}</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        {{$slot}}
    </div>


</div>
</body>
</html>
