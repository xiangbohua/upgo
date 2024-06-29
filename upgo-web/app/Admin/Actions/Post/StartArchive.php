<?php

namespace App\Admin\Actions\Post;

use App\Service\ArchiveService;
use Encore\Admin\Actions\Action;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\Translation\t;

class StartArchive extends Action
{
    protected $selector = '.start-archive';

    public function handle(Request $request)
    {
        // $request ...
        $service = new ArchiveService();
        $basePath = $service->webBasePath();
        $archiveCode = $service->newArchiveCode();

        $para = [
            $basePath
        ];

        $service->markRunningState(true);

        $paraString = join(' ', $para);
        exec("sh $basePath $paraString", $output, $return_value);

        $result = '';
        if ($return_value == 0) {
            $result = '开始备份，请耐心等待，可以刷新界面获取备份状态，备份完成后可以点击下载！';
        } else {
            $result = '备份失败！';
        }
        $result = json_encode($output);

        return $this->response()->success($result)->refresh();
//        return $this->response()->success('开始备份，请耐心等待，可以刷新界面获取备份状态，备份完成后可以点击下载')->refresh();
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default start-archive">开始备份</a>
HTML;
    }
}