# Markdown Splitter

This project is a Markdown splitter that divides Markdown content based on different heading levels. It provides functionality to output the split sections for easier management and navigation of Markdown documents.

## Project Structure

```
markdown-spliter
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

1. Prepare your Markdown text.
2. Use the `index.php` file to input your Markdown content.
3. The application will process the input and split it based on the heading levels defined in the Markdown.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.