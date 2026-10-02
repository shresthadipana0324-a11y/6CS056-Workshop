<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>
</head>
<body>

    <h1>Course Details</h1>

    <p>
        <strong>ID:</strong>
        {{ $course->id }}
    </p>

    <p>
        <strong>Course Name:</strong>
        {{ $course->course_name }}
    </p>

    <p>
        <strong>Course Code:</strong>
        {{ $course->course_code }}
    </p>

    <p>
        <strong>Description:</strong>
        {{ $course->description ?? 'Not provided' }}
    </p>

    <p>
        <strong>Duration:</strong>
        {{ $course->duration !== null ? $course->duration . ' weeks' : 'Not set' }}
    </p>

    <p>
        <strong>Fee:</strong>
        {{ $course->fee !== null ? number_format((float) $course->fee, 2) : 'Not set' }}
    </p>

    <p>
        <strong>Difficulty:</strong>
        {{ $course->difficulty ?? 'Not set' }}
    </p>

    <p>
        <strong>Status:</strong>

        @if ($course->is_active)
            Active
        @else
            Inactive
        @endif
    </p>

    <p>
        <strong>Created At:</strong>
        {{ $course->created_at }}
    </p>

    <p>
        <strong>Updated At:</strong>
        {{ $course->updated_at }}
    </p>

    <a href="/courses/{{ $course->id }}/edit">Edit Course</a>

    <br><br>

    <a href="/courses">Back to Courses</a>

</body>
</html>