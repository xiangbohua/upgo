<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\StartArchive;
use App\Admin\Models\WebArchive;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
//use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class WebArchiveAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '备份管理';

    public function listArchive(Content $content)
    {
        return $content
            ->header('')
            ->body(function (Row $row) {
                //这里是分成两列显示
                $row->column(6, function (Column $column) {
                    $column->row(new ConvertPage());
                });
                $row->column(6, function (Column $column) {
                    $column->row(new IdHash());
                });
            });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebArchive());
        $grid->column('id', __('Id'));
        $grid->column('archive_code', __('归档编号'));
        $grid->column('start_time', __('启动时间'));
        $grid->column('state', __('执行状态'));
        $grid->column('end_time', __('完成时间'));
        $grid->column('state_message', __('当前状态'));

        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('修改时间'))->display(function ($time) {
            return hFormatTime($time);
        });

        $grid->disableFilter();
        $grid->disableRowSelector();
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->tools(function ($tools) {
            $tools->append(new StartArchive());
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
        $show = new Grid(new WebArchive());

        $show->field('id', __('Id'));
        $show->field('archive_code', __('Archive code'));
        $show->field('start_time', __('Start time'));
        $show->field('state', __('State'));
        $show->field('end_time', __('End time'));
        $show->field('state_message', __('State message'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
//        $form = new Form(new WebArchive());
//
//        $form->text('archive_code', __('Archive code'));
//        $form->datetime('start_time', __('Start time'))->default(date('Y-m-d H:i:s'));
//        $form->switch('state', __('State'));
//        $form->datetime('end_time', __('End time'))->default(date('Y-m-d H:i:s'));
//        $form->text('state_message', __('State message'));
//
//        return $form;
        $grid = new Grid(new WebArchive());

        $grid->column('id', __('Id'));
        $grid->column('archive_code', __('编码'));
        $grid->column('start_time', __('启动时间'));
        $grid->column('state', __('归档状态'));
        $grid->column('end_time', __('归档结束时间'));
        $grid->column('state_message', __('状态'));

        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('修改时间'))->display(function ($time) {
            return hFormatTime($time);
        });

        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableColumnSelector();

        return $grid;

    }
}
