<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/comment_functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$article_id = (int)$_POST['article_id'];
$user_id = (int)$_SESSION['user_id'];
$comment_text = trim($_POST['comment_text']);

if (empty($comment_text)) {
    $_SESSION['comment_error'] = "يجب كتابة نص التعليق.";
    header("Location: article.php?id=$article_id");
    exit();
}

if (add_comment($conn, $article_id, $user_id, $comment_text)) {
    $_SESSION['comment_success'] = "تم إضافة التعليق بنجاح.";
} else {
    $_SESSION['comment_error'] = "حدث خطأ أثناء إضافة التعليق.";
}

header("Location: article.php?id=$article_id");
exit();
?>
