<div x-show="mobileMenuOpen" x-transition:enter="duration-300 ease-out scale-100" x-transition:enter-start="opacity-50 scale-110" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-75 ease-in scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100" class="absolute inset-x-0 top-0 transition origin-top transform md:hidden">
    <div class="rounded-lg shadow-lg">
        <div class="bg-white divide-y-2 rounded-lg shadow-xs divide-gray-50">
            <div class="px-8 pt-6 pb-8 space-y-6">
                <div class="flex items-center justify-between mt-1">
                    <div>
                    <img class="h-9" src="{{ Voyager::image(theme('logo')) }}" alt="Company name">
                    </div>
                    <div class="-mr-2">
                        <button @click="mobileMenuOpen = false" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <nav class="grid row-gap-8">
                        <a href="{{ route('wave.dashboard') }}" class="flex items-center p-3 -m-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                            <div class="text-base font-medium leading-6 text-gray-900">
                                Dashboard
                            </div>
                        </a>
                        <a href="{{ route('proposals') }}" target="_blank" class="flex items-center p-3 -m-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                            <div class="text-base font-medium leading-6 text-gray-900">
                            Proposals & analytics
                            </div>
                        </a>

                        <a href="{{ route('analitics') }}" target="_blank" class="flex items-center p-3 -m-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                            <div class="text-base font-medium leading-6 text-gray-900">
                            Analytical summary
                            </div>
                        </a>

                        <a href="{{ route('wave.blog') }}" class="flex items-center p-3 -m-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                            <div class="text-base font-medium leading-6 text-gray-900">
                                News
                            </div>
                        </a>
                    </nav>


                </div>
                
            </div>
            <div class="px-8 py-6 space-y-6">
            <form class="flex sm:ml-6 sm:items-center h-full" action="/search" method="GET" role="search">
                    {{ csrf_field() }}
                    <input class="w-full rounded p-2 h-8 focus:outline-none" type="text" name="q" placeholder="Search...">
                    <button class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400 h-8 focus:outline-none">
                        <i class="material-icons relative p-1 ml-3 text-gray-400 transition duration-150 ease-in-out rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100">search</i>
                    </button>
                    </form>
            </div>  
        </div>
    </div>
</div>
