<?php
require_once '../Exporter.php'; /* Autoloader */
require_once 'includes/products_mysqli.php';
use PHPExport\Exporter\Xml as Xml;

if (isset($_POST['download'])) {
    try {
    	$options['download'] = true;
    	$options['stripNsplit'] = 'description';
    	new Xml($result, 'products.xml', $options);
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
}
?>
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
                <input type="submit" name="download" id="download" value="Download XML">
            </p>
        </fieldset>
    </form>
</div>
</body>
</html>