<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>
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
<html>

<body>
    <h1> Project Registration </h1>
    <form action="/editproj" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{$projects['id']}}"><br>
        Title:
        <input type="text" name="title" value="{{$projects['title']}}" required><br><br>
        Category:
        <select name="category" required>
            <option value="" selected>--Please Select--</option>
            <option value="Development" @if ($projects['category']=="Development" ) selected @endif>Development</option>
            <option value="Research" @if ($projects['category']=="Research" ) selected @endif>Research</option>
        </select><br><br>
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
        <input type="date" name="start_date" id="start_date" value="{{$projects['start_date']}}" required><br><br>
        End Date:
        <input type="date" name="end_date" id="end_date" value="{{$projects['end_date']}}" required><br><br>
        Supervisor:
        <select name="svid" id="svid" required>
            <option value="">--Please Select--</option>
            @foreach($users as $row)
            @if ($projects['svid'] == $row['id'])
            <option value="{{$row['id']}}" selected>{{$row['id']}}</option>
            @else
            <option value="{{$row['id']}}">{{$row['id']}}</option>
            @endif
            @endforeach
        </select><br><br>
        Examiner 1:
        <select name="exid1" id="exid1" required>
            <option value="">--Please Select--</option>
            @foreach($users as $row)
            @if ($projects['svid'] == $row['id'])
            <option value="{{$row['id']}}" selected>{{$row['id']}}</option>
            @else
            <option value="{{$row['id']}}">{{$row['id']}}</option>
            @endif
            @endforeach
        </select><br><br>
        Examiner 2:
        <select name="exid2" id="exid2" required>
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
</body>

</html>