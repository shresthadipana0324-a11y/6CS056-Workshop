<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
</head>
<body>

    <h1>Course List</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <a href="/courses/create">Register New Course</a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Description</th>
                <th>Duration (Weeks)</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->description ?? 'N/A' }}</td>
                    <td>{{ $course->duration ?? 'Not set' }}</td>
                    <td>{{ $course->fee !== null ? number_format((float) $course->fee, 2) : 'Not set' }}</td>
                    <td>{{ $course->difficulty ?? 'Not set' }}</td>

                    <td>
                        @if ($course->is_active)
                            Active
                        @else
                            Inactive
                        @endif
                    </td>

                    <td>{{ $course->created_at }}</td>

                    <td>
                        <a href="/courses/{{ $course->id }}">View</a>

                        |

                        <a href="/courses/{{ $course->id }}/edit">Edit</a>

                        |

                        <form
                            action="/courses/{{ $course->id }}"
                            method="POST"
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Are you sure you want to delete this course?')"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>