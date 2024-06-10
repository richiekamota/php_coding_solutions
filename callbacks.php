<?php

class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class ProcessSale {
    private $callbacks = [];

    public function registerCallback(callable $callback) {
        $this->callbacks[] = $callback;
    }

    public function sale($product) {
        echo "{$product->name}: processing \n";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}

class Mailer {
    public function doMail($product) {
        echo "    mailing ({$product->name})\n";
    }
}

class Totalizer {
    public static function warnAmount($amt) {
        $count = 0;
        return function($product) use ($amt, &$count) {
            $count += $product->price;
            echo "    count: $count\n";
            if ($count > $amt) {
                echo "    high price reached: {$count}\n";
            }
        };
    }
}

echo "-----------------" . PHP_EOL;

// Using anonymous function for logging
$logger = function ($product) {
    echo "    logging ({$product->name})\n";
};

$processor = new ProcessSale();
$processor->registerCallback($logger);

$processor->sale(new Product("shoes", 6));
echo "\n";
$processor->sale(new Product("coffee", 6));

echo "-----------------" . PHP_EOL;

// Using closure for logging
$logger2 = function ($product) {
    echo "    logging ({$product->name})\n";
};

$processor = new ProcessSale();
$processor->registerCallback($logger2);

$processor->sale(new Product("shoes", 6));
echo "\n";
$processor->sale(new Product("coffee", 6));

echo "-----------------" . PHP_EOL;

// Using method callback for mailing
$processor = new ProcessSale();
$mailer = new Mailer();
$processor->registerCallback([$mailer, "doMail"]);

$processor->sale(new Product("shoes", 6));
echo "\n";
$processor->sale(new Product("coffee", 6));

echo "-----------------" . PHP_EOL;

// Using Totalizer to warn on high total amount
$processor = new ProcessSale();
$processor->registerCallback(Totalizer::warnAmount(8));

$processor->sale(new Product("shoes", 6));
echo "\n";
$processor->sale(new Product("coffee", 6));

?>
