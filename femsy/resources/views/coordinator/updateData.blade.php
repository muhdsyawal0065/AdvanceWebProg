<h1> Update Status </h1>

<form action = "/edit" method ="POST">
    @csrf
    <input type="hidden" name="id" value="{{$disp['id']}}"><br>
    <input type="text" name="name" value="{{$disp['name']}}"><br>
    <input type="text" name="address" value="{{$disp['address']}}"><br>

    <input type="submit" name="UPDATE">
    <button type="reset">RESET</button>
</form>