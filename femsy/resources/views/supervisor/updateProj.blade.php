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
<script>
    $(document).ready(function() {
        $("select").each(function(cSelect) {
            $(this).data('stored-value', $(this).val());
        });

        $("select").change(function() {
            var cSelected = $(this).val();
            var cPrevious = $(this).data('stored-value');
            $(this).data('stored-value', cSelected);

            var otherSelects = $("select").not(this);

            otherSelects.find('option[value=' + cPrevious + ']').removeAttr('disabled');
            otherSelects.find('option[value=' + cSelected + ']').attr('disabled', 'disabled');
        });
    });
</script>
<h1> Project Registration </h1>
<form action="/editprojsv" method="POST">
    @csrf

    <input type="hidden" name="id" value="{{$projects['id']}}"><br>
    Title:
    <input type="text" name="title" value="{{$projects['title']}}" readonly><br><br>
    Category:
    <input type="text" name="category" value="{{$projects['category']}}" readonly><br><br>
    Student:
    @foreach($students as $row)
    @if ($projects['studid'] == $row['id'])
    <input type="text" name="studid" value="{{$row['id']}}" readonly><br><br>
    @endif
    @endforeach
    Start Date:
    <input type="date" name="start_date" id="start_date" value="{{$projects['start_date']}}" required><br><br>
    End Date:
    <input type="date" name="end_date" id="end_date" value="{{$projects['end_date']}}" required><br><br>
    Supervisor:
    @foreach($users as $row)
    @if ($projects['svid'] == $row['id'])
    <input type="text" name="svid" value="{{$row['id']}}" readonly><br><br>
    @endif
    @endforeach
    Examiner 1:
    @foreach($users as $row)
    @if ($projects['exid1'] == $row['id'])
    <input type="text" name="exid1" value="{{$row['id']}}" readonly><br><br>
    @endif
    @endforeach
    Examiner 2:
    @foreach($users as $row)
    @if ($projects['exid2'] == $row['id'])
    <input type="text" name="exid2" value="{{$row['id']}}" readonly><br><br>
    @endif
    @endforeach
    Duration:
    <input type="text" name="duration" id="duration" value="{{$projects['duration']}}"><br><br>
    Progress:
    <select name="progress" required>
        <option value="">--Please Select--</option>
        <option value="Milestone 1" @if ($projects['progress']=="Milestone 1" ) selected @endif>Milestone 1</option>
        <option value="Milestone 2" @if ($projects['progress']=="Milestone 2" ) selected @endif>Milestone 2</option>
        <option value="Final Report" @if ($projects['progress']=="Final Report" ) selected @endif>Final Report</option>
    </select><br><br>
    Status:
    <select name="status" required>
        <option value="">--Please Select--</option>
        <option value="On Track" @if ($projects['status']=="On Track" ) selected @endif>On Track</option>
        <option value="Delayed" @if ($projects['status']=="Delayed" ) selected @endif>Delayed</option>
        <option value="Extended" @if ($projects['status']=="Extended" ) selected @endif>Extended</option>
        <option value="Completed" @if ($projects['status']=="Completed" ) selected @endif>Completed</option>
    </select><br><br>

    <button type="reset"> Reset </button>
    <input type="submit" name="submit">
</form>