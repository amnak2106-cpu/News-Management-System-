<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $subject = sanitize_input($_POST['subject']);
    $message = sanitize_input($_POST['message']);
    
    $success = true; 
    
    if ($success) {
        $_SESSION['contact_message'] = "Thank you! Your message has been received and we'll contact you soon.";
        header("Location: contact.php");
        exit();
    } else {
        $error = "An error occurred while sending your message. Please try again.";
    }
}

require_once 'includes/header.php';
?>
<style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    width: 85%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

h1, h2, h3 {
    color: #2c3e50;
}

.btn {
    display: inline-block;
    background: #3498db;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.btn:hover {
    background: #2980b9;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
}

/* About Us Page Specific Styles */
.about-section {
    padding: 50px 0;
    background-color: #f9f9f9;
}

.about-content {
    display: flex;
    gap: 30px;
    margin-bottom: 40px;
    align-items: center;
}

.about-image {
    flex: 1;
    min-width: 300px;
}

.about-image img {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.about-text {
    flex: 1;
}

.about-text h2 {
    margin-top: 20px;
    color: #3498db;
}

.team-members {
    margin-top: 50px;
    text-align: center;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.team-member {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.team-member:hover {
    transform: translateY(-5px);
}

.team-member img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
    border: 3px solid #3498db;
}

/* Contact Us Page Specific Styles */
.contact-section {
    padding: 50px 0;
    background-color: #f9f9f9;
}

.contact-container {
    display: flex;
    gap: 40px;
    margin-top: 30px;
}

.contact-info, .contact-form {
    flex: 1;
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.info-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.info-item i {
    margin-right: 15px;
    color: #3498db;
    font-size: 1.2rem;
    width: 20px;
    text-align: center;
}

.social-media {
    margin-top: 40px;
}

.social-icons {
    display: flex;
    gap: 15px;
    margin-top: 15px;
}

.social-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #f1f1f1;
    border-radius: 50%;
    color: #333;
    transition: all 0.3s;
}

.social-icons a:hover {
    background: #3498db;
    color: white;
}

.contact-form .form-group {
    margin-bottom: 20px;
}

.contact-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-family: inherit;
}

.contact-form textarea {
    min-height: 150px;
    resize: vertical;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .about-content, .contact-container {
        flex-direction: column;
    }
    
    .about-image {
        margin-bottom: 30px;
    }
    
    .contact-info {
        margin-bottom: 30px;
    }
}
</style>
<section class="contact-section">
    <div class="container">
        <h1>اتصل بنا</h1>
        
        <div class="contact-container">
            <div class="contact-info">
                <h2>معلومات الاتصال</h2>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>شارع الصحافة، الرياض، المملكة العربية السعودية</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <p>+966 12 345 6789</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <p>info@news-site.com</p>
                </div>
                
                <div class="social-media">
                    <h3>تابعنا</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <h2>أرسل لنا رسالة</h2>
                
                <?php if (isset($_SESSION['contact_message'])): ?>
                    <div class="alert alert-success"><?= $_SESSION['contact_message'] ?></div>
                    <?php unset($_SESSION['contact_message']); ?>
                <?php endif; ?>
                
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="form-group">
                        <label for="name">الاسم الكامل</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">الموضوع</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">رسالة</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">ارسال الرسالة</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>