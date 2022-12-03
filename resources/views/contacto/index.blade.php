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
        <a href="{{route('contacto.create')}}">Create</a>
    </div>
    <table class="table table-bordered table-hover table-striped table-secondary">
        <thead>
            <tr>
                <th>Id</th>
                <th>Telefono</th>
                <th>Parentesco</th>
                <th>Persona</th>
                <th>Opciones</th>
            </tr>
            <tbody>
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{$contacto->id}}</td>
                        <td>{{$contacto->telefono}}</td>
                        <td>{{$contacto->parentesco}}</td>
                        <td>{{$contacto->nombre}}</td>
                        <td>
                            <a href="{{route('contacto.edit', $contacto->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button class="btn" type="submit"><i class="fas fa-trash-alt eliminar"></i></button>
                            <a href=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".eliminar").on('click', function(e){
                e.preventDefault();
                id=$(this).parent().parent().parent().find('td').first().html();
                swal.fire({
                    title: '¿Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperas jamas!",
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    position: 'center',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: 'eliminar/contacto/'+id,
                            type: 'DELETE',
                            data:{
                                id:id,
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                $("#" +id).remove();
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timeProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer) 
                                    }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Se elimino correctamente el registro'
                                })
                            },
                            error: function (xhr, ajaxOptions, throwError) {
                                
                            }
                        });
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            timeProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer) 
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'No se elimino el registro'
                        })
                    }
                })
            })
        });
    </script>
</body>
</html>