<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
     @vite('resources/css/app.css')
</head>
<body>
    <div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl font-bold">Register now!</h1>
    </div>
    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
      <form action="{{ route('register-user') }}" class="card-body" method="POST">
        @csrf
      <div class="form-control">
        @if(Session::has('success'))
          <div class="bg-green-600">{{ Session::get('success') }}</div>
      @endif
      @if(Session::has('fail'))
      <div class="bg-red-600">{{ Session::get('fail') }}</div>
      @endif
        </div>
         <div class="form-control">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text" name="name" value="{{ old('name') }}" placeholder="name" class="input input-bordered"  />
          <span class="text-red-600">@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="email" class="input input-bordered"  />
          <span class="text-red-600">@error('email') {{ $message }} @enderror</span>
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="password" name="password" value="{{ old('password') }}" placeholder="password" class="input input-bordered"  />
          <span class="text-red-600">@error('password') {{ $message }} @enderror</span>
          <label class="label">
            <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
          </label>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary">Register</button>
        </div>
          <a href="{{ route('login') }}">Login Here</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>