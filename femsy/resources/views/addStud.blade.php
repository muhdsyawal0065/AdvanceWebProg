<h1> Student Registration </h1>

<form action="/add" method ="POST">
    @csrf

    Student ID:
    <input type="text" name="id" placeholder="Enter Student ID:" required><br>
    Student Name:
    <input type="text" name="name" placeholder="Enter Student Name:" required><br>
    Student Address:
    <input type="text" name="address" placeholder="Enter Address:" required><br>

    <button type="reset"> Reset </button>
    <input type="submit" name="submit">
</form>