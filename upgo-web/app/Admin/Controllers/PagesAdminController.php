<?php

namespace App\Admin\Controllers;

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
        $grid->column('page_title', __('页面标题'))->filter('like')->editable();
        $grid->column('page_desc', __('页面描述'))->filter('like')->editable();

        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('修改时间'))->display(function ($time) {
            return hFormatTime($time);
        });


        $grid->disableExport();
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
        $show->field('page_title', __('页面标题'));
        $show->field('page_desc', __('页面描述'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));

        $show->relation('WebPageDetail', '图片展示', function ($grid) {
            $grid->column('image_url', '图片')->image();
            $grid->column('display_index', '展示顺序')->number();
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
        $form = new Form(new WebServicePage());

        $form->saving(function ($form) {
           $form->page_title = hDefault($form->title, '');
           $form->page_desc = hDefault($form->sub_title, '');
        });

        $form->text('page_title', __('服务标题'));
        $form->text('page_desc', __('服务副标题'));
        $form->hasMany('WebPageDetail', '图片展示', function (Form\NestedForm $form) {
            $form->image('image_url', '图片')->uniqueName();
            $form->number('display_index', '展示顺序');
        });

        return $form;
    }
}
