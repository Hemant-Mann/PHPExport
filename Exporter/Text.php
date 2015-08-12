<?php
namespace PHPExport\Exporter;

/**
 * Text class to export a database result to a local or download
 * file. Accepts both MySQL Improved and PDO database results.
 *  
 * Requires PHP Version 5.3 or later
 *
 * @version 1.0.0
 * @author Hemant Mann
 * @license http://opensource.org/licenses/MIT MIT
 */
class Text extends Base
{
	/**
	 * 
	 * @var string Name of the output file
	 */
    protected $filename = 'download.txt';
    
    /**
     * 
     * @var bool Determines whether column names are used as labels
     */
	protected $labels = true;
	
	/**
	 * 
	 * @var string Name of string function to format labels
	 */
	protected $format = 'ucfirst';
	
	/**
	 * 
	 * @var string MIME type of output file
	 */
	protected $fileType = 'text/plain';
	
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
	 * By default, column names are used as labels, and are formatted
	 * using the ucfirst() string function. The labelcase option can
	 * also be set to strtolower, strtoupper, or ucwords.
	 * 
	 * @param \mysqli_result | \PDOStatement $dbResult Database result
	 * @param string $filename Name of output file
	 * @param array $options List of options
	 */
	public function __construct(
	    $dbResult,
	    $filename = 'download.txt',
		$options = array(
		    'local'     => false,
		    'suppress'  => null,
			'labels'    => true,
			'labelcase' => 'ucfirst'
		)
    ) {
		parent::__construct($dbResult, $filename, $options);
		if (isset($options['labels'])) {
			$this->labels = $options['labels'];
		}
		if (isset($options['labelcase'])) {
			if (in_array(strtolower($options['labelcase']), array('ucfirst', 'strtolower', 'strtoupper', 'ucwords'))) {
				$this->format = strtolower($options['labelcase']);
			}
		}
		$this->generate();
	}
	
	/**
	 * Generates the output file.
	 * 
	 * Throws exception if local file cannot be opened for writing.
	 * 
	 * When writing to a local file, the number of bytes written
	 * is returned. This can be used to report success or failure.
	 * 
	 * @throws \Exception
	 * @return boolean
	 */
	protected function generate()
	{
		if (!$this->local) {
	        $this->outputHeaders();
		    $output = fopen('php://output', 'w');
		} else {
		    $output = @fopen($this->filename, 'w');
		    if (!$output) {
		        throw new \Exception('Cannot write to ' . $this->filename);
		    }
		}
		$formatLabel = $this->format;
		while ($row = $this->getRow()) {
			if ($this->suppress) {
				$row = $this->removeSuppressedColumns($row);
			}
			foreach ($row as $key => $value) {
				$key = $this->labels ? $formatLabel($key) . ': ' : '';
				fwrite($output, $key . "$value\r\n");
			}
			fwrite($output, "\r\n");
		}
		$done = fclose($output);
		if ($this->local) {
			return $done;
		}
		exit;
	}
	
}
