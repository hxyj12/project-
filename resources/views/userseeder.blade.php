<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <form action="/members" method="Post">
            <table border="2">
                <tr>
                    <th>Student name</th>
                    <th>Student class</th>
                    <th>Student mark</th>
                </tr>
                @foreach ($member as $members)
                <tr>
                    <td>{{ $members->name }}</td>
                    <td>{{ $members->class }}</td>
                    <td>{{ $members->mark }}</td>
                </tr>        
                @endforeach
            </table>
        </form>
    </center>
    
</body>
</html>