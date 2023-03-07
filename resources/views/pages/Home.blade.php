@extends('../app')

@section('content')
<header class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-16 mx-auto">
        <div class="items-center lg:flex">
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-lg">
                    <h1
                        class="text-3xl font-semibold text-gray-800 dark:text-white lg:text-4xl"
                    >
                        Best place to choose <br />
                        your <span class="text-[#e3329d]">IPTV</span>
                    </h1>

                    <p class="mt-3 mb-6 text-gray-600 dark:text-gray-400">
                        Find your perfect IPTV service on our platform. We offer a curated selection of options based on channel selection, picture quality, and pricing. Choose us for the ultimate IPTV experience.
                    </p>

                    <a
                    href="#pricing"
                        class="w-full cursor-pointer px-5 py-2 mt-6 text-sm tracking-wider text-white uppercase transition-colors duration-300 transform bg-[#f83584] rounded-lg lg:w-auto hover:bg-[#dd0066] focus:outline-none focus:bg-[#dd0066]"
                    >
                    Stream Smarter
                    </a>
                </div>
            </div>

            <div
                class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2"
            >
                <img
                    class="w-full h-full lg:max-w-3xl"
                    src="{{asset('/storage/icons/hero-img.svg')}}"
                    alt="Catalogue-pana.svg"
                />
            </div>
        </div>
    </div>
</header>
<x-slider.brand-slider />

<x-section.feature />

<x-section.testimonials />

<x-section.pricing :plans="$plans" />

<x-section.faq />

@endsection