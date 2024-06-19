<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Get\PreView;
use App\Admin\Models\WebPage;
use App\Admin\Models\WebServicePage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PagesAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '页面管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebPage());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('page_name', __('页面名称'))->filter('like')->editable();
        $grid->column('page_title', __('页面标题'))->filter('like')->editable();
        $grid->column('page_desc', __('页面描述'))->editable();
        $grid->column('sub_title', __('页面副标题'))->editable();
        $grid->column('page_type', __('页面类型'))->select(valuesPageType());
        $grid->column('cover', __('封面图'))->image();
        $grid->column('banner', __('顶部banner'))->image();
        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('修改时间'))->display(function ($time) {
            return hFormatTime($time);
        });

        $grid->disableExport();
        $grid->actions(function ($actions) {
            $actions->add(new PreView());
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
        $show = new Show(WebPage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('page_name', __('页面名称'));
        $show->field('page_title', __('页面标题'));
        $show->field('page_desc', __('页面描述'));
        $show->field('sub_title', __('页面副标题'));
        $show->field('cover', __('封面图'))->image();
        $show->field('banner', __('顶部banner'))->image();
        $show->field('page_type', __('页面类型'))->using(valuesPageType());
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));

        $show->relation('WebPageDetail', '图片展示', function ($grid) {
            $grid->column('image_url', '图片')->image();
            $grid->column('display_index', '展示顺序')->number();
            $grid->column('detail_title', '内容标题');
            $grid->column('detail_desc', '内容描述');
            $grid->column('text_position', '文字位置')->using(valuesPosition());
            $grid->column('title_left_right', '标题居中')->using(textLeftRightPosition());
            $grid->column('text_left_right', '内容居中')->using(textLeftRightPosition());

            $grid->disableFilter();
            $grid->disableExport();
            $grid->disableCreateButton();
            $grid->disableCreateButton();
            $grid->disableColumnSelector();

            $grid->actions(function ($actions) {
                // 去掉编辑
                $actions->disableEdit();
                // 去掉查看
                $actions->disableView();
            });
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
        $form = new Form(new WebPage());

        $form->saving(function ($form) {
           $form->page_title = hDefault($form->page_title, '');
           $form->page_desc = hDefault($form->page_desc, '');
           $form->sbu_title = hDefault($form->sbu_title, '');
        });
        $form->text('page_name', __('页面名称'))->rules('required')->help("页面名称，不再详情页显示，主要用于页面选择项...");
        $form->text('page_title', __('页面标题'))->help("页面标题，页面顶部的大号自提，动态页面可填");
        $form->text('page_desc', __('页面描述'))->help("页面最顶部的描述，小号字体，可不填");
        $form->text('sub_title', __('页面副标题'))->help("页面副标题，可不填...");
        $form->image('banner', __('顶部banner'))->help("页面详情的banner，顶部长图，可不填...");
        $form->image('cover', __('页面封面'))->help("缩略图展示使用...");
        $form->select('page_type', __('页面类型'))->options(valuesPageType())->rules('required')->help("动态页面：先编辑在添加，在这里添加页面，然后去动态管理界面添加；设置页面：关于、服务选择");

        $form->hasMany('WebPageDetail', '图片展示', function (Form\NestedForm $form2) {
            $form2->text('detail_title', '内容标题');
            $form2->select('title_left_right', __('标题居中'))
                ->options(textLeftRightPosition())
                ->rules('required')
                ->setWidth(2, 2);

            $form2->text('detail_desc', '内容描述');
            $form2->select('text_left_right', __('内容居中'))
                ->options(textLeftRightPosition())
                ->rules('required')
                ->setWidth(2, 2);;
            $form2->image('image_url', '内容图片')->uniqueName();
            $form2->number('display_index', '展示顺序');
            $form2->switch('text_position', __('文字位置'))->states(positionSwitch())->rules('required');
        });

        return $form;
    }
}
