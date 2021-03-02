<?php
/**
 * LApolinario
 *
 * @category  LApolinario
 * @package   Ava
 * @version   1.0.0
 * @author    Luiz Felipe Apolinário <luizfelipeapo@gmail.com>
 */

declare(strict_types=1);

namespace LApolinario\Ava\Controllers;

use LApolinario\Ava\Form;
use LApolinario\Ava\Grid;
use LApolinario\Ava\Show;
use Illuminate\Support\Facades\Hash;

class StudentController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    protected function title()
    {
        return trans('admin.students');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $studentsModel = config('admin.database.students_model');
        $grid = new Grid(new $studentsModel());
        $grid->column('id', 'ID')->sortable();
        $grid->column('name', trans('admin.name'));
        $grid->column('gender', trans('admin.gender'));
        $grid->column('dob', trans('admin.dob'));
        $grid->column('created_at', trans('admin.created_at'));
        $grid->column('updated_at', trans('admin.updated_at'));
        $grid->actions(function (Grid\Displayers\Actions $actions) {
            if ($actions->getKey() == 1) {
                $actions->disableDelete();
            }
        });
        $grid->tools(function (Grid\Tools $tools) {
            $tools->batch(function (Grid\Tools\BatchActions $actions) {
                $actions->disableDelete();
            });
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $studentsModel = config('admin.database.students_model');
        $show = new Show($studentsModel::findOrFail($id));
        $show->field('id', 'ID');
        $show->field('name', trans('admin.name'));
        $show->field('gender', trans('admin.gender'));
        $show->field('dob', trans('admin.permissions'));
        $show->field('created_at', trans('admin.created_at'));
        $show->field('updated_at', trans('admin.updated_at'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        $studentsModel = config('admin.database.students_model');
        $form = new Form(new $studentsModel());
        $userTable = config('admin.database.student_entity_table');
        $connection = config('admin.database.connection');
        $form->display('id', 'ID');
        $form->text('name', trans('admin.name'))->rules('required');
        $form->select('gender', trans('admin.gender'))->options([trans('admin.male'),trans('admin.female')]);
        $form->date('dob', trans('admin.dob'));
        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));
        $form->saving(function (Form $form) {});
        return $form;
    }
}
