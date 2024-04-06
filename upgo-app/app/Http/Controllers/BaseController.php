<?php

namespace App\Http\Controllers;
use App\Http\Controllers\InternalApi\ApiValueObject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as FrameworkController;

class BaseController extends FrameworkController
{
    // 请求参数
    public $input = [];
    public $user_id = null;
    protected $_request = null;

    private $defaultPageSize = 10;

    public function __construct(Request $request)
    {
        // 获取请求参数
        $this->_request = $request;
        $this->input = $this->trimInput($request->all());
        $this->user_id = isset($this->input['user_id']) ? $this->input['user_id'] : null;
        if (!isset($this->input['pagesize']) || $this->input['pagesize'] <= 0) {
            $this->input['pagesize'] = $this->defaultPageSize;
        }
    }

    /**
     * 去除input中的左右空格
     * @param type $input
     * @return type
     */
    protected function trimInput($input)
    {
        if (empty($input)) {
            return $input;
        }
        foreach ($input as &$value) {
            if (is_array($value)) {
                $this->trimInput($value);
            } else {
                $value = trim($value);
            }
        }
        unset($value);
        return $input;
    }

    /**
     * 获取input参数同时检查参数是否否符合要求，首先默认参数在input中必须存在
     *
     * @param string $paraName 希望从input中获取的字段名称
     * @return ApiValueObject 参数不满足验证
     */
    protected function getInput($paraName)
    {
        if (isset($this->input[$paraName])) {
            return $this->input[$paraName];
        } else {
            return null;
        }
    }
}