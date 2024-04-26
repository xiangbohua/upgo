<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\CaseDetailAction;
use App\Admin\Models\WebCasePage;
use App\Admin\Models\WebCategory;
use App\Admin\Models\WebPage;
use App\Service\CaseService;
use App\Service\CategoryService;
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
    protected $title = '案例';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebPage());
        $grid->column('id', __('ID'))->sortable()->width(80);
        $grid->column('page_title', __('页面标题'))->sortable()->display(function ($text) {
            return $text;
        })->filter('like')->editable();
        $grid->column('page_desc', __('页面描述'))->image();
        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });;
        $grid->column('updated_at', __('更新时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->paginate(12);
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

        $show->field('page_title', __('页面标题'));
        $show->field('page_desc', __('页面描述'));
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
        $form = new Form(new WebPage());

        $form->saving(function ($form) {
            $form->title = hDefault($form->title, '');
            $form->sub_title = hDefault($form->sub_title, '');
            $form->home_page_display = hDefault($form->home_page_display, 1);
            $form->display = hDefault($form->display, 1);
            $form->display = hDefault($form->display, 1);
        });

        $form->text('title', __('页面标题'))->rules('required');
//        $form->textarea('sub_title', __('案例副标题'))->rules('required');
        $form->text('page_desc', __('页面描述'))->require();
        $form->hasMany('WebCasePageItem', '图片展示', function (Form\NestedForm $form) {
            $form->image('image_url', '图片')->uniqueName();
            $form->number('display_index', '展示顺序')->min(1);
        });

        $form->footer(function ($footer) {
            // 去掉`重置`按钮
            $footer->disableReset();
            // 去掉`提交`按钮
//            $footer->disableSubmit();
            // 去掉`查看`checkbox
//            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
//            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
//            $footer->disableCreatingCheck();
        });

        $form->confirm('确定提交吗？');
        return $form;
    }

}
