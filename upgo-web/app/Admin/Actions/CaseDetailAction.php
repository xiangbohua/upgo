<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;

class CaseDetailAction extends RowAction
{
    public $name = '编辑图片';

    /**
     * @return  string
     */
    public function href()
    {
        return "/admin/case/detail/".$this->getKey();
    }
}