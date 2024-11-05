<?php
session_start();
require_once 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // cari pengguna dari email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Jika pengguna ditemukan, simpan ke session dan arahkan ke halaman utama
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit();
    } else {
        $error = "wah, kamu belum daftar akun nih!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .login {
        min-height: 100vh;
    }

    .bg-image {
        background-image: url('https://images.unsplash.com/photo-1730320047161-10b0352bde32?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
    }

    .login-heading {
        font-weight: 300;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }
    </style>
</head>
<body>
<div class="container ps-md-0 mt-5 mb-5">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image rounded"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Login here</h3>
                                <?php if (isset($error)) echo "<p>$error</p>"; ?>

                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email :</label>
                                        <input type="email" class="form-control" id="email" placeholder="Masukan Email disini"
                                            name="email" style="border-color: black;">
                                    </div>
                                    <button type="submit" name="btn" class="btn btn-dark text-dark" style="background-color: #A79277;">Submit</button>
                                    <p class="mt-3">Don't have an account? <a href="signup.php" class="text-dark">Sign up here</a></p>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- <h2>Login</h2> -->
     <!-- eror awal -->
    
    <!-- <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>
        <button type="submit">Login</button>
        <p class="mt-3">Don't have an account? <a href="signup.php">Sign up here</a></p>
    </form> -->
</body>
</html>