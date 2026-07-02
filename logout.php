<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/comment_functions.php';

if (!isset($_GET['id']) || !isset($_GET['article_id']) || !isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$comment_id = (int)$_GET['id'];
$article_id = (int)$_GET['article_id'];
$is_admin = ($_SESSION['role'] === 'admin');

if (delete_comment($conn, $comment_id, $_SESSION['user_id'], $is_admin)) {
    $_SESSION['comment_success'] = "تم حذف التعليق بنجاح.";
} else {
    $_SESSION['comment_error'] = "لا يمكن حذف هذا التعليق أو حدث خطأ ما.";
}

header("Location: article.php?id=$article_id");
exit();
?>
