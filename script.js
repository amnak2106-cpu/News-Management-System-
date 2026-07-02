<?php
require_once 'includes/config.php';
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
contact-form textarea,
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
<section class="about-section">
    <div class="container">
        <h1>من نحن</h1>
        
        <div class="about-content">
            <div class="about-image">
                <img src="uploads/11.jpeg" alt="فريقنا">
            </div>
            
            <div class="about-text">
                <h2>رسالتنا</h2>
                <p>
                    نحن منصة إخبارية مستقلة ملتزمة بتقديم أخبار موثوقة وموضوعية لتلبية احتياجات قرائنا. نؤمن بحرية الصحافة ونسعى للالتزام بالمعايير المهنية والدقة في نقل المعلومات.
                </p>
                
                <h2>رؤيتنا</h2>
                <p>
                    أن نصبح المصدر الأول للأخبار الموثوقة في المنطقة ومنصة للحوار البنّاء والتفاعل الإيجابي بين القراء والمجتمع.
                </p>
                
                <h2>فريقنا</h2>
                <p>
                    يتكون فريقنا من صحفيين ومحررين محترفين يتمتعون بخبرة واسعة في مجال الصحافة والإعلام.
                </p>
            </div>
        </div>
        
        <div class="team-members">
            <h2>تعرف على فريقنا</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="uploads/man (1).png" alt="عضو الفريق">
                    <h3>أحمد محمد</h3>
                    <p>رئيس التحرير</p>
                </div>
                <div class="team-member">
                    <img src="uploads/woman.png" alt="عضو الفريق">
                    <h3>سارة علي</h3>
                    <p>مراسلة أخبار</p>
                </div>
                <div class="team-member">
                    <img src="uploads/man.png" alt="عضو الفريق">
                    <h3>خالد حسن</h3>
                    <p>محرر تقني</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>
