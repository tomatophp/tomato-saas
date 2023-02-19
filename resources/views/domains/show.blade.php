<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} {{ __('Domain') }} #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">
        <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Id')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->id}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Tenant')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->Tenant->id}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Domain')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->domain}}
                  </h3>
              </div>
          </div>

    </div>
</x-splade-modal>
