<h1> Project Registration </h1>
<form action="/editproj" method ="POST">
    @csrf

    <input type="hidden" name="id" value="{{$projects['id']}}"><br>
    Title:
    <input type="text" name="title" value="{{$projects['title']}}" required><br><br>
    Student:
    <select name="studid" required>
        <option value="">--Please Select--</option>
        @foreach($students as $row)
            @if ($projects['studid'] == $row['id'])
                <option selected>{{$row['id']}}</option>
            @else
                <option>{{$row['id']}}</option>
            @endif
        @endforeach
    </select><br><br>
    Start Date:
    <input type="date" name="start_date" value="{{$projects['start_date']}}" required><br><br>
    End Date:
    <input type="date" name="end_date" value="{{$projects['end_date']}}" required><br><br>
    Supervisor:
    <select name="svid" required>
        <option value="">--Please Select--</option>
        @foreach($users as $row)
            @if ($projects['svid'] == $row['id'])
                <option selected>{{$row['id']}}</option>
            @else
                <option>{{$row['id']}}</option>
            @endif
        @endforeach
    </select><br><br>
    Examiner 1:
    <select name="exid1" required>
        <option value="">--Please Select--</option>
        @foreach($users as $row)
            @if ($projects['svid'] == $row['id'])
                <option selected>{{$row['id']}}</option>
            @else
                <option>{{$row['id']}}</option>
            @endif
        @endforeach
    </select><br><br>
    Examiner 2:
    <select name="exid2" required>
        <option value="">--Please Select--</option>
        @foreach($users as $row)
            @if ($projects['svid'] == $row['id'])
                <option selected>{{$row['id']}}</option>
            @else
                <option>{{$row['id']}}</option>
            @endif
        @endforeach
    </select><br><br>
    Duration:
    <input type="number" name="duration" value="{{$projects['duration']}}" step="1" required><br><br>
    Progress:
    <select name="progress" required>
        <option value="">--Please Select--</option>
        <option value="Milestone 1" @if ($projects['progress'] == "Milestone1") selected @endif >Milestone 1</option>
        <option value="Milestone 2" @if ($projects['progress'] == "Milestone2") selected  @endif >Milestone 2</option>
        <option value="Final Report" @if ($projects['progress'] == "Final Report") selected @endif >Final Report</option>
    </select><br><br>
    Status:
    <select name="status" required>
        <option value="" selected>--Please Select--</option>
        <option value="On Track" @if ($projects['status'] == "On Track") selected  @endif>On Track</option>
        <option value="Delayed" @if ($projects['status'] == "Delayed") selected  @endif>Delayed</option>
        <option value="Extended" @if ($projects['status'] == "Extended") selected  @endif>Extended</option>
        <option value="Completed" @if ($projects['status'] == "Completed") selected @endif>Completed</option>
    </select><br><br>

    <button type="reset"> Reset </button>
    <input type="submit" name="submit">
</form>