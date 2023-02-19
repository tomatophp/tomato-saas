<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} {{ __('Site') }} #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">


          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Domain')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      <a class="text-primary-500" href="https://{{\Str::lower($model->username).'.'. \Str::replace('https://', '', url('/'))}}" target="_blank">
                          {{\Str::lower($model->username).'.'. \Str::replace('https://', '', url('/'))}}
                      </a>
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('First name')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->first_name}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Last name')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->last_name}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Email')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->email}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Phone')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->phone}}
                  </h3>
              </div>
          </div>


          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Store')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->store}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Type')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->type}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Username')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->username}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Plan')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->plan}}
                  </h3>
              </div>
          </div>


    </div>
</x-splade-modal>
