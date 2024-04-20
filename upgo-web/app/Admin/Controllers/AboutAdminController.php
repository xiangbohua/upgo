<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebAboutPage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AboutAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '关于界面';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
//    protected function grid()
//    {
//        $grid = new Grid(new WebAboutPage());
//
//        $grid->column('id', __('Id'));
//        $grid->column('partner_count', __('Partner count'));
//        $grid->column('theme_count', __('Theme count'));
//        $grid->column('artist_count', __('Artist count'));
//        $grid->column('first_title', __('First title'));
//        $grid->column('first_desc', __('First desc'));
//        $grid->column('sec_title', __('Sec title'));
//        $grid->column('sec_desc', __('Sec desc'));
//        $grid->column('trd_title', __('Trd title'));
//        $grid->column('trd_desc', __('Trd desc'));
//        $grid->column('content_title', __('Content title'));
//        $grid->column('content_desc', __('Content desc'));
//        $grid->column('image_1', __('Image 1'));
//        $grid->column('image_2', __('Image 2'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));
//
//        return $grid;
//    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(WebAboutPage::findOrFail($id));

        $show->field('partner_count', __('合作伙伴数量'))->number();
        $show->field('theme_count', __('主题数量'))->number();
        $show->field('artist_count', __('艺术家数量'))->number();
        $show->field('first_title', __('第一部分介绍标题'));
        $show->field('first_desc', __('第一部分介绍详情'));
        $show->field('sec_title', __('第二部分介绍标题'));
        $show->field('sec_desc', __('第二部分介绍详情'));
        $show->field('trd_title', __('第三部分介绍标题'));
        $show->field('trd_desc', __('第三部分介绍详情'));
        $show->field('content_title', __('内容标题'));
        $show->field('content_desc', __('内容详情'));
        $show->field('image_1', __('底部第一张图片'))->image();
        $show->field('image_2', __('底部第二张图片'))->image();
        $show->panel()
            ->tools(function ($tools) {
                $tools->disableList();
                $tools->disableDelete();
            });;
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WebAboutPage());
        $form->saving(function ($form) {
            $form->partner_count = hDefault($form->partner_count, 1);
            $form->theme_count = hDefault($form->theme_count, 1);
            $form->artist_count = hDefault($form->artist_count, 1);
            $form->first_title = hDefault($form->first_title, '');
            $form->first_desc = hDefault($form->first_desc, '');
            $form->sec_title = hDefault($form->sec_title, '');
            $form->sec_desc = hDefault($form->sec_desc, '');
            $form->trd_title = hDefault($form->trd_title, '');
            $form->trd_title = hDefault($form->trd_title, '');
            $form->content_title = hDefault($form->content_title, '');
            $form->content_desc = hDefault($form->content_desc, '');
        });


        $form->number('partner_count', __('合作伙伴数量'))->placeholder('在这里设置数量后将覆盖实际合作伙伴数量')->required();
        $form->number('theme_count', __('主题数量'))->required();
        $form->number('artist_count', __('艺术家数量'))->required();
        $form->text('first_title', __('第一部分介绍标题'))->default("")->required();
        $form->textarea('first_desc', __('第一部分介绍详情'))->default("")->required();
        $form->text('sec_title', __('第二部分介绍标题'))->default("")->required();
        $form->textarea('sec_desc', __('第二部分介绍详情'))->default("")->required();
        $form->text('trd_title', __('第三部分介绍标题'))->required();
        $form->textarea('trd_desc', __('第三部分介绍标题c'))->required();
        $form->text('content_title', __('内容标题'))->required();
        $form->textarea('content_desc', __('内容描述'))->required();
        $form->image('image_1', __('底部第一张图片'))->required()->uniqueName()->required();
        $form->image('image_2', __('底部第二张图片'))->required()->uniqueName()->required();

        $form->tools(function (Form\Tools $tools) {

            // 去掉`列表`按钮
            $tools->disableList();

            // 去掉`删除`按钮
            $tools->disableDelete();
        });

        $form->footer(function ($footer) {
            // 去掉`重置`按钮
            $footer->disableReset();
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });

        $form->confirm('确定提交吗？');
        $form->saved(function (Form $form) {
            // 跳转页面
            return redirect('/admin/about/1');
        });

        return $form;
    }
}
