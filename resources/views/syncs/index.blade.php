<x-tomato-admin-layout>
    <x-slot:header>
        {{ __('SaaS') }}
    </x-slot:header>
    <x-slot:buttons>
        <x-tomato-admin-button modal href="{{route('admin.syncs.create')}}">
            {{trans('tomato-admin::global.crud.create-new')}} {{__('Site')}}
        </x-tomato-admin-button>
    </x-slot:buttons>


    <div class="pb-12" v-cloak>
        <div class="mx-auto">
            <x-splade-table :for="$table" striped>
                <x-splade-cell domain>
                    <a class="text-primary-500" href="https://{{\Str::lower($item->username).'.'. \Str::replace('https://', '', url('/'))}}" target="_blank">
                        {{\Str::lower($item->username).'.'. \Str::replace('https://', '', url('/'))}}
                    </a>
                </x-splade-cell>
                <x-splade-cell email>
                    <x-tomato-admin-row table type="email" value="{{$item->email}}" />
                </x-splade-cell>
                <x-splade-cell actions>
                    <div class="flex justify-start">
                        <x-tomato-admin-button type="icon" title="{{__('Login As')}}" href="/admin/saas/{{ $item->id }}/impersonate"  modal>
                            <x-heroicon-s-globe-alt class="h-6 w-6"/>

                        </x-tomato-admin-button>
                        <x-tomato-admin-button success type="icon" title="{{trans('tomato-admin::global.crud.view')}}" href="/admin/saas/{{ $item->id }}" modal>
                            <x-heroicon-s-eye class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button warning type="icon" href="/admin/saas/{{ $item->id }}/edit" title="{{trans('tomato-admin::global.crud.edit')}}" modal>
                            <x-heroicon-s-pencil class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button danger type="icon" href="/admin/saas/{{ $item->id }}"
                                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                               method="delete"
                                               title="{{trans('tomato-admin::global.crud.delete')}}"

                        >
                            <x-heroicon-s-trash class="h-6 w-6"/>
                        </x-tomato-admin-button>
                    </div>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-tomato-admin-layout>
