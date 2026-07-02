<?php
require_once 'includes/config.php';
require_once 'includes/comment_functions.php';

if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$article_id = (int)$_GET['id'];
$sql = "SELECT a.*, u.username, c.category_name 
        FROM articles a 
        JOIN categories c ON a.category_id = c.category_id 
        LEFT JOIN users u ON a.author_id = u.user_id 
        WHERE a.article_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

if(!$article) {
    header("Location: index.php");
    exit();
}

$comments = get_comments($conn, $article_id);
$comments_count = count_comments($conn, $article_id);

require_once 'includes/header.php';
?>

<section class="single-article">
    <div class="article-header">
        <span class="category"><?php echo $article['category_name']; ?></span>
        <h1><?php echo $article['title']; ?></h1>
        <div class="article-meta">
            <?php if($article['username']): ?>
                <span class="author">بواسطة: <?php echo $article['username']; ?></span>
            <?php endif; ?>
            <span class="date"><?php echo date('Y-m-d H:i', strtotime($article['published_date'])); ?></span>
        </div>
    </div>
    
    <div class="article-image">
        <img src="<?php echo $article['image_url']; ?>" alt="<?php echo $article['title']; ?>">
    </div>
    
    <div class="article-content">
        <?php echo nl2br($article['content']); ?>
    </div>
    
    <div class="article-tags">
        <span>الوسوم:</span>
        <a href="#">أخبار</a>
        <a href="#"><?php echo $article['category_name']; ?></a>
    </div>
    
    <div class="article-share">
        <span>شارك المقالة:</span>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
    </div>
</section>

<section class="comments-section">
    <h3>التعليقات (<?= $comments_count ?>)</h3>
    
    <?php if(isset($_SESSION['comment_success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['comment_success'] ?></div>
        <?php unset($_SESSION['comment_success']); ?>
    <?php endif; ?>
    
    <?php if(isset($_SESSION['comment_error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['comment_error'] ?></div>
        <?php unset($_SESSION['comment_error']); ?>
    <?php endif; ?>
    
    <?php if(isset($_SESSION['user_id'])): ?>
    <div class="add-comment">
        <form action="post_comment.php" method="POST">
            <input type="hidden" name="article_id" value="<?= $article_id ?>">
            <textarea name="comment_text" placeholder="أضف تعليق..." required></textarea>
            <button type="submit" class="btn btn-primary">أرسل التعليق</button>
        </form>
    </div>
    <?php else: ?>
    <p class="login-to-comment">يجب عليك <a href="login.php">تسجيل الدخول</a> لإضافة تعليق</p>
    <?php endif; ?>
    
    <div class="comments-list">
        <?php if($comments->num_rows > 0): ?>
            <?php while($comment = $comments->fetch_assoc()): ?>
            <div class="comment" id="comment-<?= $comment['comment_id'] ?>">
                <div class="comment-header">
                    <span class="comment-author"><?= htmlspecialchars($comment['username']) ?></span>
                    <span class="comment-date"><?= date('Y-m-d H:i', strtotime($comment['timestamp'])) ?></span>
                    
                    <?php if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $comment['user_id'] || $_SESSION['role'] == 'admin')): ?>
                    <div class="comment-actions">
                        <?php if($_SESSION['user_id'] == $comment['user_id'] || $_SESSION['role'] == 'admin'): ?>
                            <a href="delete_comment.php?id=<?= $comment['comment_id'] ?>&article_id=<?= $article_id ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا التعليق؟')">
                                <i class="fas fa-trash"></i> حذف
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="comment-content">
                    <?= nl2br(htmlspecialchars($comment['comment_text'])) ?>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>لا توجد تعليقات حتى الآن.</p>
        <?php endif; ?>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>
