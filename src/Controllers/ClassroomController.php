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

class ClassroomController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    protected function title()
    {
        return trans('admin.classroom');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $classroomModel = config('admin.database.classroom_model');
        $grid = new Grid(new $classroomModel());
        $grid->column('id', 'ID')->sortable();
        $grid->column('name', trans('admin.name'));
        $grid->column('students', trans('admin.students'))->pluck('name')->label();
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
        $classroomModel = config('admin.database.classroom_model');
        $show = new Show($classroomModel::findOrFail($id));
        $show->field('id', 'ID');
        $show->field('name', trans('admin.name'));
        $show->field('students', trans('admin.permissions'))->as(function ($students) {
            return $students->pluck('name');
        })->label();
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
        $classroomModel = config('admin.database.classroom_model');
        $studentsModel = config('admin.database.students_model');
        $form = new Form(new $classroomModel());
        $classroomTable = config('admin.database.classroom_entity_table');
        $connection = config('admin.database.connection');
        $form->display('id', 'ID');
        $form->text('name', trans('admin.name'));
        $form->multipleSelect('students', trans('admin.students'))->options($studentsModel::all()->pluck('name', 'id'));
        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));
        $form->saving(function (Form $form) {});
        return $form;
    }
}
