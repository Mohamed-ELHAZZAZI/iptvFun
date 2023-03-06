@extends('../app')


@push('styles')
    <style>
        body {
            background: #eee !important;
        } 
        .dark body {
            background: #111827 !important;
        }
    </style>
@endpush

@section('content')
<div class="my-10 px-10">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">Personal Information</h3>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Provide accurate and up-to-date personal information to ensure that your identity and privacy are protected.</p>
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form action="#" method="POST">
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white dark:bg-[#1d2530] px-4 py-5 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">First name</label>
                  <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6" value="{{auth()->user()->Firstname}}">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Last name</label>
                  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6"  value="{{auth()->user()->Lastname}}">
                </div>
  
                <div class="col-span-6 sm:col-span-4">
                  <label for="email-address" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Email address</label>
                  <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6" value="{{auth()->user()->email}}">
                </div>
              </div>
            </div>
            <div class="bg-gray-50 dark:bg-[#1d2530] px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center rounded-md bg-[#dd0066] py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-[#f83584] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#f83584]">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div class="my-10 px-10">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">Change password</h3>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Stay one step ahead of potential security threats by updating your password regularly in your personal information.</p>
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form action="#" method="POST">
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white dark:bg-[#1d2530] px-4 py-5 sm:p-6">
              <div class="flex flex-col gap-3">
                <div>
                  <label for="old-password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-50">Old password</label>
                  <input type="password" name="old-password" id="old-password" autocomplete="old-password" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6">
                </div>
  
                <div>
                  <label for="new-password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-50">New password</label>
                  <input type="password" name="password" id="new-password" autocomplete="new-password" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6">
                </div>
  
                <div>
                  <label for="password-confirmation" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-50">Confirm password</label>
                  <input type="password" name="password_confirmation" id="password-confirmation" autocomplete="password-confirmation" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full bg-transparent rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6">
                </div>
              </div>
            </div>
            <div class="bg-gray-50 dark:bg-[#1d2530] px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center rounded-md bg-[#dd0066] py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-[#f83584] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#f83584]">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="my-10 px-10">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">Logout</h3>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Don't be a stranger - come back soon and keep your personal information in tip-top shape!</p>
          <form action="">
            @csrf
            <button class="inline-flex justify-center rounded-md bg-[#dd0066] py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-[#f83584] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#f83584] w-full mt-3">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection