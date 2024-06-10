<?php

class Runner {
    public static function init() {
        $logFilePath = "./log.txt";
        $fh = fopen($logFilePath, "w");

        try {
            fputs($fh, "start\n");

            // Attempt to load configuration from a broken XML file
            $conf = new Conf(dirname(__FILE__) . "/conf.broken.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";

            // Attempt to set and write a new configuration value
            $conf->set("pass", "newpass");
            $conf->write();

            fputs($fh, "success\n");
        } catch (FileException $e) {
            fputs($fh, "file exception: " . $e->getMessage() . "\n");
            throw $e; // Rethrow the exception for higher-level handling
        } catch (XmlException $e) {
            fputs($fh, "xml exception: " . $e->getMessage() . "\n");
            // Handle broken XML file
        } catch (ConfException $e) {
            fputs($fh, "conf exception: " . $e->getMessage() . "\n");
            // Handle incorrect XML structure for configuration
        } catch (Exception $e) {
            fputs($fh, "general exception: " . $e->getMessage() . "\n");
            // Handle any unexpected exceptions
        } finally {
            fputs($fh, "end\n");
            fclose($fh);
        }
    }
}

// Example usage:
try {
    Runner::init();
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
}

/*
Error Handling with try...catch...finally:

The init() method of the Runner class is refactored to include error handling using try...catch...finally blocks.
The try block contains the code that may throw exceptions (e.g., file operations and XML parsing).
Exception Types and Handling:

Specific exceptions (FileException, XmlException, ConfException) are caught and handled accordingly within catch blocks. Each type of exception corresponds to a different error scenario (e.g., file issues, XML structure problems).
Logging and Resource Management:

A log file (log.txt) is opened (fopen) at the beginning of the init() method to record execution steps and error messages.
Error messages (including exception details) are written to the log file using fputs() within catch blocks.
The finally block ensures that the log file is closed (fclose) after execution, regardless of whether an exception occurs.
Exception Rethrowing (throw $e):

Some exceptions (e.g., FileException) are rethrown (throw $e;) after logging, allowing higher-level code to handle these exceptions as needed.
Usage Example:

The init() method is invoked within a try...catch block in the example usage section (try { Runner::init(); } catch (Exception $e) { ... }), allowing for centralized error handling and graceful recovery from exceptions.
Key Concepts and Best Practices:
Centralized Error Handling: Use try...catch...finally blocks to encapsulate error-prone operations and handle exceptions gracefully.

Resource Management: Open and close resources (e.g., files) within a controlled scope (finally block) to ensure proper cleanup and prevent resource leaks.

Exception Types: Define and use specific exception classes (FileException, XmlException, ConfException) to differentiate between various error conditions and provide meaningful error messages.

Logging: Log error messages and execution steps to facilitate debugging and troubleshooting.

Additional Considerations:
Custom Exception Classes: Implement custom exception classes (FileException, XmlException, ConfException) to encapsulate specific error scenarios and provide detailed error information.

Error Recovery: Implement error recovery strategies within catch blocks to handle exceptions gracefully and maintain application stability.
*/
?>
