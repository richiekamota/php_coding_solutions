<?php

class XmlException extends Exception {
    private $error;

    public function __construct(LibXmlError $error) {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, line {$error->line}, col {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }

    public function getLibXmlError() {
        return $this->error;
    }
}

class FileException extends Exception {}
class ConfException extends Exception {}

class Conf {
    private $file;
    private $xml;
    private $lastMatch;

    public function __construct($file) {
        $this->file = $file;
        $this->loadXml();
    }

    private function loadXml() {
        if (!file_exists($this->file)) {
            throw new FileException("The file '{$this->file}' does not exist.");
        }

        libxml_use_internal_errors(true); // Enable internal libxml errors handling

        $this->xml = simplexml_load_file($this->file);
        if ($this->xml === false) {
            $errors = libxml_get_errors();
            libxml_clear_errors();
            throw new XmlException($errors[0]);
        }

        $matches = $this->xml->xpath("/conf");
        if (count($matches) === 0) {
            throw new ConfException("Could not find root element 'conf'.");
        }
    }

    public function write() {
        if (!is_writable($this->file)) {
            throw new FileException("File '{$this->file}' is not writable.");
        }
        file_put_contents($this->file, $this->xml->asXML());
    }

    public function get($key) {
        $matches = $this->xml->xpath("/conf/item[@name=\"$key\"]");
        if (count($matches) > 0) {
            $this->lastMatch = $matches[0];
            return (string) $matches[0];
        }
        return null;
    }

    public function set($key, $value) {
        if (!is_null($this->get($key))) {
            $this->lastMatch[0] = $value; // Update existing item value
        } else {
            $conf = $this->xml->conf;
            $newItem = $conf->addChild('item', $value);
            $newItem->addAttribute('name', $key);
        }
    }
}

class Runner {
    public static function init() {
        try {
            $conf = new Conf(dirname(__FILE__) . "/testConf.xml");
            echo "user: " . $conf->get("user") . "\n";
            echo "host: " . $conf->get("host") . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
        } catch (FileException $e) {
            // Handle permissions issue or non-existent file
            echo "File error: " . $e->getMessage() . "\n";
        } catch (XmlException $e) {
            // Handle XML parsing error
            echo "XML error: " . $e->getMessage() . "\n";
        } catch (ConfException $e) {
            // Handle incorrect XML structure
            echo "Configuration error: " . $e->getMessage() . "\n";
        } catch (Exception $e) {
            // Backstop: handle any unexpected exceptions
            echo "An unexpected error occurred: " . $e->getMessage() . "\n";
        }
    }
}

// Example usage:
Runner::init();
/*
Exception Classes and Error Handling:

XmlException, FileException, and ConfException are custom exception classes that extend Exception to represent specific error scenarios (XML related, file operations, and configuration issues).
Exception messages provide informative details about the encountered errors for easier troubleshooting.
XML Parsing and Validation:

The loadXml() method encapsulates XML loading and validation logic.
Internal libxml errors are captured using libxml_get_errors() and cleared with libxml_clear_errors() after handling.
File Operations and Permissions Checking:

File existence and writability are validated using file_exists() and is_writable() functions, respectively.
Exceptions (FileException) are thrown for file-related errors to provide descriptive error messages.
XPath Queries for XML Navigation:

XPath queries ($this->xml->xpath(...)) are used to navigate and query XML elements based on specified criteria (e.g., searching for <item> elements with specific attributes).
Usage of Runner Class for Initialization:

The Runner::init() method serves as an entry point for initializing the Conf class and handling exceptions that may occur during configuration loading, retrieval, modification, and writing.
Key Concepts and Best Practices:
Error Handling: Use custom exception classes to differentiate and handle specific error scenarios encountered during XML processing and file operations.

Encapsulation: Encapsulate logic within methods (loadXml(), write(), get(), set()) to improve code organization, readability, and maintainability.

LibXML Error Handling: Utilize libxml_use_internal_errors() and libxml_get_errors() for capturing and handling libxml errors during XML parsing.

XPath Queries: Leverage XPath expressions ($this->xml->xpath(...)) for flexible navigation and querying of XML documents.
*/

?>
