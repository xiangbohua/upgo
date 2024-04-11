<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebPartner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PartnerAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'WebPartner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebPartner());

        $grid->column('id', __('Id'));
        $grid->column('partner_name', __('Partner name'));
        $grid->column('logo_url', __('Logo url'));
        $grid->column('display_index', __('Display index'));
        $grid->column('display', __('Display'));
        $grid->column('case_id', __('Case id'));
        $grid->column('is_deleted', __('Is deleted'));
        $grid->column('delete_time', __('Delete time'));
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
        $show = new Show(WebPartner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('partner_name', __('Partner name'));
        $show->field('logo_url', __('Logo url'));
        $show->field('display_index', __('Display index'));
        $show->field('display', __('Display'));
        $show->field('case_id', __('Case id'));
        $show->field('is_deleted', __('Is deleted'));
        $show->field('delete_time', __('Delete time'));
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
        $form = new Form(new WebPartner());

        $form->text('partner_name', __('Partner name'));
        $form->text('logo_url', __('Logo url'));
        $form->number('display_index', __('Display index'));
        $form->switch('display', __('Display'));
        $form->number('case_id', __('Case id'));
        $form->switch('is_deleted', __('Is deleted'));
        $form->datetime('delete_time', __('Delete time'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
