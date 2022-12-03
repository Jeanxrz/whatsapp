<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <div class="row">
        <a href="{{route('persona.create')}}">Create</a>
    </div>
    <table class="table table-bordered table-hover table-striped table-secondary">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Foto</th>
                <th>Opciones</th>
            </tr>
            <tbody>
                @foreach ($personas as $persona)
                    <tr>
                        <td>{{$persona->id}}</td>
                        <td>{{$persona->nombre}}</td>
                        <td>{{$persona->apaterno}}</td>
                        <td>{{$persona->amaterno}}</td>
                        <td>{{$persona->foto}}</td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</body>
</html>