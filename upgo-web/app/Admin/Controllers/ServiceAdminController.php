<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebServicePage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServiceAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '服务内容';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebServicePage());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('服务标题'))->filter('like')->editable();
        $grid->column('sub_title', __('副标题'))->filter('like')->editable();
        $grid->column('image_url', __('图片展示'))->image();

        $grid->column('display', __('是否展示'))
            ->filter(valuesDisplay())
            ->select(valuesDisplay());

        $grid->column('display_index', __('展示顺序'));

        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('修改时间'))->display(function ($time) {
            return hFormatTime($time);
        });

        $grid->model()->where('is_deleted', '=', 0);


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
        $show = new Show(WebServicePage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('sub_title', __('Sub title'));
        $show->field('image_url', __('Image url'));
        $show->field('display', __('Display'));
        $show->field('display_index', __('Display index'));
        $show->field('is_deleted', __('Is deleted'));
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
        $form = new Form(new WebServicePage());

        $form->text('title', __('Title'));
        $form->text('sub_title', __('Sub title'));
        $form->text('image_url', __('Image url'));
        $form->switch('display', __('Display'));
        $form->number('display_index', __('Display index'));
        $form->switch('is_deleted', __('Is deleted'));

        return $form;
    }
}
