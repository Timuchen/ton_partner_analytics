@extends('theme::layouts.app')

@section('content')

<div class="relative flex items-center w-full">
        <div class="relative z-20 px-8 mx-auto xl:px-5 max-w-7xl">

            <div class="flex flex-col items-center h-full pt-16 pb-56 lg:flex-row">

                <div class="flex flex-col items-start w-full mb-16 md:items-center lg:pr-12 lg:items-start lg:w-1/2 lg:mb-0">

                    <h2 class="invisible text-sm font-semibold tracking-wide text-gray-700 uppercase transition-none duration-700 ease-out transform translate-y-12 opacity-0 sm:text-base lg:text-sm xl:text-base" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>{{ theme('home_headline') }}</h2>
                    <h1 class="invisible pb-2 mt-3 text-4xl font-extrabold leading-10 tracking-tight text-transparent transition-none duration-700 ease-out delay-150 transform translate-y-12 opacity-0 bg-clip-text bg-gradient-to-r from-blue-600 via-blue-500 to-purple-600 scale-10 md:my-5 sm:leading-none lg:text-5xl xl:text-6xl" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>{{ theme('home_subheadline') }}</h1>
                    <p class="invisible max-w-2xl mt-0 text-base text-left text-gray-600 transition-none duration-700 ease-out delay-300 transform translate-y-12 opacity-0 md:text-center lg:text-left sm:mt-2 md:mt-0 sm:text-base lg:text-lg xl:text-xl" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>{{ theme('home_description') }}</p>
                    <div class="invisible w-full mt-5 transition-none duration-700 ease-out transform translate-y-12 opacity-0 delay-450 sm:mt-8 sm:flex sm:justify-center lg:justify-start sm:w-auto" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "opacity-0": "opacity-100" }'>
                        <div class="rounded-md">
                            <a href="/proposals" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-500 hover:bg-wave-600 focus:outline-none focus:border-wave-600 focus:shadow-outline-indigo md:py-4 md:text-lg md:px-10">
                                Live analytics
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="/analitics" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-indigo-700 transition duration-150 ease-in-out bg-indigo-100 border-2 border-transparent rounded-md hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-300 md:py-4 md:text-lg md:px-10">
                                Analytical summary
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex w-full mb-16 lg:w-1/2 lg:mb-0">

                    <div class="relative invisible transition-none duration-1000 delay-100 transform translate-x-12 opacity-0" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-x-12": "translate-y-0", "opacity-0": "opacity-100" }'>
                        <img src="{{ Voyager::image(theme('home_promo_image')) }}" class="w-full max-w-3xl sm:w-auto">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- BEGINNING OF SECTION -->
    <div id="pricing" class="relative">

        <div class="relative z-20 px-8 pb-8 mx-auto max-w-7xl xl:px-5">
            <div class="w-full text-left sm:text-center">
                <h2 class="pt-12 text-4xl font-extrabold text-gray-900 lg:text-5xl">
                    <span class="tracking-tight text-transparent duration-700 ease-out delay-150 transform bg-clip-text bg-gradient-to-r from-blue-600 via-blue-500 to-purple-600 scale-10 md:my-5 transition-all visible translate-y-0 scale-100 opacity-100 hover:text-gray-900">All time</span> 
                    statistics</h2>
                <p class="w-full my-1 text-base text-left text-gray-900 opacity-75 sm:my-2 sm:text-center sm:text-xl">Here is a summary of the Free TON partnership offers for all time.</p>
            </div>
            <div class="flex flex-col px-8 mx-auto my-6 max-w-7xl xl:px-5">
                        <!-- Tabs -->
                        <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
                          <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">All</a></li>
                          <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">2020 + statuses</a></li>
                          <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">2021 + statuses</a></li>
                        </ul>

                        <!-- Tab Contents -->
                        <div id="tab-contents">
                          <div id="first">
                          @include('proposals.chartall', $calendar)
                          </div>
                          <div id="second" >
                          @include('proposals.chart2020')
                          </div>
                          <div id="third" >
                          @include('proposals.chart2021')
                          </div>
                        </div>
</div>
    <div class="w-full mt-5 duration-700 ease-out transform delay-450 sm:mt-8 sm:flex sm:justify-center sm:w-auto transition-all visible translate-y-0 opacity-100" data-replace="{ &quot;transition-none&quot;: &quot;transition-all&quot;, &quot;invisible&quot;: &quot;visible&quot;, &quot;translate-y-12&quot;: &quot;translate-y-0&quot;, &quot;opacity-0&quot;: &quot;opacity-100&quot; }">
                            <div class="rounded-md">
                                <a href="/proposals" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-500 hover:bg-wave-600 focus:outline-none focus:border-wave-600 focus:shadow-outline-indigo md:py-4 md:text-lg md:px-10">
                                    Live analytics
                                </a>
                            </div>
                        </div>

                <p class="w-full my-8 text-left text-gray-500 sm:my-10 sm:text-center">Use the section "live analytics" to get complete statistics on the specified parameters.</p>
            </div>
    </div>
    <!-- END OF SECTION -->
<style>
    .group:hover .group-hover\:block {
        display: flex;
    }
	.group:hover .group-hover\:block-2 {
        display: none;
    }
</style>
<script>
let tabsContainer = document.querySelector("#tabs");
let tabTogglers = tabsContainer.querySelectorAll("a");
console.log(tabTogglers);

tabTogglers.forEach(function(toggler) {
  toggler.addEventListener("click", function(e) {
    e.preventDefault();

    let tabName = this.getAttribute("href");

    let tabContents = document.querySelector("#tab-contents");

    for (let i = 0; i < tabContents.children.length; i++) {

      tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
      if ("#" + tabContents.children[i].id === tabName) {
        continue;
      }
      tabContents.children[i].classList.add("hidden");

    }
    e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
  });
});

document.getElementById("default-tab").click();

</script>
@endsection
