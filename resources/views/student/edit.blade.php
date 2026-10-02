<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>

    <form action="/students/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label><br>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $student->name) }}"
            required
        >
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="email">Email:</label><br>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $student->email) }}"
            required
        >
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="phone">Phone:</label><br>
        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone', $student->phone) }}"
            required
        >
        @error('phone')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address">{{ old('address', $student->address) }}</textarea>
        @error('address')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label for="date_of_birth">Date of Birth:</label><br>
        <input
            type="date"
            id="date_of_birth"
            name="date_of_birth"
            value="{{ old('date_of_birth', $student->date_of_birth) }}"
        >
        @error('date_of_birth')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Update Student</button>
    </form>

    <br>

    <a href="/students">Back to Student List</a>
</body>
</html>