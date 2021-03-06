<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

/**
 * Class BankDetailIterator
 * @package AlterEgo\BitrixAPI\Classes\Models\Crm
 * @method BankDetail current()
 */
class BankDetailIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return BankDetail
     */
    function getObject($array)
    {
        $bankDetail = BankDetail::CreateFromArray($array);

        return $bankDetail;
    }
}
