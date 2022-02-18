<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aws</title>
</head>
<body>
    <div class="max-w-sm- mx-auto"></div>
    <form action="{{ url('/') }}" method="post" files="true" enctype="multipart/form-data">
    @csrf
    <input name="image" id="image" type="file">
    <button type="submit">Submit</button>
    </form>
    <br>
    <img src="{{ @$url }}" style="heig:400px !important" alt="logo">
</body>
</html>
