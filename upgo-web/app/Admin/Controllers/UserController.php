<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('登陆名'));
        $grid->column('email', __('邮箱'));
        $grid->column('email_verified_at', __('邮箱验证时间'));
        $grid->column('password', __('密码'));
//        $grid->column('remember_token', __('是否保持登陆'));
        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('用户名'));
        $show->field('email', __('邮箱'));
        $show->field('email_verified_at', __('邮箱验证时间'));
        $show->field('password', __('登陆'));
//        $show->field('remember_token', __('是否保持登陆'));
        $show->field('created_at', __('添加时间'))->as(function ($time) {
            return hFormatTime($time);
        });
        $show->field('updated_at', __('更新时间'))->as(function ($time) {
            return hFormatTime($time);
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('用户名'));
        $form->email('email', __('邮箱'));
        $form->datetime('email_verified_at', __('邮箱验证时间'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('密码'));
//        $form->text('remember_token', __('是否保持登陆'));

        return $form;
    }
}
