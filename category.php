<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<style>
    body {
        direction: rtl;
        text-align: right;
        font-family: "Tahoma", Arial, sans-serif;
    }
</style>

<section class="breaking-news">
    <h2>الأخبار العاجلة</h2>
    <div class="breaking-news-slider">
        <?php
        $sql = "SELECT * FROM articles ORDER BY published_date DESC LIMIT 5";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()):
            // اسم الصورة فقط
            $image_path = 'uploads/' . basename($row['image_url']);
            // جلب اسم التصنيف بالعربي
            $cat_sql = "SELECT category_name FROM categories WHERE category_id = ".$row['category_id'];
            $cat_result = $conn->query($cat_sql);
            $cat_row = $cat_result->fetch_assoc();
        ?>
        <div class="breaking-news-item">
            <img src="<?= $image_path ?>" alt="صورة الخبر: <?= htmlspecialchars($row['title']) ?>">
            <div class="breaking-news-content">
                <span class="category">التصنيف: <?= htmlspecialchars($cat_row['category_name']) ?></span>
                <h3><a href="article.php?id=<?= $row['article_id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h3>
                <p><?= mb_substr($row['content'], 0, 150).'...' ?></p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="featured-articles">
    <h2>مقالات مختارة</h2>
    <div class="articles-grid">
        <?php
        $sql = "SELECT * FROM articles ORDER BY published_date DESC LIMIT 6";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()):
            $image_path = 'uploads/' . basename($row['image_url']);
            $cat_sql = "SELECT category_name FROM categories WHERE category_id = ".$row['category_id'];
            $cat_result = $conn->query($cat_sql);
            $cat_row = $cat_result->fetch_assoc();
        ?>
        <article class="article-card">
            <img src="<?= $image_path ?>" alt="صورة المقال: <?= htmlspecialchars($row['title']) ?>">
            <div class="article-content">
                <span class="category">التصنيف: <?= htmlspecialchars($cat_row['category_name']) ?></span>
                <h3><a href="article.php?id=<?= $row['article_id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h3>
                <p><?= mb_substr($row['content'], 0, 100).'...' ?></p>
                <div class="article-meta">
                    <span class="date">تاريخ النشر: <?= date('Y-m-d', strtotime($row['published_date'])) ?></span>
                </div>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
</section>

<section class="latest-news">
    <h2>آخر الأخبار</h2>
    <div class="news-list">
        <?php
        $sql = "SELECT * FROM articles ORDER BY published_date DESC LIMIT 10";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()):
            $image_path = 'uploads/' . basename($row['image_url']);
            $cat_sql = "SELECT category_name FROM categories WHERE category_id = ".$row['category_id'];
            $cat_result = $conn->query($cat_sql);
            $cat_row = $cat_result->fetch_assoc();
        ?>
        <div class="news-item">
            <div class="news-image">
                <img src="<?= $image_path ?>" alt="صورة الخبر: <?= htmlspecialchars($row['title']) ?>">
            </div>
            <div class="news-content">
                <h3><a href="article.php?id=<?= $row['article_id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h3>
                <p><?= mb_substr($row['content'], 0, 200).'...' ?></p>
                <div class="news-meta">
                    <span class="category">التصنيف: <?= htmlspecialchars($cat_row['category_name']) ?></span>
                    <span class="date">تاريخ النشر: <?= date('Y-m-d', strtotime($row['published_date'])) ?></span>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<aside class="sidebar">
    <div class="trending-news">
        <h3>الأكثر قراءة</h3>
        <ul>
            <?php
            $sql = "SELECT * FROM articles ORDER BY RAND() LIMIT 5";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()):
                $image_path = 'uploads/' . basename($row['image_url']);
            ?>
            <li>
                <a href="article.php?id=<?= $row['article_id'] ?>"><?= htmlspecialchars($row['title']) ?></a>
                <span class="trending-date">تاريخ النشر: <?= date('Y-m-d', strtotime($row['published_date'])) ?></span>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</aside>

<?php
require_once 'includes/footer.php';
?>
