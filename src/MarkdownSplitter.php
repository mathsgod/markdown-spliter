<?php

class MarkdownSplitter {
    private $markdownContent;
    private $sections = [];

    public function __construct($markdownContent) {
        $this->markdownContent = $markdownContent;
    }

    public function split() {
        $lines = explode("\n", $this->markdownContent);
        $headers = [];
        // Collect header positions
        foreach ($lines as $i => $line) {
            if (preg_match('/^(#+)\s+(.*)$/', $line, $matches)) {
                $headers[] = [
                    'level' => strlen($matches[1]),
                    'title' => trim($matches[2]),
                    'line' => $i
                ];
            }
        }

        // Always add level 0 section (whole content)
        $this->sections[] = [
            'level' => 0,
            'title' => '',
            'content' => trim($this->markdownContent)
        ];

        if (empty($headers)) {
            return;
        }

        // For each header, extract content until next same/higher level header
        for ($i = 0; $i < count($headers); $i++) {
            $start = $headers[$i]['line'];
            $level = $headers[$i]['level'];
            $title = $headers[$i]['title'];
            $end = count($lines);
            for ($j = $i + 1; $j < count($headers); $j++) {
                if ($headers[$j]['level'] <= $level) {
                    $end = $headers[$j]['line'];
                    break;
                }
            }
            // Content is everything after header line up to $end (exclusive)
            $contentLines = array_slice($lines, $start + 1, $end - $start - 1);
            $content = implode("\n", $contentLines);
            $this->sections[] = [
                'level' => $level,
                'title' => $title,
                'content' => trim($content)
            ];
        }
    }

    public function getSections() {
        return $this->sections;
    }
}
