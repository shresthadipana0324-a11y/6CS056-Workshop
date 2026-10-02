<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
</head>
<body>

    <h1>Registered Courses</h1>

    {{-- Success message --}}
    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    {{-- Register new course link --}}
    <p>
        <a href="/courses/create">Register New Course</a>
    </p>

    {{-- Display all courses --}}
    @if ($courses->count() > 0)

        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>

                        <td>{{ $course->course_name }}</td>

                        <td>{{ $course->course_code }}</td>

                        <td>{{ $course->description ?? 'N/A' }}</td>

                        <td>{{ $course->created_at }}</td>

                        <td>
                            {{-- Edit button --}}
                            <a href="/courses/{{ $course->id }}/edit">
                                Edit
                            </a>

                            {{-- Delete button --}}
                            <form
                                action="/courses/{{ $course->id }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this course?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>No courses registered yet.</p>
    @endif

    {{-- Link to students --}}
    <p>
        <a href="/students">View All Students</a>
    </p>

</body>
</html>