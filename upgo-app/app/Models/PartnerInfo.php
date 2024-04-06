<?php

namespace App\Models;

class PartnerInfo extends ImageInfo
{
    public $defaultCaseId;

    public $partnerName;

    /**
     * @var 当前列表的现实顺序
     */
    public $index;
}