<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.create')}} {{__('Domain')}}</h1>

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.domains.store')}}" method="post">
        <x-splade-input label="{{__('Id')}}" type='number' name="id" placeholder="Id" />
          <x-splade-select label="{{__('tenant')}}" placeholder="Tenant id" name="tenant_id" remote-url="/admin/tenants/api" remote-root="model.data" option-label=name option-`value=`"id" choices/>
          <x-splade-input label="{{__('Domain')}}" name="domain" type="text"  placeholder="Domain" />

        <x-splade-submit label="{{trans('tomato-admin::global.crud.create-new')}} {{__('Domain')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
