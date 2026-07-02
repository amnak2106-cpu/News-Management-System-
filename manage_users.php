<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/article_functions.php';

check_permission('admin');

// حذف مقال
if (isset($_GET['delete'])) {
    if (delete_article($conn, $_GET['delete'])) {
        $_SESSION['message'] = "تم حذف المقال بنجاح.";
    } else {
        $_SESSION['error'] = "حدث خطأ أثناء حذف المقال.";
    }
    header("Location: manage_articles.php");
    exit();
}

$articles = get_all_articles($conn);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة المقالات</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { direction: rtl; text-align: right; }
        .form-group { margin-bottom: 15px; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { margin-top: 10px; }
    </style>
</head>
<body>
    
    <div class="admin-container">
        <?php include __DIR__ . '/sidebar.php'; ?>
        
        <main class="admin-content">
            <h2>إدارة المقالات</h2>
            
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            
            <a href="add_article.php" class="btn btn-primary">
                <i class="fas fa-plus"></i> إضافة مقال جديد
            </a>
            
            <div class="table-responsive">
                <table class="articles-table">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>القسم</th>
                            <th>المؤلف</th>
                            <th>تاريخ الإنشاء</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($article = $articles->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($article['title']) ?></td>
                            <td><?= htmlspecialchars($article['category_name']) ?></td>
                            <td><?= htmlspecialchars($article['username']) ?></td>
                            <td><?= date('Y-m-d', strtotime($article['published_date'])) ?></td>
                            <td class="actions">
                                <a href="edit_article.php?id=<?= $article['article_id'] ?>" class="btn btn-sm btn-outline">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>
                                <a href="?delete=<?= $article['article_id'] ?>" class="btn btn-sm btn-danger" 
                                   onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')">
                                    <i class="fas fa-trash"></i> حذف
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    
</body>
</html>
