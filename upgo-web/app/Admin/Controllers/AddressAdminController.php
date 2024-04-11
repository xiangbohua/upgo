<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebContactAddress;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AddressAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'WebContactAddress';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebContactAddress());

        $grid->column('id', __('Id'));
        $grid->column('title_name', __('Title name'));
        $grid->column('title_hint', __('Title hint'));
        $grid->column('detail_address', __('Detail address'));
        $grid->column('contact_mobile', __('Contact mobile'));
        $grid->column('contact_chat', __('Contact chat'));
        $grid->column('post_code', __('Post code'));
        $grid->column('display_image', __('Display image'));
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
        $show = new Show(WebContactAddress::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title_name', __('Title name'));
        $show->field('title_hint', __('Title hint'));
        $show->field('detail_address', __('Detail address'));
        $show->field('contact_mobile', __('Contact mobile'));
        $show->field('contact_chat', __('Contact chat'));
        $show->field('post_code', __('Post code'));
        $show->field('display_image', __('Display image'));
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
        $form = new Form(new WebContactAddress());

        $form->text('title_name', __('Title name'));
        $form->text('title_hint', __('Title hint'));
        $form->text('detail_address', __('Detail address'));
        $form->text('contact_mobile', __('Contact mobile'));
        $form->text('contact_chat', __('Contact chat'));
        $form->text('post_code', __('Post code'));
        $form->text('display_image', __('Display image'));
        $form->switch('is_deleted', __('Is deleted'));

        return $form;
    }
}
