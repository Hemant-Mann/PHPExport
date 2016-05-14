# PHPExport #

## Description
It is library built in PHP to export data from the database to MSWord, ODT, and XML files.
The process to make docx and odt files is tricky but with a little help it can be understood

### Setup
```bash
git clone https://github.com/Hemant-Mann/PHPExport.git

# Linux users you need to install 'php5-xsl' extension to export data in WORD Files
sudo apt-get install php5-xsl  # For Ubuntu Users
```
- Import the examples/includes/products.sql into your local database.
- Setup credentials in examples/includes/db.php
- Below is a test code. Run in browser. (More usage see 'examples')

```php
<?php

require_once 'Exporter.php';	// autoloader
require_once 'examples/includes/products_mysqli.php';

try {
	// pass custom options for downloading
	$options['suppress'] = 'image';
	$options['labelcase'] = 'strtoupper';
	new Text($result, 'products.txt', $options); // this will output the download file
	// named 'products.txt'
} catch (Exception $e) {
	$error = $e->getMessage();
}

```
