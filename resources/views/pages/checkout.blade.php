@extends('app')
@section('content')

<form
role="form" 
action="{{ route('checkout.post') }}" 
method="post" 
id="payment-form"
class="my-10 px-4 pt-8 max-w-lg mx-auto require-validation"
>
@csrf
<p class="text-xl font-medium dark:text-gray-50">Payment Details</p>
<p class="text-gray-400">Complete your order by providing your payment details.</p>
@if (Session::has('success'))
<div id="paySuccess" class="flex p-4 my-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">{{Session::get('success')}}</span>
    </div>
</div>
@endif
@if (Session::has('error'))
<div id="payError" class="my-4 p-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
  <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
  <span class="sr-only">Info</span>
    <span class="font-medium ">{{Session::get('error')}}</span>
</div>   
@endif
<div id="paymentError" class="errore hidden my-4 p-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
      <span class="font-medium " id="errorMsg"></span>
</div>
      <div class="">
        <label for="email" class="mt-4 mb-2 block text-sm font-medium dark:text-gray-50">Email</label>
        <div class="relative">
          <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 dark:border-gray-500 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-[#f83584] focus:ring-[#f83584] dark:bg-transparent dark:placeholder:text-gray-400 dark:text-gray-100" placeholder="your.email@gmail.com" value="{{old('email') ? old('email') : auth()->user()->email}}" required/>
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>
          </div>
        </div>
        <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium dark:text-gray-50">Card Holder</label>
        <div class="relative">
          <input type="text" id="card-holder" name="cardHolder" class="w-full rounded-md border border-gray-200 dark:border-gray-500 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-[#f83584] focus:ring-[#f83584] dark:bg-transparent dark:placeholder:text-gray-400 dark:text-gray-100" placeholder="Your full name here" value="{{old('card-holder') ? old('card-holder') : auth()->user()->firstName . ' ' . auth()->user()->lastName }}" required/>
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
          </div>
        </div>
        <label for="card-no" class="mt-4 mb-2 block text-sm font-medium dark:text-gray-50">Card Details</label>
        <div class="grid  grid-cols-3 gap-1">
          <div class="relative col-span-3 w-full flex-shrink-0">
            <input type="text" id="card-no" name="card-no" class="w-full rounded-md border border-gray-200 dark:border-gray-500 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-[#f83584] focus:ring-[#f83584] card-number dark:bg-transparent dark:placeholder:text-gray-400 dark:text-gray-100" autocomplete="off" size="20" placeholder="xxxx-xxxx-xxxx-xxxx" required/>
            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
              <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
              </svg>
            </div>
          </div>
          <input type="text" name="credit-expiry" class="w-full rounded-md border dark:border-gray-500 border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-[#f83584] focus:ring-[#f83584] card-expiry-month dark:bg-transparent" autocomplete="off" size="2" placeholder="MM" required/>
          <input type="text" name="expiry-year" class="w-full rounded-md border dark:border-gray-500 border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-[#f83584] focus:ring-[#f83584] card-expiry-year dark:bg-transparent" autocomplete="off" size="2" placeholder="YYYY" required/>
          <input type="text" name="credit-cvc" class=" flex-shrink-0 rounded-md border dark:border-gray-500 border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-[#f83584] focus:ring-[#f83584] card-cvc dark:bg-transparent" autocomplete="off" size="20" placeholder="CVC" required/>
        </div>

        <div class="w-full h-20 border border-gray-200 dark:border-gray-500 rounded mt-4 flex px-2 gap-3">
            <img class="w-12" width="32" height="32" src="{{ asset('/storage/icons/logo.svg') }}" alt="">
            <div class="flex flex-col justify-center">
                <span class="font-semibold text-lg dark:text-gray-50">{{str_replace('-' , ' ' ,$plan->slug)}}</span>
                <span class="dark:text-gray-200"><span class="text-sm ">price: </span> ${{$plan->price}}</span>
            </div>
        </div>
  

        <div class="mt-6 flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900 dark:text-gray-50">Total</p>
          <p class="text-2xl font-semibold text-gray-900 dark:text-gray-50">${{$plan->price}}</p>
        </div>
      </div>
      <button type="submit" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white dark:bg-[#f83584]">Place Order</button>
    </form>

@endsection
  

@push('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">

    
    var $form = $("#payment-form");
     
    $('#payment-form').bind('submit', function(e) {
        e.preventDefault();
        $('#paymentError').addClass('hidden')
        if ($('#paySuccess')) {
            $('#paySuccess').addClass('hidden')
        }
        if ($('#payError')) {
            $('#payError').addClass('hidden')
        }
        var $form = $("#payment-form");
          Stripe.setPublishableKey('{{ env("STRIPE_KEY") }}');
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);    
    });

    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#paymentError')
                .removeClass('hidden')
                .find('#errorMsg')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.append("<input type='hidden' name='plan' value='{{$plan->id}}'/>");
            $form.get(0).submit();
        }
    }
     
</script>
@endpush