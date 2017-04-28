<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class InvoiceIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Crm
 * @method Invoice current()
 */
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
