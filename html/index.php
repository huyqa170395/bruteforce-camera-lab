<!DOCTYPE html>
<html>
<head>
  <title>Brute Force Lab - IP Camera Case</title>
  <link rel="stylesheet" href="common/style.css">
</head>
<body>
  <div class="login-container">
    <h1>🛡️ Brute Force Lab</h1>
    <h2>🎯 Case Study: IP Camera sử dụng mật khẩu mặc định</h2>

    <p>
      Trong một số vụ tấn công thực tế, hacker đã quét hàng ngàn thiết bị camera IP sử dụng tài khoản mặc định như <code>admin:admin</code> hoặc <code>admin:12345</code>.
      Điều này cho phép họ truy cập trái phép vào hệ thống giám sát mà không cần khai thác lỗ hổng phần mềm.
    </p>

    <p><strong>Bài tập của bạn:</strong></p>
    <ul style="text-align:left; display:inline-block;">
      <li>Phân tích biểu mẫu đăng nhập camera tại <code>camera-login.php</code>.</li>
      <li>Sử dụng kỹ thuật brute-force để tìm đúng mật khẩu đăng nhập.</li>
      <li>Lấy được <code>flag</code> sau khi đăng nhập thành công.</li>
    </ul>

    <br><br>
    <div>
      <a href="camera-login.php">
        <button>Bắt đầu brute-force</button>
      </a>
    </div>

  </div>
</body>
</html>
