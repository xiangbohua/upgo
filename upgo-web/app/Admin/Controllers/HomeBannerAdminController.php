<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebHomeBanner;
use App\Service\CaseService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HomeBannerAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '首页轮播图设置';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebHomeBanner());
        $caseSer = new CaseService();

        $grid->column('id', __('ID'));
        $grid->column('title', __('标题'))->filter('like')->editable();
        $grid->column('case_id', __('关联案例'))->display(function($caseId) use ($caseSer) {
            return $caseSer->getCaseFullNameById($caseId);
        });
        $grid->column('image_url', __('轮播图片'))->image();
        $grid->column('display', __('是否展示'))
            ->filter(valuesDisplay())
            ->select(valuesDisplay());

        $grid->column('display_index', __('轮播顺序'))->sortable()->editable();

        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('修改时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->disableExport();

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
        $show = new Show(WebHomeBanner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('case_id', __('Case id'));
        $show->field('image_url', __('Image url'));
        $show->field('display', __('Display'));
        $show->field('display_index', __('Display index'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WebHomeBanner());
        $caseService = new CaseService();
        $caseDrop = $caseService->listForDropDown();


        $form->text('title', __('标题'));
        $form->select('case_id', __('关联案例'))->options($caseDrop);
        $form->image('image_url', __('轮播图'))->required()->uniqueName();
        $form->switch('display', __('是否展示'))->options(displaySwitch());
        $form->number('display_index', __('展示顺序'))->min(1);

        return $form;
    }
}
