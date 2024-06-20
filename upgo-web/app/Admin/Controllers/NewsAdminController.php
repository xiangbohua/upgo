<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Get\PreViewNew;
use App\Admin\Models\WebNews;
use App\Service\NewsService;
use App\Service\WebPageService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '动态管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebNews());
        $pageService = new WebPageService();
//        $grid->column('id', __('Id'));
        $grid->column('news_title', __('动态标题'));
        $grid->column('page_id', __('动态页面'))->display(function($pageId) use ($pageService) {
            return $pageService->getPageTitle($pageId);
        });
        $grid->column('display', __('是否展示'))
            ->filter(valuesDisplay())
            ->select(valuesDisplay());
        $grid->column('display_index', __('显示顺序'));
        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('修改时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->model()->orderBy('display_index');

        $grid->actions(function ($actions) {
            $actions->add(new PreViewNew());
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
        $show = new Show(WebNews::findOrFail($id));
        $pageService = new WebPageService();
        $allPage = $pageService->listAllPage(2);

        $show->field('news_title', __('动态标题'));
        $show->field('page_id', __('动态页面'))->using($allPage);
        $show->field('display', __('是否展示'))->using(valuesDisplay());
        $show->field('display_index', __('显示顺序'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('创建时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WebNews());

        $pageService = new WebPageService();
        $allPage = $pageService->listAllPage(2);

        $form->text('news_title', __('动态标题'));
        $form->select('page_id', __('页面'))
            ->options($allPage)->rules('required')
            ->help('新建新闻时，请先去【系统设置-->页面管理】中编辑新闻页面...');;;;
        $form->switch('display', __('是否显示'));
        $form->number('display_index', __('显示顺序'));


        $form->saved(function (Form $form) {
            $caseService = new NewsService();
            $caseService->reIndexCase($form->id, $form->display_index);
        });

        return $form;
    }
}
