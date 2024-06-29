<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;

class StartArchive extends Action
{
    protected $selector = '.start-archive';

    public function handle(Request $request)
    {
        // $request ...

        return $this->response()->success('开始备份，请耐心等待，可以刷新界面获取备份状态，备份完成后可以点击下载')->refresh();
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default start-archive">开始备份</a>
HTML;
    }
}