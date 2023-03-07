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
<div class="my-10 sm:px-10 min-[440px]:px-5 px-3">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-2 min-[440px]:px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">Personal Information</h3>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Provide accurate and up-to-date personal information to ensure that your identity and privacy are protected.</p>
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form action="{{route('user.update.info')}}" method="POST">
          @csrf
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white dark:bg-[#1d2530] px-4 py-5 sm:p-6">
              @if (count($errors) != 0)
                <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">{{ $errors->first() }}</span>
                    </div>
                </div>
              @endif
              @if (session('successInfo'))
                <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                  <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Info</span>
                  <div>
                    <span class="font-medium">{{session('successInfo')}}</span>
                  </div>
                </div>
              @endif
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">First name</label>
                  <input type="text" name="firstName" id="first-name" autocomplete="given-name" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6" value="{{auth()->user()->firstName}}">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Last name</label>
                  <input type="text" name="lastName" id="last-name" autocomplete="family-name" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6"  value="{{auth()->user()->lastName}}">
                </div>
  
                <div class="col-span-6 sm:col-span-4">
                  <label for="email-address" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Email address</label>
                  <input type="text" name="email" id="email-address" autocomplete="email" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6" value="{{auth()->user()->email}}">
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



  <div class="my-10 sm:px-10 min-[440px]:px-5 px-3">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-2 min-[440px]:px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">Change password</h3>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Stay one step ahead of potential security threats by updating your password regularly in your personal information.</p>
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form action="{{route('user.update.pass')}}" method="POST">
          @csrf
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white dark:bg-[#1d2530] px-4 py-5 sm:p-6">
              @if (session('passError'))
                    <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div>
                          @foreach(session('passError') as $error)
                            @foreach($error as $message)
                                <span class="font-medium">{{ $message }}</span>
                            @endforeach
                          @break
                        @endforeach
                        </div>
                    </div>
                @endif
                @if (session('successPass'))
                <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                  <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Info</span>
                  <div>
                    <span class="font-medium">{{session('successPass')}}</span>
                  </div>
                </div>
              @endif
              <div class="flex flex-col gap-3">
                <div>
                  <label for="old-password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-50">Old password</label>
                  <input type="password" name="current_password" id="old-password" autocomplete="old-password" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6">
                </div>
  
                <div>
                  <label for="new-password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-50">New password</label>
                  <input type="password" name="new_password" id="new-password" autocomplete="new-password" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6">
                </div>
  
                <div>
                  <label for="password-confirmation" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-50">Confirm password</label>
                  <input type="password" name="new_password_confirmation" id="password-confirmation" autocomplete="password-confirmation" class="mt-2 dark:text-gray-100 dark:bg-transparent block w-full bg-transparent rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#dd0066] sm:text-sm sm:leading-6">
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

  <div class="my-10 sm:px-10 min-[440px]:px-5 px-2">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-3 min-[440px]:px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">Logout</h3>
          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Don't be a stranger - come back soon and keep your personal information in tip-top shape!</p>
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="inline-flex justify-center rounded-md bg-[#dd0066] py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-[#f83584] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#f83584] w-full mt-3">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection