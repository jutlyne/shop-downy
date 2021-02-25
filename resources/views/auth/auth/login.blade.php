<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('auth/style.css')}}" />
    <title>Sign in & Sign up Form</title>

  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form role="form" method="post" action="{{route('auth.auth.login')}}">
            @csrf
            <h2 class="title">Sign in </h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn"><a href="{{route('auth.auth.regis')}}">
              Sign up
            </a></button>
          </div>
          <img src="{{asset('auth/img/log.svg')}}" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>

@if(Session::has('msg'))
<script type="text/javascript">
  alert('{{Session::get('msg')}}');
</script>
@endif