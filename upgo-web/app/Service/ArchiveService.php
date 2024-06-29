<?php

namespace App\Service;

use App\Models\BannerInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArchiveService
{
    private static $related_path = 'archive';

    public function webBasePath()
    {
        $path = storage_path('app/archive.sh');
        return $path;
    }


    public function newArchiveCode() {
        $max= DB::table('web_archive')->orderBy('id', 'desc')->value('id');
        return 'backup-' .$max;
    }

    public function markRunningState($isRunning)
    {
        if ($isRunning) {
            Storage::put($this->lockFilePath(), hdate());
            Log::info($this->lockFilePath());
        } else {
            Storage::delete($this->lockFilePath());
        }
    }

    /**
     * 判断是否正在归档
     * @return bool
     */
    public function checkRunning()
    {
        return Storage::exists($this->lockFilePath());
    }

    public function lockFilePath()
    {
        return $this->archiveWorkingRelatePath('lock');
    }



    /**
     * 归档工作目录
     * @param $subPath
     * @return string
     */
    public function archiveWorkingRelatePath($subPath)
    {
        return self::$related_path.'/'.$subPath;
    }

    public function stateMessageFilePath()
    {
        return $this->archiveWorkingRelatePath('state');
    }

}