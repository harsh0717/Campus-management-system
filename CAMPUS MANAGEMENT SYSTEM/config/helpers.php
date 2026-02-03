<?php
function getUserId() {
    return $_SESSION['user_id'] ?? null;
}
