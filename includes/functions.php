<?php
function sanitize_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function isLoggedIn() {
    if (isset($_SESSION['username'])) {
        return true;
    }
    return false;
}
?>
