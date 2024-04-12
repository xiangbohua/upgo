<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\CaseDetailAction;
use App\Admin\Models\WebCasePage;
use App\Admin\Models\WebCategory;
use App\Service\CaseService;
use App\Service\CategoryService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CaseAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '案例';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebCasePage());
        $categoryService = new CategoryService();
        $categoryList = $categoryService->getDropList();

        $grid->column('id', __('ID'))->sortable()->width(80);
        $grid->column('title', __('标题'))->sortable()->display(function ($text) {
            return $text;
        })->filter('like')->editable();

        $grid->column('sub_title', __('案例副标题'))->display(function ($text) {
            return $text;
        })->filter('like')->editable();

        $grid->column('main_image_url', __('封面'))->image();

        $grid->column('category_id', __('案例分类'))->select($categoryList)->editable();

        $grid->column('home_page_display', __('是否首页现实'))
            ->using(['0' => '不显示', '1' => '显示'])->filter(valuesDisplay());

        $grid->column('display', __('列表显示'))
            ->using(valuesDisplay())->filter(valuesDisplay());

        $grid->column('display_index', __('展示顺序'))->sortable();
        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });;
        $grid->column('updated_at', __('更新时间'))->display(function ($time) {
            return hFormatTime($time);
        });

        $grid->paginate(5);

        $grid->model()->where('is_deleted', '=', 0);

        $grid->actions(function ($actions) {
            $actions->add(new CaseDetailAction());
        });

        $grid->filter(function ($filter) use ($categoryList) {
            $filter->disableIdFilter();
//            $filter->scope('display', '展示')->where('display', '1');
            $filter->scope('display', '不展示')->where('display', '0');

            // 设置datetime类型
            $filter->between('created_at', '添加时间')->date();
            $filter->between('updated_at', '修改时间')->date();

            $filter->in('category_id', '案例分类')->multipleSelect($categoryList);
            $filter->like('title', '标题');
            $filter->like('sub_title', '附标题');
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(WebCasePage::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WebCasePage());

        $categoryService = new CategoryService();
        $categoryList = $categoryService->getDropList();

//        $form->column('id', __('ID'));
        $form->text('title', __('标题'))->rules('required');

        $form->textarea('sub_title', __('案例副标题'))->rules('required');

        $form->image('main_image_url', __('封面'))->rules('required');

        $form->select('category_id', __('案例分类'))->options($categoryList)->rules('required');

        $form->switch('home_page_display', __('是否首页现实'))->states(displaySwitch())->rules('required');

        $form->switch('display', __('列表显示'))->states(displaySwitch())->rules('required');

        $form->number('display_index', __('展示顺序'))->min(1)->rules('required');

        $form->footer(function ($footer) {
            // 去掉`重置`按钮
            $footer->disableReset();
            // 去掉`提交`按钮
//            $footer->disableSubmit();
            // 去掉`查看`checkbox
//            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
//            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
//            $footer->disableCreatingCheck();
        });


        return $form;
    }


    protected function editImages(CaseService $service, $caseId) {
        return view('welcome');
    }
}
