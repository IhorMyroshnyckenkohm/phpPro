<?php
class ProductData {
    private array $data = [];

    public function get($name) {
        return $this->data[$name] ?? null;
    }

    public function set($name, $value) {
        $this->data[$name] = $value;
    }

    public function save() {
    }

    public function update() {
    }

    public function delete() {
    }
}

class ProductProcessor {
    public ProductData $productData;

    public function __construct(ProductData $productData) {
        $this->productData = $productData;
    }

    public function process() {
    }
}

// Class for displaying product information
class ProductOutput {
    public ProductData $productData;

    public function __construct(ProductData $productData) {
        $this->productData = $productData;
    }

    public function print() {
    }
}

$productData = new ProductData();
$productProcessor = new ProductProcessor($productData);
$productOutput = new ProductOutput($productData);

$productProcessor->process();
$productOutput->print();
