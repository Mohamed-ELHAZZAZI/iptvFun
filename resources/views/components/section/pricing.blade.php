@props(['plans'])

<section id="pricing" class="bg-white dark:bg-gray-900 pb-10  px-5 xl:px-16">
    <div class="text-center max-w-xl mx-auto">
        <span class=" flex text-center md:max-w-2xl font-bold sm:text-3xl text-xl mx-4 md:mx-auto mt-14 xl:mt-16 text-gray-700 dark:text-white">The Best IPTV Plans to Fit Your Lifestyle!</span>
        <div class="text-center mb-10">
            <span class="inline-block sm:w-56 w-40 h-1 rounded-full bg-[#dd0066]"></span>
            <span class="inline-block w-3 h-1 rounded-full bg-[#dd0066] ml-1"></span>
            <span class="inline-block w-1 h-1 rounded-full bg-[#dd0066] ml-1"></span>
            <span class="inline-block w-1 h-1 rounded-full bg-[#dd0066] ml-1"></span>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="grid gap-6 sm:mx-0  sm:gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            @foreach ($plans as $key => $plan)
            @php
                $dark =  $key == 2 ? true : false;
            @endphp
                <div class=" {{$dark ? 'bg-gray-800 rounded-lg dark:bg-slate-8 00' : 'dark:bg-gray-900 '}} hover:scale-[1.02] px-6 py-4 transition-colors duration-300 transform rounded-lg   border border-gray-300 shadow-xl">
                    <p class="{{$dark ? 'text-gray-100' : 'text-gray-800 dark:text-gray-100'}} text-lg font-medium ">{{$plan->type}}</p>

                    <span class="{{$dark ? 'text-gray-100' : 'text-gray-800 dark:text-gray-100'}} mt-2 text-3xl font-semibold ">${{$plan->price}} <span class="{{$dark ? 'text-gray-400' : 'text-gray-600 dark:text-gray-400'}} text-base font-norma">for {{$plan->period}}</span></span>
                    
                    <p class="{{$dark ? 'text-gray-300' : 'text-gray-500 dark:text-gray-300'}} mt-4">Affordable 1-month IPTV plan with a wide range of channels, catch-up TV, and high-quality streaming.</p>

                    <x-section.pricing-features :dark="$dark"/>

                    <a href="/checkout" class="w-full flex justify-center px-4 py-2 mt-10 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-[#f83584] hover:bg-[#dd0066] rounded-md  focus:outline-none">
                        Choose plan
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>