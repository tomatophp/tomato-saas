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
            @if(\TomatoPHP\TomatoSaas\Models\Sync::count())
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
            @else
                <div class="relative text-center">
                    <div class="flex items-center justify-center">
                        <div
                            class="flex flex-col items-center justify-center flex-1 p-6 mx-auto space-y-6 text-center bg-white filament-tables-empty-state dark:bg-gray-800 rounded-lg shadow-sm">
                            <div
                                class="flex items-center justify-center w-16 h-16 rounded-full text-primary-500 bg-primary-50 dark:bg-gray-700">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>

                            <div class="max-w-md space-y-1">
                                <h2 class="text-xl font-bold tracking-tight filament-tables-empty-state-heading dark:text-white">
                                    {{ trans('tomato-admin::global.empty') }}
                                </h2>

                                <p
                                    class="text-sm font-medium text-gray-500 whitespace-normal filament-tables-empty-state-description dark:text-gray-400">

                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-tomato-admin-layout>
