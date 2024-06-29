<?php

namespace App\Admin\Actions\Get;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Download extends RowAction
{
    public $name = '下载归档数据';

    public function handle(Model $model)
    {
        // $model ...

        return $this->response()->success('Success message.')->refresh();
    }

}