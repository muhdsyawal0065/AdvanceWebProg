<table border="border">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Address</td>
        <td>Last Updated</td>
        <td>Operation</td>
        <td>Operation 2</td>
    </tr>
    @foreach($senarai as $x)
    <tr>
        <td>{{$x['id']}}</td>
        <td>{{$x['name']}}</td>
        <td>{{$x['address']}}</td>
        <td>{{$x['last_updated']}}</td>
        <td><a href = {{"del/".$x['id']}}> DELETE </td>
        <td><a href = {{"upd/".$x['id']}}> UPDATE </td>
    </tr>
    @endforeach
</table>