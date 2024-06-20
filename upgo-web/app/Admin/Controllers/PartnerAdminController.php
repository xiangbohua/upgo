<?php

namespace App\Admin\Controllers;

use App\Admin\Models\WebPartner;
use App\Service\CaseService;
use App\Service\PartnerService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PartnerAdminController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '合作伙伴';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WebPartner());

//        $grid->column('id', __('Id'))->sortable();
        $grid->column('partner_name', __('伙伴名称'))
            ->filter('like')->editable();
        $grid->column('logo_url', __('Logo'))->image();
        $grid->column('display_index', __('展示顺序'))->editable();
        $grid->column('display', __('列表是否展示'))->using(valuesDisplay())->filter(valuesDisplay());
        $grid->column('partner_site', __('伙伴官网(优先)'))->editable();
        $grid->column('case_id', __('展示案例'))->display(function ($cateId) {
            $caseService = new CaseService();
            return $caseService->getCaseFullNameById($cateId);
        });
        $grid->column('created_at', __('添加时间'))->display(function ($time) {
            return hFormatTime($time);
        });
        $grid->column('updated_at', __('修改时间'))->display(function ($time) {
            return hFormatTime($time);
        });

        $grid->quickSearch(function ($model, $query) {
            $model->where('partner_name', 'like', "%{$query}%");
        });
        $grid->model()->orderBy('display_index');

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
        $show = new Show(WebPartner::findOrFail($id));
        $show->field('partner_name', __('合作伙伴名称'));
        $show->field('logo_url', __('Logo'))->image();
        $show->field('display_index', __('展示顺序'));
        $show->field('display', __('列表是否显示'))->using(valuesDisplay());
        $show->field('partner_site', __('伙伴官网(优先)'))->link();
        $show->field('case_id', __('关联案例'))->as(function ($caseId) {
            $caseService = new CaseService();
            return $caseService->getCaseFullNameById($caseId);
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
        $form = new Form(new WebPartner());
        $caseService = new CaseService();
        $form->saving(function ($form) {
            $form->display = hDefault($form->display, 1);
            $form->case_id = hDefault($form->case_id, 0);
        });

        $form->text('partner_name', __('合作伙伴名称'))->rules('required');
        $form->image('logo_url', __('Logo'))->rules('required')->uniqueName();
        $form->number('display_index', __('展示顺序'))->min(1)->rules('required');;
        $form->switch('display', __('首页是否显示'))->states(displaySwitch())->rules('required');;
        $form->text('partner_site', __('伙伴官网(优先)'))->help('优先跳转到伙伴官网，地址请以http或者https开头...');
        $form->select('case_id', __('展示案例'))->options($caseService->listForDropDown())
            ->help('输入伙伴官网后不再跳转到案例详情...');


        $form->saved(function (Form $form) {
            $caseService = new PartnerService();
            $caseService->reIndexCase($form->id, $form->display_index);
        });
        return $form;
    }

}
