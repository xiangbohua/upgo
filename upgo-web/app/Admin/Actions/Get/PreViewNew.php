<?php

namespace App\Admin\Actions\Get;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class PreViewNew extends RowAction
{
    public $name = '预览';

    public function handle(Model $model)
    {
        // $model ...

        return $this->response()->open("/web/pages/". $model->page_id);
    }

}