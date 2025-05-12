<?php
$valid_user = "admin";
$valid_pass = "12345"; // Mật khẩu mặc định

$is_valid = $_POST['username'] === $valid_user && $_POST['password'] === $valid_pass;

if (!$is_valid) {
    header("Location: camera-login.php?error=1");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Result</title>
  <link rel="stylesheet" href="common/style-validate.css">
</head>
<body>
  <div class="container">
    <h1>🎉 Truy cập thành công!</h1>
    <p class="flag">Flag: 
      <code>
        <?= htmlspecialchars(file_get_contents("flag.txt")) ?>
      </code>
    </p>

    <!-- Hiệu ứng pháo hoa -->
    <canvas id="confetti-canvas"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script>
      const duration = 5 * 1000;
      const end = Date.now() + duration;

      (function frame() {
        confetti({
          particleCount: 5,
          angle: 60,
          spread: 55,
          origin: { x: 0 },
        });
        confetti({
          particleCount: 5,
          angle: 120,
          spread: 55,
          origin: { x: 1 },
        });

        if (Date.now() < end) {
          requestAnimationFrame(frame);
        }
      })();
    </script>
  </div>
</body>
</html>
