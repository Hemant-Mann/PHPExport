<?php
require_once '../Exporter.php'; /* Autoloader */
require_once 'includes/products_mysqli.php';
use PHPExport\Exporter\Xml as Xml;
use PHPExport\Exporter\MsWord as MsWord;

if (isset($_POST['download'])) {
    try {
        $options['stripNsplit'] = 'description';
        /* Generate XML from database result */
        $xml = new Xml($result, null, $options);

        $download = new MsWord($xml);
        $dir = __DIR__ . '/';
        
        /* The template created in word processor */
        $download->setDocTemplate($dir . 'output/word_template.docx');
        
        /* The XSLT stylesheet extracted from word */
        $download->setXsltSource($dir . 'output/word.xslt');
        
        /* If there are any images in templates then set path of directory containing images */
        $download->setImageSource($dir . 'images');

        /* Merge XML and XSLT stylesheet to generate a new docx file (ZIP Archive) */
        $download->create('products.docx');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Products For Sale!</title>
<link href="styles/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <?php
        if (isset($error)) {
            echo "<p>$error</p>";
        } else { ?>
            <h1>Products</h1>
            <?php 
            while ($row = getRow($result)) { ?>
            <h2><?php echo $row['name']; ?></h2>
                <h3>Category: <?php echo $row['category']; ?></h3>
                <figure>
                    <img src="images/<?php echo $row['image']; ?>"
                        alt="<?php echo $row['name']; ?>">
                </figure>
                <p class="price">Rs. <?php echo $row['price']; ?></p>
            <?php echo $row['description']; ?>
            <hr>
            <?php } ?>
            <form method="post">
                <fieldset>
                    <legend>Download Results</legend>
                    <p>
                        <input type="submit" name="download" id="download" value="Download as Microsoft Word File">
                    </p>
                </fieldset>
            </form>
        <?php } ?>
    </div>
</body>
</html>