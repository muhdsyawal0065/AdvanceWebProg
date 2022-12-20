<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    const setup = () => {
        let firstDate = $('#start_date').val();
        let secondDate = $('#end_date').val();
        const findTheDifferenceBetweenTwoDates = (firstDate, secondDate) => {
            firstDate = new Date(firstDate);
            secondDate = new Date(secondDate);
            let timeDifference = Math.abs(secondDate.getTime() - firstDate.getTime());
            let millisecondsInADay = (1000 * 3600 * 24);
            let differenceOfDays = Math.ceil(timeDifference / millisecondsInADay);
            return differenceOfDays;
        }
        let result = findTheDifferenceBetweenTwoDates(firstDate, secondDate);
        result = Math.floor(result / 30)
        $("#duration").val(result);
    }

    $(document).ready(function() {
        $('#start_date').change(function() {
            if ($('#end_date').val() != '') {
                setup();
            }
        })
        $('#end_date').change(function() {
            if ($('#start_date').val() != '') {
                setup();
            }
        })
    });
</script>
<h1> Project Registration </h1>
<form action="/addProject" method ="POST">
    @csrf

    <input type="hidden" name="id" placeholder="Enter Student ID:"><br>
    Title:
    <input type="text" name="title" placeholder="Enter Title:" required><br><br>
    Category:
    <select name="category" required>
        <option value="" selected>--Please Select--</option>
        <option value="Development">Development</option>
        <option value="Research">Research</option>
    </select><br><br>
    Student:
    <select name="studid" required>
        <option value="" selected>--Please Select--</option>
        @foreach($students as $row)
            <option>{{$row['id']}}</option>
        @endforeach
    </select><br><br>
    Start Date:
    <input type="date" name="start_date" id="start_date" placeholder="Date:" required><br><br>
    End Date:
    <input type="date" name="end_date" id="end_date" placeholder="Date:" required><br><br>
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
    <input type="text" name="duration" id="duration" placeholder="Duration:" readonly required><br><br>
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