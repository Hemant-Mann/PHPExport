<?php
/**
 * The template containing format for the data
 */
$sourcefile = 'word_template.docx';

/**
 * Convert xml file to xslt stylesheet
 * XSLT => Extensible Stylesheet Transformation Language
 * We will edit this file to serve as a placeholder while merging
 */
$xslt = 'word.xslt';

$zip = new ZipArchive();
$zip->open($sourcefile);	/* .docx file can be treated like a ZIP archive */
$content = $zip->getFromName('word/document.xml');
if (file_put_contents($xslt, $content)) {
	echo 'Main content extracted<br>';
} else {
	echo 'Problem extracting main content';
}

$zip->close();