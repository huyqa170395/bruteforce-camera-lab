<!-- camera-login.php -->
<?php
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
  <title>IP Camera Login</title>
  <link rel="stylesheet" href="common/style.css">
</head>
<body>
  <div class="login-container">
    <h2>🔒 IP Camera Login</h2>
    <?php if ($error): ?>
      <p style="color:red;">Sai username hoặc password!</p>
    <?php endif; ?>
    <form method="POST" action="validate.php">
      <label>Username: <input type="text" name="username"></label><br>
      <label>Password: <input type="password" name="password"></label><br>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
