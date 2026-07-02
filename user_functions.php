<?php
function format_date($timestamp) {
    return date('Y-m-d H:i', strtotime($timestamp));
}

function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function check_permission($required_role) {
    if ($_SESSION['role'] !== $required_role) {
        header("Location: /news/admin/dashboard.php");
        exit();
    }
}
?>