<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wiki</title>
  <link rel="stylesheet" href="/assets/styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form method="POST" action="?route=login">
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box button">
        <input type="submit" value="Login">
      </div>
      <span style="color:red;"></span>
        <div class="signup-link">Not a member? <a href="?route=register">Signup now</a></div>
    </form>
  </div>
</body>
    <script type="text/javascript" src="/assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>