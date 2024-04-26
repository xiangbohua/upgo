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
    protected $title = '地址联系人';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebContactAddress());

        $grid->column('id', __('Id'));
        $grid->column('title_name', __('地址标题'));
        $grid->column('title_hint', __('地址提示'));
        $grid->column('detail_address', __('详细地址'));
        $grid->column('contact_mobile', __('联系手机号'));
        $grid->column('contact_chat', __('微信号'));
        $grid->column('post_code', __('邮编'));
        $grid->column('display_image', __('图片展示'))->image();
        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });;
        $grid->column('updated_at', __('更新时间'))->display(function ($time) {
            return hFormatTime($time);
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
        $show = new Show(WebContactAddress::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title_name', __('地址标题'));
        $show->field('title_hint', __('地址提示'));
        $show->field('detail_address', __('详细地址'));
        $show->field('contact_mobile', __('联系手机号'));
        $show->field('contact_chat', __('微信号'));
        $show->field('post_code', __('邮编'));
        $show->field('display_image', __('图片展示'))->image();
        $show->field('created_at', __('添加时间'));
        $show->field('updated_at', __('修改时间'));

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
        $form->saving(function ($form) {
            $form->title_name = hDefault($form->title_name, '');
            $form->title_hint = hDefault($form->title_hint, '');
            $form->contact_mobile = hDefault($form->contact_mobile, '');
            $form->detail_address = hDefault($form->detail_address, '');
            $form->contact_chat = hDefault($form->contact_chat, '');
            $form->post_code = hDefault($form->post_code, '');
        });

        $form->text('title_name', __('地址标题'))->required();
        $form->text('title_hint', __('地址提示'))->required();
        $form->text('detail_address', __('详细地址'))->required();
        $form->mobile('contact_mobile', __('联系手机号'))->required();
        $form->text('contact_chat', __('微信号'))->required();
        $form->text('post_code', __('邮编'))->required();
        $form->image('display_image', __('图片展示'))->required()->uniqueName();

        $form->confirm('确定提交吗？');
        return $form;
    }
}
