{{-- resources/views/login.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding-top: 50px; }
        form { border: 1px solid #ccc; padding: 20px; border-radius: 5px; width: 300px; }
        div { margin-bottom: 15px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 3px; }
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <h2>Login</h2>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Log in</button>
    </form>
</body>
</html>
