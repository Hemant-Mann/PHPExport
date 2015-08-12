<?php
namespace PHPExport\Exporter;

/**
 * Exports a database result to a local or download CSV file.
 * 
 * Accepts both MySQL Improved and PDO database results.
 * Requires PHP Version 5.3 or later
 *
 * @version 1.0.0
 * @author Hemant Mann
 * @license http://opensource.org/licenses/MIT MIT
 */
class Csv extends Base
{
	/**
	 * @var string Name of output file (default: download.csv)
	 */
    protected $filename = 'download.csv';
    
    /**
     * @var bool Flag that determines whether to use column names as headers (default: true)
     */
	protected $columnHeaders = true;
	
	/**
	 * @var string Delimiter character between fields in CSV output (default: comma)
	 */
	protected $delimiter = ',';
	
	/**
	 * @var string Character to enclose fields in CSV output (default: double quotes)
	 */
	protected $enclosure = '"';
	
	/**
	 * @var string MIME type of output file
	 */
	protected $fileType = 'text/csv';
	
	/**
	 * This is the class's only public method.
	 * 
	 * It takes the database result and generates the output file.
	 * Only the first argument, the database result, is required.
	 * 
	 * To save the file to the web server's local file system, set
	 * the local option to true. The filename can be a relative or
	 * absolute path. If no path is specified, the file is saved in
	 * the same directory as the script that calls the class.
	 * 
	 * To exclude specific fields from the output, set the suppress
	 * option to a comma-separated list of column names to be skipped.
	 * 
	 * The other options allow you to omit the column names as a header
	 * row (by setting headers to false), and to change the delimiter
	 * and enclosure characters.
	 * 
	 * @param \mysqli_result | \PDOStatement $dbResult Database result
	 * @param string $filename Name of output file
	 * @param array $options Output options
	 * @throws \Exception
	 */
	public function __construct(
	    $dbResult,
	    $filename = 'download.csv',
		$options = array(
		    'local' => false,
		    'suppress' => null,
		    'headers' => true,
			'delimiter' => ',',
			'enclosure' => '"'
	    )
	) {
		parent::__construct($dbResult, $filename, $options);
		$this->filename = $filename;
		if (isset($options['headers'])) {
		    $this->columnHeaders = $options['headers'];
		}
		if (isset($options['delimiter'])) {
			if (strlen($options['delimiter']) != 1) {
				throw new \Exception('The delimiter must be a single character ("\t" counts as a single tab character).');
			}
		    $this->delimiter = $options['delimiter'];
		}
		if (isset($options['enclosure'])) {
			if (strlen($options['enclosure']) != 1) {
				throw new \Exception('The enclosure must be a single character.');
			}
		    $this->enclosure = $options['enclosure'];
		}
		$this->generate();
	}
	
	/**
	 * Generates the output file.
	 * 
	 * Throws an exception if a local file cannot be opened for writing.
	 * When writing to a local file, the number of bytes written is 
	 * returned. This can be used as a boolean to report success or failure.
	 *
	 * @throws \Exception
	 * @return boolean
	 */
	protected function generate()
	{
		if (!$this->local) {
	        $this->outputHeaders();
	        $csvoutput = fopen('php://output', 'w');
		} else {
		    $csvoutput = @fopen($this->filename, 'w');
		    if (!$csvoutput) {
		        throw new \Exception('Cannot write to ' . $this->filename);
		    }
		}
		if ($this->columnHeaders) {
	        $row = $this->getRow();
			if ($this->suppress) {
				$row = $this->removeSuppressedColumns($row);
			}
	        $headers = array_keys($row);
	        fputcsv($csvoutput, $headers, $this->delimiter, $this->enclosure);
			fputcsv($csvoutput, $row, $this->delimiter, $this->enclosure);
		}
	    while ($row = $this->getRow()) {
			if ($this->suppress) {
				$row = $this->removeSuppressedColumns($row);
			}
		    fputcsv($csvoutput, $row, $this->delimiter, $this->enclosure);
		}
	    $done = fclose($csvoutput);
	    if ($this->local) {
	        return $done;
	    }
	    exit;
	}
	
}
