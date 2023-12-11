<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card  my-5">
            <div class="card-header">
              <h2>Login</h2>
            </div>
            <div class="card-body">
                    @if ($errors->any())
                        <div style="color: red;">
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                    @endif
                
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                
                        <label>Email:</label>
                        <input type="email" name="email" value="{{ old('email', request()->cookie('email')) }}" required>
                
                        <br>
                
                        <label>Password:</label>
                        <input type="password" name="password" value="{{ request()->cookie('password') }}" required>
                
                        <br>
                
                        <input type="checkbox" name="remember" @if(Cookie::get('email') !== null && !empty(Cookie::get('email')) ) checked @endif > Remember Me
                
                        <br>
                
                        <button type="submit" >Login</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
