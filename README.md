# Markdown Splitter

This project is a Markdown splitter that divides Markdown content based on different heading levels. It provides functionality to output the split sections for easier management and navigation of Markdown documents.

## Project Structure

```
markdown-splitter
├── src
│   ├── MarkdownSplitter.php        # Handles the logic for splitting Markdown files based on heading levels.
│   └── utils
│       └── markdown_helper.php  # Contains helper functions for processing Markdown text.
├── index.php               # Entry point of the application, receives input Markdown text and calls splitter functions.
├── composer.json           # Composer configuration file listing project dependencies and autoload settings.
└── README.md               # Documentation for the project, explaining how to use the Markdown splitter and its features.
```

## Installation

To install the project, clone the repository and run the following command to install the dependencies:

```
composer install
```

## Usage

### Using the MarkdownSplitter class in your code

You can use the `MarkdownSplitter` class directly in your PHP code to split Markdown content by heading levels. Example:

```php
require_once 'src/MarkdownSplitter.php';

$markdownContent = <<<MD
# Heading 1
Content under heading 1

## Heading 2
Content under heading 2

### Heading 3
Content under heading 3
MD;

$splitter = new MarkdownSplitter($markdownContent);
$splitter->split();
$sections = $splitter->getSections();

foreach ($sections as $section) {
    echo "Level: {$section['level']}\n";
    echo "Title: {$section['title']}\n";
    echo "Content:\n{$section['content']}\n";
    echo "----------------------\n";
}
```

- `level`: The heading level (1 for `#`, 2 for `##`, etc.)
- `title`: The heading text
- `content`: The content under the heading

### Using the web interface

You can also use the provided `index.php` to split Markdown via a simple web form. Open `index.php` in your browser, paste your Markdown content, and submit the form to see the split results.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.