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
        $show->field('case_title_img', __($homeSer->getSiteSettingDesc('case_title_img')));
        $show->field('service_title_img', __($homeSer->getSiteSettingDesc('service_title_img')));
        $show->field('about_title_img', __($homeSer->getSiteSettingDesc('about_title_img')));
        $show->field('partner_title_img', __($homeSer->getSiteSettingDesc('partner_title_img')));
        $show->field('site_logo',  __($homeSer->getSiteSettingDesc('site_logo')));
        $show->field('business_wechat', __($homeSer->getSiteSettingDesc('business_wechat')));
        $show->field('resume_contact', __($homeSer->getSiteSettingDesc('resume_contact')));
        $show->field('weibo_link', __($homeSer->getSiteSettingDesc('weibo_link')));
        $show->field('qq_link', __($homeSer->getSiteSettingDesc('qq_link')));
        $show->field('weixi_qrcode_link', __($homeSer->getSiteSettingDesc('weixi_qrcode_link')));

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
        $setting = $homeSer->getSettingData();


        $form->text('brand_title', __($homeSer->getSiteSettingDesc('brand_title')));
        $form->text('brand_short_name', __($homeSer->getSiteSettingDesc('brand_short_name')));
        $form->textarea('brand_desc', __($homeSer->getSiteSettingDesc('brand_desc')));
        $form->image('case_title_img', __($homeSer->getSiteSettingDesc('case_title_img')));
        $form->image('service_title_img', __($homeSer->getSiteSettingDesc('service_title_img')));
        $form->image('about_title_img', __($homeSer->getSiteSettingDesc('about_title_img')));
        $form->image('partner_title_img', __($homeSer->getSiteSettingDesc('partner_title_img')));
        $form->image('site_logo',  __($homeSer->getSiteSettingDesc('site_logo')));
        $form->text('business_wechat', __($homeSer->getSiteSettingDesc('business_wechat')));
        $form->text('resume_contact', __($homeSer->getSiteSettingDesc('resume_contact')));
        $form->text('weibo_link', __($homeSer->getSiteSettingDesc('weibo_link')));
        $form->text('qq_link', __($homeSer->getSiteSettingDesc('qq_link')));
        $form->text('weixi_qrcode_link', __($homeSer->getSiteSettingDesc('weixi_qrcode_link')));

        $form->tools(function (Form\Tools $tools) {

            // 去掉`列表`按钮
            $tools->disableList();

            // 去掉`删除`按钮
            $tools->disableDelete();
        });

        $form->footer(function ($footer) {

            // 去掉`重置`按钮
            $footer->disableReset();

//            // 去掉`提交`按钮
//            $footer->disableSubmit();

            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();

        });


        return $form;
    }
}
