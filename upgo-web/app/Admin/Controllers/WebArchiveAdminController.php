<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebArchive;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WebArchiveAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'WebArchive';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebArchive());

        $grid->column('id', __('Id'));
        $grid->column('archive_code', __('Archive code'));
        $grid->column('start_time', __('Start time'));
        $grid->column('state', __('State'));
        $grid->column('end_time', __('End time'));
        $grid->column('state_message', __('State message'));
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
        $show = new Show(WebArchive::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('archive_code', __('Archive code'));
        $show->field('start_time', __('Start time'));
        $show->field('state', __('State'));
        $show->field('end_time', __('End time'));
        $show->field('state_message', __('State message'));
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
        $form = new Form(new WebArchive());

        $form->text('archive_code', __('Archive code'));
        $form->datetime('start_time', __('Start time'))->default(date('Y-m-d H:i:s'));
        $form->switch('state', __('State'));
        $form->datetime('end_time', __('End time'))->default(date('Y-m-d H:i:s'));
        $form->text('state_message', __('State message'));

        return $form;
    }
}
