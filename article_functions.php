<?php

function add_comment($conn, $article_id, $user_id, $comment_text) {
    $stmt = $conn->prepare("INSERT INTO comments (article_id, user_id, comment_text) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $article_id, $user_id, $comment_text);
    return $stmt->execute();
}

function get_comments($conn, $article_id, $limit = null) {
    $sql = "SELECT c.*, u.username 
            FROM comments c 
            JOIN users u ON c.user_id = u.user_id 
            WHERE c.article_id = ? 
            ORDER BY c.timestamp DESC";

    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    return $stmt->get_result();
}


function count_comments($conn, $article_id)
{
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM comments WHERE article_id = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()['count'];
}

function count_article_comments($conn, $article_id) {
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM comments WHERE article_id = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()['count'];
}

function count_all_comments($conn) {
    $result = $conn->query("SELECT COUNT(*) as count FROM comments");
    return $result->fetch_assoc()['count'];
}

function delete_comment($conn, $comment_id, $user_id = null, $is_admin = false) {
    if ($is_admin) {
        $stmt = $conn->prepare("DELETE FROM comments WHERE comment_id = ?");
        $stmt->bind_param("i", $comment_id);
    } else {
        $stmt = $conn->prepare("DELETE FROM comments WHERE comment_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $comment_id, $user_id);
    }
    return $stmt->execute();
}
function get_all_comments($conn, $limit = null) {
    $sql = "SELECT c.*, a.title as article_title, u.username 
            FROM comments c
            JOIN articles a ON c.article_id = a.article_id
            JOIN users u ON c.user_id = u.user_id
            ORDER BY c.timestamp DESC";

    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }

    return $conn->query($sql);
}

function get_comment($conn, $comment_id) {
    $stmt = $conn->prepare("SELECT c.*, a.title as article_title, u.username 
                           FROM comments c
                           JOIN articles a ON c.article_id = a.article_id
                           JOIN users u ON c.user_id = u.user_id
                           WHERE c.comment_id = ?");
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

?>
