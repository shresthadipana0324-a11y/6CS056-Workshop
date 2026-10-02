<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>

    <h1>Edit Course</h1>

    @if ($errors->any())
        <div>
            <h3>Please fix the following errors:</h3>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
        </div>

        <br>

        <div>
            <label for="description">Description:</label>

            <textarea
                id="description"
                name="description"
            >{{ old('description', $course->description) }}</textarea>
        </div>

        <br>

        <div>
            <label for="duration">Duration (weeks):</label>

            <input
                type="number"
                id="duration"
                name="duration"
                value="{{ old('duration', $course->duration) }}"
                min="1"
                required
            >
        </div>

        <br>

        <div>
            <label for="fee">Course Fee:</label>

            <input
                type="number"
                id="fee"
                name="fee"
                value="{{ old('fee', $course->fee) }}"
                min="0"
                step="0.01"
                required
            >
        </div>

        <br>

        <div>
            <label for="difficulty">Difficulty:</label>

            <select id="difficulty" name="difficulty" required>
                <option value="">Select difficulty</option>

                <option value="Easy"
                    {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>
                    Easy
                </option>

                <option value="Medium"
                    {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="Hard"
                    {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>
                    Hard
                </option>
            </select>
        </div>

        <br>

        <div>
            <label for="is_active">Course Status:</label>

            <select id="is_active" name="is_active" required>
                <option value="1"
                    {{ (string) old('is_active', $course->is_active) === '1' ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0"
                    {{ (string) old('is_active', $course->is_active) === '0' ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
        </div>

        <br>

        <button type="submit">Update Course</button>
    </form>

    <br>

    <a href="/courses">Back to Courses</a>

</body>
</html>