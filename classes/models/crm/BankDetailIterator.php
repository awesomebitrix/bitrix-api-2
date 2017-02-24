<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 30.01.17
 * Time: 17:26
 */

namespace AlterEgo\BitrixAPI\classes\models\crm;


use AlterEgo\BitrixAPI\classes\models\crm\Invoice;
use AlterEgo\BitrixAPI\classes\api\common\Iterator;

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
