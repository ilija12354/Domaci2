<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <title>my aplication</title>
</head>
<body>
    
<form action="{{route('logout')}}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>

@yield('nesto')


<script src="{{mix('js/app.js')}}"></script>
</body>
</html>