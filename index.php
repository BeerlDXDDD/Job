<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>หน้าแรก - สมัครงานกับเรา SPU</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('https://s.isanook.com/me/0/ud/15/76145/teamwork.jpg?ip/crop/w1200h700/q80/webp') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      animation: fadeInBody 1.5s ease;
      overflow: hidden;
    }

    .logo {
      font-size: 48px;
      font-weight: bold;
      color: white;
      text-shadow: 3px 3px 8px rgba(0,0,0,0.7);
      margin-bottom: 50px;
      animation: slideDown 1s ease forwards;
      opacity: 0;
    }

    .start-btn {
      background: linear-gradient(90deg, #007bff, #00c6ff);
      color: white;
      padding: 15px 50px;
      font-size: 26px;
      border: none;
      border-radius: 50px;
      font-weight: bold;
      transition: 0.3s;
      box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
      animation: popUp 1.5s ease forwards;
      opacity: 0;
    }

    .start-btn:hover {
      transform: scale(1.08);
      background: linear-gradient(90deg, #0056b3, #0096c7);
      box-shadow: 0px 6px 25px rgba(0, 123, 255, 0.7);
    }

    /* Animation */
    @keyframes fadeInBody {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideDown {
      0% { transform: translateY(-100px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes popUp {
      0% { transform: scale(0.5); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body>

  <div class="logo">JOBTHAI</div>

  <a href="apply.html" class="start-btn">สมัครงาน</a>

</body>
</html>
