<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 600px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        input, textarea, button {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #5cb85c;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .error {
            color: red;
            font-size: 12px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Employee</h1>

        <!-- Display success or error message -->
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $employee->name) }}" required>

            <label for="designation">Designation</label>
            <input type="text" name="designation" id="designation" value="{{ old('designation', $employee->designation) }}" required>

            <label for="joining_date">Joining Date</label>
            <input type="date" name="joining_date" id="joining_date" value="{{ old('joining_date', $employee->joining_date) }}" required>

            <label for="salary">Salary</label>
            <input type="number" name="salary" id="salary" value="{{ old('salary', $employee->salary) }}" step="0.01" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $employee->email) }}">

            <label for="mobile_no">Mobile No</label>
            <input type="text" name="mobile_no" id="mobile_no" value="{{ old('mobile_no', $employee->mobile_no) }}" required>

            <label for="address">Address</label>
            <textarea name="address" id="address" required>{{ old('address', $employee->address) }}</textarea>

            <button type="submit">Update Employee</button>
        </form>
    </div>
</body>
</html>