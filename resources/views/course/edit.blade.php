<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
</head>
<body>

    <h1>Edit Course</h1>

    <form action="/courses/{{ $course->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="course_name">Course Name:</label>

            <input
                type="text"
                id="course_name"
                name="course_name"
                value="{{ old('course_name', $course->course_name) }}"
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
                value="{{ old('course_code', $course->course_code) }}"
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
            >{{ old('description', $course->description) }}</textarea>

            @error('description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Update Course</button>
    </form>

    <br>

    <a href="/courses">Back to Course List</a>

</body>
</html>