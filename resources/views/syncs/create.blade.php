<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.create')}} {{__('Site')}}</h1>

    <x-splade-form :default="['plan' => 'free', 'type'=>'store']" class="grid grid-cols-2 gap-4" action="{{route('admin.syncs.store')}}" method="post">
        <x-splade-input class="col-span-2" label="{{__('Sub Domain')}}" name="username" type="text"  placeholder="username">
            <x-slot name="append">
                .{{\Str::replace('https://', '', url('/'))}}
            </x-slot>
        </x-splade-input>

        <x-splade-input label="{{__('First Name')}}" name="first_name" type="text"  placeholder="First name" />
        <x-splade-input label="{{__('Last Name')}}" name="last_name" type="text"  placeholder="Last name" />
        <x-splade-input label="{{__('Email')}}" name="email" type="email"  placeholder="Email" />
        <x-splade-input label="{{__('Phone')}}" name="phone" type="tel"  placeholder="Phone" />
        <x-splade-input label="{{__('Password')}}" name="password" type="password"  placeholder="Password" />
        <x-splade-input label="{{__('Password Confirmation')}}" name="password_confirmation" type="password"  placeholder="Password Confirmation" />
        <x-splade-input label="{{__('Site Name')}}" name="store" type="text"  placeholder="Site Name" />
        <x-splade-select  choices label="{{__('Type')}}" name="type" type="text"  placeholder="Type">
            <option value="store">{{__('Store')}}</option>
            <option value="cms">{{__('CMS')}}</option>
            <option value="services">{{__('Services')}}</option>
        </x-splade-select>
        <x-splade-select class="col-span-2" choices label="{{__('Plan')}}" name="plan" type="text"  placeholder="Plan">
            <option value="free">{{__('Free')}}</option>
            <option value="basic">{{__('Basic')}}</option>
            <option value="pro">{{__('Pro')}}</option>
        </x-splade-select>

        <x-splade-submit class="col-span-2" label="{{trans('tomato-admin::global.crud.create-new')}} {{__('Site')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
