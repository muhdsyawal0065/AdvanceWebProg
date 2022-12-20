<div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
    <div>
        @auth
        <x-app-layout>
            <div style="position: relative; top: 60px; right: -150px">
            <table bgcolor="grey" border="3px">
                <tr>
                    <th style="padding:30px">ID</th>
                    <th style="padding:30px">Name</th>
                    <th style="padding:30px">Address</th>
                    <th style="padding:30px">Last Updated</th>
                    <th style="padding:30px">Operation</th>
                    <th style="padding:30px">Operation 2</th>
                </tr>
                @foreach($senarai as $x)
                <tr align="center">
                    <td>{{$x['id']}}</td>
                    <td>{{$x['name']}}</td>
                    <td>{{$x['address']}}</td>
                    <td>{{$x['last_updated']}}</td>
                    <td style="color:blue"><a href={{"del/".$x['id']}}> DELETE </td>
                    <td style="color:blue"><a href={{"upd/".$x['id']}}> UPDATE </td>
                </tr>
                @endforeach
            </table>
            <a style="color:blue"; href={{('push')}}> Add New Student </a>
        </div>
        </x-app-layout>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
        @endauth
    </div>
    @endif
</div>