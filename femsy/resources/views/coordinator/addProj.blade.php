<h1> Project Registration </h1>
<form action="/addProject" method ="POST">
    @csrf

    <input type="hidden" name="id" placeholder="Enter Student ID:"><br>
    Title:
    <input type="text" name="title" placeholder="Enter Title:" required><br><br>
    Student:
    <select name="studid" required>
        <option value="" selected>--Please Select--</option>
        @foreach($students as $row)
            <option>{{$row['id']}}</option>
        @endforeach
    </select><br><br>
    Start Date:
    <input type="date" name="start_date" placeholder="Date:" required><br><br>
    End Date:
    <input type="date" name="end_date" placeholder="Date:" required><br><br>
    Supervisor:
    <select name="svid" required>
        <option value="" selected>--Please Select--</option>
        @foreach($users as $row)
            <option>{{$row['id']}}</option>
        @endforeach
    </select><br><br>
    Examiner 1:
    <select name="exid1" required>
        <option value="" selected>--Please Select--</option>
        @foreach($users as $row)
            <option>{{$row['id']}}</option>
        @endforeach
    </select><br><br>
    Examiner 2:
    <select name="exid2" required>
        <option value="" selected>--Please Select--</option>
        @foreach($users as $row)
            <option>{{$row['id']}}</option>
        @endforeach
    </select><br><br>
    Duration:
    <input type="number" name="duration" placeholder="Duration:" step="1" required><br><br>
    Progress:
    <select name="progress" required>
        <option value="" selected>--Please Select--</option>
        <option value="Milestone 1">Milestone 1</option>
        <option value="Milestone 2">Milestone 2</option>
        <option value="Final Report">Final Report</option>
    </select><br><br>
    Status:
    <select name="status" required>
        <option value="" selected>--Please Select--</option>
        <option value="On Track">On Track</option>
        <option value="Delayed">Delayed</option>
        <option value="Extended">Extended</option>
        <option value="Completed">Completed</option>
    </select><br><br>

    <button type="reset"> Reset </button>
    <input type="submit" name="submit">
</form>