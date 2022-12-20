<div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
    <div>
        @auth
        <x-app-layout>
        <div style="position: relative; top: 60px; right:-140px" >
            <table bgcolor="grey" border="3px">
                <tr style="font-size: 12px;">
                    <th style="padding:20px">ID</th>
                    <th style="padding:20px">Title</th>
                    <th style="padding:20px">Category</th>
                    <th style="padding:20px">Student</th>
                    <th style="padding:20px">Start Date</th>
                    <th style="padding:20px">End Date</th>
                    <th style="padding:20px">Supervisor</th>
                    <th style="padding:20px">Examiner 1</th>
                    <th style="padding:20px">Examiner 2</th>
                    <th style="padding:20px">Duration <br/>(Months)</th>
                    <th style="padding:20px">Progress</th>
                    <th style="padding:20px">Status</th>
                    <th style="padding:20px">Operation</th>
                </tr>
                @foreach($projects as $x)
                <tr align="center" style="font-size: 12px;">
                    <td>{{$x['id']}}</td>
                    <td>{{$x['title']}}</td>
                    <td>{{$x['category']}}</td>
                    <td>{{$x['studid']}}</td>
                    <td>{{$x['start_date']}}</td>
                    <td>{{$x['end_date']}}</td>
                    <td>{{$x['svid']}}</td>
                    <td>{{$x['exid1']}}</td>
                    <td>{{$x['exid2']}}</td>
                    <td>{{$x['duration']}}</td>
                    <td>{{$x['progress']}}</td>
                    <td>{{$x['status']}}</td>
                    <td style="color:blue"><a href={{"updprojsv/".$x['id']}}> UPDATE </td>
                </tr>
                @endforeach
            </table>
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