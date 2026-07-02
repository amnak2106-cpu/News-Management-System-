<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';

// فقط المشرف يمكنه الوصول لهذه الصفحة
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// جلب الإحصاءات للوحة التحكم
$users_count = $conn->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'];
$articles_count = $conn->query("SELECT COUNT(*) as count FROM articles")->fetch_assoc()['count'];
$comments_count = $conn->query("SELECT COUNT(*) as count FROM comments")->fetch_assoc()['count'];

?>

<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
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
            <h2>مرحبًا بك في لوحة التحكم</h2>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #4CAF50;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <h3>المستخدمون</h3>
                        <p><?php echo $users_count; ?></p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #2196F3;">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-info">
                        <h3>المقالات</h3>
                        <p><?php echo $articles_count; ?></p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #FFC107;">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="stat-info">
                        <h3>التعليقات</h3>
                        <p><?php echo $comments_count; ?></p>
                    </div>
                </div>
            </div>

            <div class="recent-activity">
                <h3>أحدث المقالات</h3>
                <table>
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>القسم</th>
                            <th>تاريخ الإنشاء</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT a.*, c.category_name 
                            FROM articles a 
                            JOIN categories c ON a.category_id = c.category_id 
                            ORDER BY a.published_date DESC 
                            LIMIT 5";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()):
                        ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($row['published_date'])); ?></td>
                                <td>
                                    <a href="../article.php?id=<?php echo $row['article_id']; ?>" class="btn btn-sm" target="_blank">عرض</a>
                                    <a href="edit_article.php?id=<?php echo $row['article_id']; ?>" class="btn btn-sm btn-outline">تعديل</a>
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
