<form action="{{ route('verify') }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="otp" placeholder="otp">
    <input type="submit" value="verify">
</form>
