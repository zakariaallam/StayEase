<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 50px;
            background-color: #f9f9f9;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            background-color: white;
        }

        h2 {
            text-align: center;
            margin-top: 0;
            color: #333;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 0.9em;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 0.85em;
            margin-top: 5px;
        }

        .input-error {
            border-color: red;
        }
    </style>
</head>

<body>

    <form method="POST" action="{{ route('register.user') }}">
        @csrf
        <h2>Register</h2>

        <!-- Name -->
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="{{ $errors->has('name') ? 'input-error' : '' }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="{{ $errors->has('email') ? 'input-error' : '' }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required
                class="{{ $errors->has('password') ? 'input-error' : '' }}">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="role_id">Account Type</label>
            <select name="role_id" id="role_id" required
                style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 3px;">
                <option value="1">Admin</option>
                <option value="2">Client</option>
            </select>
            @error('role_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <!-- Confirm Password -->

        <button type="submit">Create Account</button>

        <p style="text-align: center; font-size: 0.8em; margin-top: 15px;">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </p>
    </form>

</body>

</html>
