<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(180deg, #ffd700, #ff4500);
        }
        .header {
            text-align: center;
        }
        .btn {
            background-color: #ff4500; /* Warna oranye */
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #e03e00; /* Warna oranye lebih gelap saat hover */
        }
        .container {
            width: 100%;
            max-width: 550px; /* Ukuran maksimum kotak form */
            padding: 20px;
            box-sizing: border-box;
        }
        @keyframes slide-down {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .box {
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            background-size: cover;
            background-position: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            animation: slide-down 1s ease-out; /* Animasi turun saat halaman dimuat */
        }
        /* Animasi fade-in saat halaman dimuat ulang */
        .fade-in {
            animation: fadeInAnimation 1s ease-out;
        }
        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @keyframes slideDownAnimation {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        // Menangkap peristiwa refresh dan menambahkan kelas animasi
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.container');
            container.classList.add('fade-in');
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
              include("php/config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                    header("Location: home.php");
                    exit();
                }else{
                    echo "<div class='message'>
                      <p>Password Salah</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Kembali</button></a>";
                }
              }else{
            ?>
            <header class="header">Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Belum Punya Akun? <a href="register.php">Buat</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
