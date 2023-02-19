<?php

namespace TomatoPHP\TomatoSaas\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\Table\LaravelExcelException;
use TomatoPHP\TomatoSaas\Models\Tenant;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class SyncTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return \TomatoPHP\TomatoSaas\Models\Sync::query();
    }


    /**
     * @param SpladeTable $table
     * @return void
     * @throws LaravelExcelException
     */
    public function configure(SpladeTable $table): void
    {
        $table
            ->withGlobalSearch(label: trans('tomato-admin::global.search'),columns: ['id','email','phone','username',])
            ->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: function (\TomatoPHP\TomatoSaas\Models\Sync $model) {
                    $model->tenants()->sync([]);
                    Tenant::find($model->username)?->delete();
                    $model->delete();
                },
                after: fn () => Toast::danger(__('Sync Has Been Deleted'))->autoDismiss(2),
                confirm: true
            )
            ->export()
            ->defaultSort('id')
            ->column(
                key: 'id',
                label: __('Id'),
                sortable: true)
            ->column(
                key: 'domain',
                label: __('Domain'),
                sortable: false)
            ->column(
                key: 'email',
                label: __('Email'),
                sortable: true)
            ->column(
                key: 'type',
                label: __('Type'),
                sortable: true)
            ->column(
                key: 'plan',
                label: __('Plan'),
                sortable: true)
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->paginate(15);
    }
}
