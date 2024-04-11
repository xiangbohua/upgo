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
    protected $title = 'WebServicePage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebServicePage());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('sub_title', __('Sub title'));
        $grid->column('image_url', __('Image url'));
        $grid->column('display', __('Display'));
        $grid->column('display_index', __('Display index'));
        $grid->column('is_deleted', __('Is deleted'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
