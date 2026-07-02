<?php
require_once 'includes/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

unset($_SESSION['error']);
unset($_SESSION['success']);

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    if(empty($username)) {
        $errors[] = "اسم المستخدم مطلوب.";
    } elseif(strlen($username) < 4) {
        $errors[] = "يجب أن يكون اسم المستخدم على الأقل 4 أحرف.";
    }
    
    if(empty($email)) {
        $errors[] = "البريد الإلكتروني مطلوب.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "البريد الإلكتروني غير صالح.";
    }
    
    if(empty($password)) {
        $errors[] = "كلمة المرور مطلوبة.";
    } elseif(strlen($password) < 6) {
        $errors[] = "يجب أن تكون كلمة المرور على الأقل 6 أحرف.";
    }
    
    if($password !== $confirm_password) {
        $errors[] = "كلمتا المرور غير متطابقتين.";
    }
    
    if(empty($errors)) {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0) {
            $errors[] = "اسم المستخدم أو البريد الإلكتروني موجود بالفعل.";
        }
    }
    
    if(empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        
        if($stmt->execute()) {
            $_SESSION['success'] = "تم تسجيل الحساب بنجاح. يمكنك تسجيل الدخول الآن.";
            header("Location: login.php");
            exit();
        } else {
            $errors[] = "حدث خطأ أثناء عملية التسجيل. يرجى المحاولة مرة أخرى.";
        }
    }
}

require_once 'includes/header.php';
?>

<section class="auth-form">
    <h2>تسجيل حساب جديد</h2>
    
    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <form action="register.php" method="POST">
        <div class="form-group">
            <label for="username">اسم المستخدم</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">تأكيد كلمة المرور</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-block">تسجيل</button>
    </form>
    
    <div class="auth-links">
        <p>هل لديك حساب بالفعل؟ <a href="login.php">تسجيل الدخول</a></p>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>
