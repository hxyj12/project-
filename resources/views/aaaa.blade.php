<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="name">name</label>
        <input type="text" name="name">
        @error('name')
            {{ $message }}
        @enderror
        <br>
        <label for="email">email</label>
        <input type="email" name="email">
        @error('email')
            {{ $message }}
        @enderror
        <br>
        <label for="password">password</label>
        <input type="password" name="password">
        @error('password')
            {{ $message }}
        @enderror
        <br>
        <label for="confirm_password">confirm password</label>
        <input type="password" name="password_confirmation">
        <button type="submit">submit</button>
    </form>
</body>
</html>