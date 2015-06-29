<?php
namespace Exporter;

/**
 * Provides common functionality for several Exporter classes.
 * 
 * Accepts both MySQL Improved and PDO database results.
 * Requires PHP Version 5.3 or later
 *
 * @version 1.0.0
 * @author Hemant Mann
 * @license http://opensource.org/licenses/MIT MIT
 */
class Base {
    /**
     * @var \mysqli_result | \PDOStatement Database result
     */
    protected $dbResult;
    
    /** 
     * @var string Name of output file
     */
    protected $filename;
    
    /**
     * @var string Identifies class of $dbResult
     */
	protected $resultType;
	
	/**
	 * @var array Array of column names to be omitted from output
	 */
	protected $suppress = array();
	
	/**
	 * @var bool Flag that determines whether to save the output to a local file
	 */
	protected $local = false;
	
	/**
	 * @var string MIME type of output file
	 */
	protected $fileType;
	
	
	/**
	 * @param \mysqli_result | \PDOStatement $dbResult Database result (required)
	 * @param string $filename Name of output file (optional)
	 * @param array $options Array of options (optional)
	 */
	public function __construct(
	    $dbResult, 
	    $filename = null, 
	    $options = array()
	) {
		$this->setResultType($dbResult);
		$this->filename = $filename;
		if (isset($options['suppress'])) {
			$this->buildSuppressedArray($options['suppress']);
		}
		if (isset($options['local'])) {
			$this->local = $options['local'];
		}
	}
	
	/**
	 * Sets the $resultType property.
	 * 
	 * Throws an exception if the value isn't a database resource of
	 * an expected type. 
	 * 
	 * @param unknown $result First argument passed to constructor
	 * @throws \Exception
	 */
	protected function setResultType($result) {
		$type = get_class($result);
		if ($type == 'mysqli_result') {
			$this->resultType = 'mysqli';
		} elseif ($type == 'PDOStatement') {
			$this->resultType = 'pdo';
		} else {
			throw new \Exception ('Database result must be either mysqli_result or PDOStatement.');
		}
		$this->dbResult = $result;
	}
	
	/**
	 * Converts a comma-separated list of column names into an array
	 * that is used to omit designated fields from the output.
	 * 
	 * @param string $option Comma-separated list of column name
	 */
	protected function buildSuppressedArray($option) {
	    $colnames = explode(',', $option);
	    foreach ($colnames as $col) {
	        $this->suppress[] = trim($col);
	    }
	}
	
	/**
	 * Removes designated fields from the current row of the database result.
	 * 
	 * @param array $row Single row of a database result
	 * @return array Row from database result with the designated fields removed
	 */
	protected function removeSuppressedColumns($row) {
		foreach ($this->suppress as $col) {
			if (array_key_exists($col, $row)) {
				unset($row[$col]);
			}
		}
		return $row;
	}
	
	/**
	 * Returns the current row of the database result using the appropriate
	 * method according to the value of the $resultType property.
	 * 
	 * @return array Current row of database result
	 */
	protected function getRow() {
		if ($this->resultType == 'mysqli') {
			return $this->dbResult->fetch_assoc();
		} else {
			return $this->dbResult->fetch(\PDO::FETCH_ASSOC);
		}
	}
	
	/**
	 * Generates the HTTP headers for the download file using the $fileType
	 * and $filename properties to insert the appropriate values in the 
	 * Content-Type and Content-Disposition headers.
	 */
	protected function outputHeaders() {
		header('Content-Type: ' . $this->fileType);
		header('Content-Disposition: attachment; filename=' . $this->filename);
		header('Cache-Control: no-cache, no-store, must-revalidate');
		header('Pragma: no-cache');
		header('Expires: 0');
	}
}