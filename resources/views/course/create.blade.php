<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Course</title>
</head>
<body>

    <h1>Course Registration Form</h1>

    <form action="/courses" method="POST">
        @csrf

        <div>
            <label for="course_name">Course Name:</label>
            <input
                type="text"
                id="course_name"
                name="course_name"
                value="{{ old('course_name') }}"
                required
            >
            @error('course_name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="course_code">Course Code:</label>
            <input
                type="text"
                id="course_code"
                name="course_code"
                value="{{ old('course_code') }}"
                required
            >
            @error('course_code')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="description">Description:</label>
            <textarea
                id="description"
                name="description"
            >{{ old('description') }}</textarea>
            @error('description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Register Course</button>
    </form>

    <br>

    <a href="/courses">View All Courses</a>

</body>
</html>