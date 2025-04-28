<?php
// เชื่อมต่อฐานข้อมูล
$servername = "db";         // service name ใน docker-compose
$username = "root";          
$password = "rootpassword";  
$dbname = "job_application"; // ชื่อ database ที่ต้องมีใน MySQL

$conn = new mysqli($servername, $username, $password, $dbname);

// เช็กการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ถ้า POST เข้ามา
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];

    // ตรวจสอบไฟล์ resume
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $resume_name = uniqid() . "_" . basename($_FILES['resume']['name']); // ป้องกันชื่อไฟล์ซ้ำ
        $resume_tmp = $_FILES['resume']['tmp_name'];
        $resume_path = 'uploads/' . $resume_name;

        // อัปโหลดไฟล์
        if (move_uploaded_file($resume_tmp, $resume_path)) {
            // เตรียม SQL
            $stmt = $conn->prepare("INSERT INTO applications (name, email, position, resume) VALUES (?, ?, ?, ?)");
            
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            // ผูกค่าตัวแปร
            $stmt->bind_param("ssss", $name, $email, $position, $resume_name);

            // รันคำสั่ง
            if ($stmt->execute()) {
                $message = "สมัครงานสำเร็จ! ข้อมูลถูกบันทึกเรียบร้อย.";
            } else {
                $message = "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $message = "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
        }
    } else {
        $message = "ไม่พบไฟล์ประวัติ.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ผลการสมัครงาน</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://image.tnews.co.th/newscenter/images/userfiles/images/local940.jpg?x-image-process=style/lg-webp') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
            border-radius: 15px;
            padding: 30px;
            margin-top: 50px;
            width: 100%;
            max-width: 600px;
        }
        .btn-secondary {
            border-radius: 50px;
            font-weight: bold;
        }
        .alert {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="card text-center">
    <h2 class="mb-4">ผลการสมัครงาน</h2>

    <div class="alert alert-info">
        <?php echo $message; ?>
    </div>

    <a href="index.php" class="btn btn-secondary mt-3">กลับไปที่ฟอร์ม</a>
</div>

</body>
</html>
