<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Site')}} #{{$model->id}}">
    <x-splade-form class="grid grid-cols-2 gap-4" action="{{route('admin.syncs.update', $model->id)}}" method="post" :default="$model">
        <x-splade-input label="{{__('First Name')}}" name="first_name" type="text"  placeholder="First name" />
        <x-splade-input label="{{__('Last Name')}}" name="last_name" type="text"  placeholder="Last name" />
        <x-splade-input label="{{__('Email')}}" name="email" type="email"  placeholder="Email" />
        <x-splade-input label="{{__('Phone')}}" name="phone" type="tel"  placeholder="Phone" />
        <x-splade-input label="{{__('Password')}}" name="password" type="password"  placeholder="Password" />
        <x-splade-input label="{{__('Password Confirmation')}}" name="password_confirmation" type="password"  placeholder="Password Confirmation" />
        <x-splade-input label="{{__('Site Name')}}" name="store" type="text"  placeholder="Site Name" />
        <x-splade-select choices label="{{__('Type')}}" name="type" type="text"  placeholder="Type">
            <option value="store">{{__('Store')}}</option>
            <option value="cms">{{__('CMS')}}</option>
            <option value="services">{{__('Services')}}</option>
        </x-splade-select>
        <x-splade-select class="col-span-2" choices label="{{__('Plan')}}" name="plan" type="text"  placeholder="Plan">
            <option value="free">{{__('Free')}}</option>
            <option value="basic">{{__('Basic')}}</option>
            <option value="pro">{{__('Pro')}}</option>
        </x-splade-select>

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button
                danger
                :href="route('admin.syncs.destroy', $model->id)"
                title="{{trans('tomato-admin::global.crud.edit')}}"
                confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                class="px-2 text-red-500"
                method="delete"
            >
                {{__('Delete')}}
            </x-tomato-admin-button>
            <x-tomato-admin-button secondary :href="route('admin.syncs.index')" label="{{__('Cancel')}}"/>
        </div>    </x-splade-form>
</x-tomato-admin-container>
