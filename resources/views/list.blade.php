<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
        </tr>
        @foreach($tests as $test)
        <tr>
            <td>{{$test->id}}</td>
            <td>{{$test->name}}</td>
            <td>{{$test->description}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>