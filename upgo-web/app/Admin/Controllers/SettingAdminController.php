<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebSiteSetting;
use App\Service\HomeService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SettingAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '网站基本设置';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
//    protected function grid()
//    {
//        $grid = new Grid(new WebSiteSetting());
//
//        $grid->column('setting_name', __('设置名称:'));
//        $grid->column('setting_value', __('设置内容'))->display(function ($a) {
//            return $a;
//        })->editable('textarea');
//
////        $grid->disableFilter();
////        $grid->disablePagination();
////        $grid->disableExport();
////        $grid->disableRowSelector();
////        $grid->disableActions();
////        $grid->disableColumnSelector();
////        $grid->disableCreateButton();
//
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
        $show = new Show(WebSiteSetting::findOrFail($id));
        $homeSer = new HomeService();

//        $show->field('id', __($homeSer->getSiteSettingDesc('id')));
        $show->field('brand_title', __($homeSer->getSiteSettingDesc('brand_title')));
        $show->field('brand_short_name', __($homeSer->getSiteSettingDesc('brand_short_name')));
        $show->field('brand_desc', __($homeSer->getSiteSettingDesc('brand_desc')));
        $show->field('site_logo',  __($homeSer->getSiteSettingDesc('site_logo')))->image();
        $show->field('site_code',  __($homeSer->getSiteSettingDesc('site_code')));
        $show->field('slogan',  __($homeSer->getSiteSettingDesc('slogan')));

        $show->field('case_title_img', __($homeSer->getSiteSettingDesc('case_title_img')))->image();
        $show->field('service_title_img', __($homeSer->getSiteSettingDesc('service_title_img')))->image();
        $show->field('about_title_img', __($homeSer->getSiteSettingDesc('about_title_img')))->image();
        $show->field('partner_title_img', __($homeSer->getSiteSettingDesc('partner_title_img')))->image();

        $show->field('business_wechat', __($homeSer->getSiteSettingDesc('business_wechat')));
        $show->field('resume_contact', __($homeSer->getSiteSettingDesc('resume_contact')));
//        $show->field('weibo_link', __($homeSer->getSiteSettingDesc('weibo_link')));
//        $show->field('qq_link', __($homeSer->getSiteSettingDesc('qq_link')));
//        $show->field('weixi_qrcode_link', __($homeSer->getSiteSettingDesc('weixi_qrcode_link')));

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
        $form = new Form(new WebSiteSetting());
        $homeSer = new HomeService();

        $form->saving(function($form) {
            $form->business_wechat = hDefault($form->business_wechat, '');
            $form->resume_contact = hDefault($form->resume_contact, '');
        });

        $form->text('brand_title', __($homeSer->getSiteSettingDesc('brand_title')))->rules('required');
        $form->text('brand_short_name', __($homeSer->getSiteSettingDesc('brand_short_name')))->rules('required');
        $form->textarea('brand_desc', __($homeSer->getSiteSettingDesc('brand_desc')))->rules('required');
        $form->image('site_logo',  __($homeSer->getSiteSettingDesc('site_logo')))->rules('required')->uniqueName();
        $form->text('site_code',  __($homeSer->getSiteSettingDesc('site_code')))->rules('required')->required();
        $form->text('slogan',  __($homeSer->getSiteSettingDesc('slogan')))->rules('required')->required();

        $form->image('case_title_img', __($homeSer->getSiteSettingDesc('case_title_img')))->rules('required')->uniqueName();
        $form->image('service_title_img', __($homeSer->getSiteSettingDesc('service_title_img')))->rules('required')->uniqueName();
        $form->image('about_title_img', __($homeSer->getSiteSettingDesc('about_title_img')))->rules('required')->uniqueName();
        $form->image('partner_title_img', __($homeSer->getSiteSettingDesc('partner_title_img')))->rules('required')->uniqueName();

        $form->text('business_wechat', __($homeSer->getSiteSettingDesc('business_wechat')))->placeholder('联系我们展示的微信')->rules('required');
        $form->text('resume_contact', __($homeSer->getSiteSettingDesc('resume_contact')))->placeholder('联系我们显示微信和邮箱')->rules('required')->default('');;

//        $form->text('weibo_link', __($homeSer->getSiteSettingDesc('weibo_link')))->default('');
//        $form->text('qq_link', __($homeSer->getSiteSettingDesc('qq_link')))->default('');
//        $form->text('weixi_qrcode_link', __($homeSer->getSiteSettingDesc('weixi_qrcode_link')))->default('');

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
            return redirect('/admin/setting/1');
        });

        return $form;
    }
}
