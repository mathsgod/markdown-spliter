<?php

require_once 'src/MarkdownSplitter.php';

// Check if Markdown content is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['markdown'])) {
    $markdownContent = $_POST['markdown'];

    $splitter = new MarkdownSplitter($markdownContent);
    $splitter->split();
    $sections = $splitter->getSections();

    foreach ($sections as $section) {
        echo '<h2>[' . $section['level'] . '] ' . htmlspecialchars($section['title']) . '</h2>';
        echo '<div>' . nl2br(htmlspecialchars($section['content'])) . '</div>';
    }
} else {
    // Display a simple form to submit Markdown content
    echo '<form method="POST">';
    echo '<textarea name="markdown" rows="10" cols="50" placeholder="Enter your Markdown content here..."></textarea><br>';
    echo '<input type="submit" value="Split Markdown">';
    echo '</form>';
}
?>