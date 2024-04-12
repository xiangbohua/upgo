<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'WebCategory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebCategory());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('cate_name', __('分类名称'))->filter('like');
        $grid->column('display_index', __('展示顺序'))->sortable();
        $grid->column('display', __('是否显示'))->filter(valuesDisplay())->select(valuesDisplay());
        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('更新时间'))->display(function ($time) {
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
        $show = new Show(WebCategory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cate_name', __('分类名称'));
        $show->field('display_index', __('展示顺序'));
        $show->field('display', __('是否显示'))->using(valuesDisplay());
        $show->field('created_at', __('添加时间'));
        $show->field('updated_at', __('更新时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WebCategory());

        $form->text('cate_name', __('分类名称'))->creationRules(['required', "unique:web_category"]);
        $form->number('display_index', __('显示顺序'));
        $form->switch('display', __('是否展示'))->options(displaySwitch());

        $form->confirm('确定提交吗？');
        return $form;
    }
}
