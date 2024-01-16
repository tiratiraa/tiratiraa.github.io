<?php
// Define the username and password
$valid_username = 'root';
$valid_password = 'root';

// Check if the user has provided credentials
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || 
    $_SERVER['PHP_AUTH_USER'] !== $valid_username || $_SERVER['PHP_AUTH_PW'] !== $valid_password) {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required.';
    exit;
}

// If authentication is successful, proceed to show the contents

$folderPath = __DIR__; // The path to the current directory

// Get all files in the directory
$files = scandir($folderPath);

// Remove "." and ".." from the list
$files = array_diff($files, array('.', '..'));

// Output HTML for file listing and download links
echo '<ul>';
foreach ($files as $file) {
    echo '<li><a href="' . $file . '" download>' . $file . '</a></li>';
}
echo '</ul>';
?>
