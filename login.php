<?php
require_once 'includes/config.php';

if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$category_id = (int)$_GET['id'];
$sql = "SELECT category_name FROM categories WHERE category_id = $category_id";
$result = $conn->query($sql);
$category = $result->fetch_assoc();

if(!$category) {
    header("Location: index.php");
    exit();
}

require_once 'includes/header.php';
?>

<section class="category-news">
    <h2>أخبار <?= htmlspecialchars($category['category_name']) ?></h2>
    <div class="articles-grid">
        <?php
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 6;
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM articles WHERE category_id = $category_id ORDER BY published_date DESC LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()):
                // المسار الصحيح للصورة
                $image_path = 'uploads/' . basename($row['image_url']);
        ?>
        <article class="article-card">
            <img src="<?= $image_path ?>" alt="<?= htmlspecialchars($row['title']) ?>">
            <div class="article-content">
                <h3><a href="article.php?id=<?= $row['article_id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h3>
                <p><?= mb_substr($row['content'], 0, 100).'...' ?></p>
                <div class="article-meta">
                    <span class="date"><?= date('Y-m-d', strtotime($row['published_date'])) ?></span>
                </div>
            </div>
        </article>
        <?php
            endwhile;
        } else {
            echo '<p>لا توجد مقالات في هذا القسم حتى الآن.</p>';
        }
        ?>
    </div>
    
    <?php
    // Pagination
    $sql = "SELECT COUNT(*) as total FROM articles WHERE category_id = $category_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row['total'] / $limit);

    if($total_pages > 1):
    ?>
    <div class="pagination">
        <?php if($page > 1): ?>
            <a href="category.php?id=<?= $category_id ?>&page=<?= $page-1 ?>">السابق</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $total_pages; $i++): ?>
            <a href="category.php?id=<?= $category_id ?>&page=<?= $i ?>" <?php if($i == $page) echo 'class="active"'; ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if($page < $total_pages): ?>
            <a href="category.php?id=<?= $category_id ?>&page=<?= $page+1 ?>">التالي</a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</section>

<?php
require_once 'includes/footer.php';
?>
