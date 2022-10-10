<table>
    <tr>
        <td>Id</td>
        <td>Nombre</td>
    </tr>
    @foreach ($ciclos as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
        </tr>
    @endforeach
</table>
