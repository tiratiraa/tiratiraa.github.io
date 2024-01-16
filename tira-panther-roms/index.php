<?php
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
