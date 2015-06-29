# Output #
Contains files necessary for building a .docx file from 'Exporter' library
Directory Structure:
- word_template.php =>
Basic template format for the data storage
- word_extract.php =>
Which extracts the xslt file from word_template.docx
- word.xslt =>
Used to filter or merge XML documents
- document.xml =>
The file which is extracted from template and then edited to contain placeholders for other XML documents i.e. word.xslt.
You can compare both files to see the difference