<?php

namespace AlterEgo\BitrixAPI\Classes\Models\Crm;

use AlterEgo\BitrixAPI\Classes\Iterator;

class CompanyIterator extends Iterator
{
    /**
     * @param $array
     *
     * @return Company
     */
    function getObject($array)
    {
        $invoice = Company::CreateFromArray($array);

        return $invoice;
    }
}
