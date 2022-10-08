<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Correo</td>
            <td>Verificacion</td>
            <td>Contraseña</td>
        </tr>
        @foreach ($usuario as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->email_verified_at }}</td>
                <td>{{ $item->password }}</td>
            </tr>
        @endforeach
    </table>
</div>
