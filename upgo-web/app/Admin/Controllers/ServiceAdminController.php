<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebServicePage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServiceAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '服务内容';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebServicePage());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('服务标题'))->filter('like')->editable();
        $grid->column('sub_title', __('副标题'))->filter('like')->editable();
        $grid->column('image_url', __('图片展示'))->image();

        $grid->column('display', __('是否展示'))
            ->filter(valuesDisplay())
            ->select(valuesDisplay());

        $grid->column('display_index', __('展示顺序'));

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
        $show = new Show(WebServicePage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('服务标题'));
        $show->field('sub_title', __('服务自标题'));
        $show->field('image_url', __('展示界面'));
        $show->field('display', __('是否展示'));
        $show->field('display_index', __('展示顺序'));
        $show->field('created_at', __('添加时间'));
        $show->field('updated_at', __('修改时间'));

        $show->relation('WebServicePageItem', '图片展示', function ($grid) {
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
           $form->title = hDefault($form->title, '');
           $form->sub_title = hDefault($form->sub_title, '');
           $form->display = hDefault($form->display, 1);
           $form->display_index = hDefault($form->display_index, 1);
        });

        $form->text('title', __('服务标题'));
        $form->text('sub_title', __('服务副标题'));
        $form->image('image_url', __('列表展示'))->uniqueName();
        $form->switch('display', __('是否展示'));
        $form->number('display_index', __('展示顺序'))->min(1);


        $form->hasMany('WebServicePageItem', '图片展示', function (Form\NestedForm $form) {
            $form->image('image_url', '图片')->uniqueName();
            $form->number('display_index', '展示顺序');
        });

        return $form;
    }
}
