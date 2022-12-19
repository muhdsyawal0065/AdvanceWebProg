<div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
    <div>
        @auth
        <x-app-layout>
            <div style="position: relative; top: 60px; right:-50px" >
            <table bgcolor="grey" border="3px">
                <tr style="font-size: 12px;">
                    <th style="padding:30px">ID</th>
                    <th style="padding:30px">Title</th>
                    <th style="padding:30px">Student</th>
                    <th style="padding:30px">Start Date</th>
                    <th style="padding:30px">End Date</th>
                    <th style="padding:30px">Supervisor</th>
                    <th style="padding:30px">Examiner 1</th>
                    <th style="padding:30px">Examiner 2</th>
                    <th style="padding:30px">Duration <br/>(Months)</th>
                    <th style="padding:30px">Progress</th>
                    <th style="padding:30px">Status</th>
                    <th style="padding:30px">Operation</th>
                    <th style="padding:30px">Operation 2</th>
                </tr>
                @foreach($projects as $x)
                <tr align="center" style="font-size: 12px;">
                    <td>{{$x['id']}}</td>
                    <td>{{$x['title']}}</td>
                    <td>{{$x['studid']}}</td>
                    <td>{{$x['start_date']}}</td>
                    <td>{{$x['end_date']}}</td>
                    <td>{{$x['svid']}}</td>
                    <td>{{$x['exid1']}}</td>
                    <td>{{$x['exid2']}}</td>
                    <td>{{$x['duration']}}</td>
                    <td>{{$x['progress']}}</td>
                    <td>{{$x['status']}}</td>
                    <td style="color:blue"><a href={{"del/".$x['id']}}> DELETE </td>
                    <td style="color:blue"><a href={{"upd/".$x['id']}}> UPDATE </td>
                </tr>
                @endforeach
            </table>
            <a style="font-size: 12px; color:blue"; href={{('push')}}> Add New Student </a>
            <a style="font-size: 12px; color:blue"; href={{('pushproj')}}> Add New Project </a>
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