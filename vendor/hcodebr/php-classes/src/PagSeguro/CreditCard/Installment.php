<?php

namespace Hcode\PagSeguro\CreditCard;

use Exception;
use DOMDocument;
use DOMElement;
use Hcode\PagSeguro\Config;

class Installment {

    private $quantity;
    private $value;

    public function __construct(
        int $quantity,
        float $value
    )
    {

        if ($quantity < 1 || $quantity > Config::MAX_INSTALLMENT)
        {

            throw new Exception("Número de parcelas inválida.");

        }

        if ($value <= 0)
        {

            throw new Exception("Valor total inválido.");

        }

        $this->quantity = $quantity;
        $this->value = $value;

    }

       public function getDOMElement(){
        $dom = new \DOMDocument();
        $installment = $dom->createElement("installment");
        $installment = $dom->appendChild($installment);
     
        $value = $dom->createElement("value", number_format($this->value, 2, ".", ""));
        $value = $installment->appendChild($value);
     
        $quantity = $dom->createElement("quantity", $this->quantity);
        $quantity = $installment->appendChild($quantity);
     
     
        if(Config::MAX_INSTALL_MENT_NO_INTEREST>1) {

            $noInterestInstallmentQuantity = $dom->createElement("noInterestInstallmentQuantity", Config::MAX_INSTALL_MENT_NO_INTEREST);
            $noInterestInstallmentQuantity = $installment->appendChild($noInterestInstallmentQuantity);
        }
     
        return $installment;
    }

}

?>