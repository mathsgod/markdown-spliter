<?php

function parseMarkdownHeaders($markdown) {
    $lines = explode("\n", $markdown);
    $headers = [];

    foreach ($lines as $line) {
        if (preg_match('/^(#+)\s+(.*)$/', $line, $matches)) {
            $level = strlen($matches[1]);
            $title = trim($matches[2]);
            $headers[] = ['level' => $level, 'title' => $title];
        }
    }

    return $headers;
}

function extractContentByHeaderLevel($markdown, $level) {
    $lines = explode("\n", $markdown);
    $contentSections = [];
    $currentSection = [];
    $currentLevel = 0;

    foreach ($lines as $line) {
        if (preg_match('/^(#+)\s+(.*)$/', $line, $matches)) {
            if ($currentSection) {
                $contentSections[] = implode("\n", $currentSection);
                $currentSection = [];
            }
            $currentLevel = strlen($matches[1]);
        }
        $currentSection[] = $line;
    }

    if ($currentSection) {
        $contentSections[] = implode("\n", $currentSection);
    }

    return array_filter($contentSections, function($section) use ($level) {
        return preg_match('/^(#+)\s+/', $section, $matches) && strlen($matches[1]) === $level;
    });
}

function splitMarkdown($markdown) {
    $headers = parseMarkdownHeaders($markdown);
    $sections = [];

    foreach ($headers as $header) {
        $sections[$header['title']] = extractContentByHeaderLevel($markdown, $header['level']);
    }

    return $sections;
}