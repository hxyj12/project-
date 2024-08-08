@if (session()->has('register'))
    <script>
        window.alert("{{ session('register') }}");
    </script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body{
            background-color: cornflowerblue
        }
        label{
            font-style:Italic;
        }
    </style>
</head>
<body>
        
        <form method="POST" action="/user">
            @csrf
            <div class="mb-6">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ old('name') }}">

                @error('name')
                    <p">{{ $message }}</p>
                @enderror

            </div>
        
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">

                @error('email')
                    <p>{{ $message }}</p>
                @enderror

            </div>
        
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" value="{{ old('email') }}">

                @error('password')
                    <p>{{ $message }}</p>
                @enderror

            </div>
            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
            </div>
        
            <button type="submit">Sign up</button>

            <div>
                <p>already have an account</p>
                <a href="/login">login</a>
            </div>
        </form>

</body>
</html>