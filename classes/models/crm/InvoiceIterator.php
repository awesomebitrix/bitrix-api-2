<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

class InvoiceIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Invoice
     */
    function getObject($array)
    {
        $invoice = Invoice::CreateFromBitrixArray($array);

        return $invoice;
    }
}
