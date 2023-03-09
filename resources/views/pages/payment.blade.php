@extends('../app')

@section('content')
    {{-- {{$payment}} --}}
    <div class="overflow-hidden bg-white dark:bg-gray-900 rounded-md sm:rounded-lg max-w-4xl mx-2 min-[950px]:mx-auto my-8 shadow-md">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-50">Applicant Information</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">Personal details and application.</p>
        </div>
        <div class="border-t dark:border-t-[#232b3a] border-gray-200 dark:bg-[#131d2c]">
          <dl>
            <div class="bg-gray-50 dark:bg-[#131d2c] px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Status</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-50 sm:col-span-2 sm:mt-0">{{$payment->status}}</dd>
            </div>
            <div class="bg-white px-4 dark:bg-gray-900 dark:border-t-[#232b3a] py-5 sm:grid sm:grid-cols-3 border-t sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Payement id</dt>
              <dd class="mt-1 text-sm text-gray-900 dark:text-gray-50 sm:col-span-2 sm:mt-0"><input class="w-full h-0 border-none bg-transparent focus:border-none focus:ring-0" type="text" value="{{$payment->payment_uuid}}" readonly></dd>
            </div>
            <div class="bg-gray-50 dark:bg-[#131d2c] dark:border-t-[#232b3a] px-4 py-5 sm:grid sm:grid-cols-3 border-t sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Full name</dt>
              <dd class="mt-1 text-sm text-gray-900 dark:text-gray-50 sm:col-span-2 sm:mt-0">{{$payment->cardHolder}}</dd>
            </div>
            <div class="bg-white dark:bg-gray-900 dark:border-t-[#232b3a] px-4 py-5 sm:grid sm:grid-cols-3 border-t sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Iptv plan</dt>
              <dd class="mt-1 text-sm text-gray-900 dark:text-gray-50 sm:col-span-2 sm:mt-0">{{str_replace('-', ' ', $payment->iptvPlans->slug)}}</dd>
            </div>
            <div class="bg-gray-50 dark:bg-[#131d2c] dark:border-t-[#232b3a] px-4 py-5 sm:grid sm:grid-cols-3 border-t sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Email address</dt>
              <dd class="mt-1 text-sm text-gray-900 dark:text-gray-50 sm:col-span-2 sm:mt-0">{{$payment->email}}</dd>
            </div>
            <div class="bg-white dark:bg-gray-900 dark:border-t-[#232b3a] px-4 py-5 sm:grid sm:grid-cols-3 border-t sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Paid amount</dt>
              <dd class="mt-1 text-sm text-gray-900 dark:text-gray-50 sm:col-span-2 sm:mt-0">${{$payment->amount  / 100}}</dd>
            </div>
            <div class="bg-gray-50 dark:bg-[#131d2c] dark:border-t-[#232b3a] px-4 py-5 sm:grid sm:grid-cols-3 border-t sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Payment method</dt>
              <dd class="mt-1 text-sm text-gray-900 dark:text-gray-50 sm:col-span-2 sm:mt-0">{{ preg_replace('/\B([A-Z])/', ' $1', $payment->card_brand) }} ... {{$payment->last4}}</dd>
            </div>
            <div class="bg-white dark:bg-gray-900 dark:border-t-[#232b3a] px-4 py-5 sm:grid sm:grid-cols-3 border-t sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Paid at </dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-50 sm:col-span-2 sm:mt-0">{{$payment->created_at}}</dd>
            </div>
            
          </dl>
        </div>
      </div>
      
@endsection

@push('styles')
    <style>
        body {
            background-color: #eee !important;
        }
        .dark body {
            background-color:  #232b3a !important;
        }
    </style>
@endpush