@extends("layouts.auth")
@section("style")
    <style>
        html, 
        body {
        height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFFFFF; /* White background */
            font-family: 'Poppins', sans-serif;
        }

        .form-signin {
            max-width: 400px;
            padding: 2rem;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .form-signin h1 {
            color: #ff4d6d;
            font-weight: bold;
        }

        .form-signin .form-control {
            border-radius: 20px;
        }

        .form-signin button {
            background-color: #ff4d6d;
            border: none;
            transition: 0.3s;
        }

        .form-signin button:hover {
            background-color: #e63950;
        }

        .form-check-label {
            color: #555;
        }
    </style>
@endsection
@section("content")
<main class="form-signin" class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- Login Form -->
    <form method="POST" action="{{route("login.post")}}">
        <!-- CSRF token for security -->
        @csrf
      <img class="mb-4" src="{{asset("assets/img/todoico.png")}}" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
  
      <div class="form-floating mb-3">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      @error('email')
          <span class="text-danger">{{$message}}</span>
      @enderror
      <div class="form-floating mb-3">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      @error('password')
          <span class="text-danger">{{$message}}</span>
      @enderror
  
      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      @if (session()->has("success"))
          <div class="alert alert-success">
            {{session()->get("success")}}
          </div>
      @endif
      @if (session()->has("error"))
          <div class="alert alert-danger">
            {{session()->get("error")}}
          </div>
      @endif
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
      <p class="mt-3 text-body-secondary text-center">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
      <p class="mt-2 mb-3 text-body-secondary text-center">&copy; 2025</p>
    </form>
</main>
@endsection
