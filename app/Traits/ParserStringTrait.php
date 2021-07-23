<?php

namespace App\Traits;

use App\Repositories\Declarants\DeclarantQuery;
use App\Models\Product;
use App\Models\Order;

trait ParserStringTrait
{
    public $pattern = '/([^{}]+)/';
    public $patternString = '/image/';

    /**
     * Parse the received string
     */
    public function parseReceivedString($resultString)
    {
        $result = explode(':', $resultString);
        $resultValues = explode('||', $result[1]);
        $resultTitle = $result[0];
        $data['type'] = $resultTitle;

        $resultArray = $this->flippingArrayResult($resultValues);

        if ($resultTitle == 'product') {
            $product = Product::where('SKU', '=', $resultArray['SKU'])->first();
            if ($product) {
                $result = $product;
            } else {
                $result = $this->saveProduct($resultArray);
            }

        } else {
            $order = Order::where('id_order', '=', $resultArray['id'])->first();
            if ($order) {
                $result = $order;
            } else {
                $result = $this->saveOrder($resultArray);
            }
        }

        $data['object'] = $result;

        return $data;
    }

    public function flippingArrayResult($array)
    {
        $resultArray = [];

        foreach ($array as $value) {
            preg_match_all($this->pattern, $value, $matches);
            $resultArray[$matches[0][0]] = $matches[0][1];
        }
        return $resultArray;
    }

    public function saveProduct($resultArray)
    {
        $objProduct = [];

        foreach ($resultArray as $key => $value) {
            if (preg_match($this->patternString, $key)) {
                $key = preg_replace($this->patternString, '', $key);
                $keyValues = explode(';', $key);
                $objProduct['image'] = $value;
                $objProduct['type'] = str_replace('\\', '', $keyValues[0]);
                $objProduct['format'] = $keyValues[1];

            } else {
                $objProduct[$key] = $value;
            }
        }

        $objProduct = Product::create($objProduct);

        return $objProduct;
    }

    public function saveOrder($resultArray)
    {
        $objOrder = [];

        foreach ($resultArray as $key => $value) {
            if ($key == 'id') {
                $objOrder['id_order'] = $value;
            } else {
                $objOrder[$key] = $value;
            }
        }

        $objOrder = Order::create($objOrder);

        return $objOrder;
    }

}
