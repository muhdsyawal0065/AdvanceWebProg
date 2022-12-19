<table border="border">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Address</td>
        <td>Last Updated</td>
    </tr>
    @foreach($senarai as $x)
    <tr>
        <td>{{$x['id']}}</td>
        <td>{{$x['name']}}</td>
        <td>{{$x['address']}}</td>
        <td>{{$x['last_updated']}}</td>
    </tr>
    @endforeach
</table>