@extends('theme::layouts.app')

@section('content')

<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
<div class="flex flex-col justify-start">
			<h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
				Free TON proposals
			</h1>
			<p class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4">
                <span class="text-wave-500 hover:text-gray-500">Analytical summary -</span> Free TON network partners
			</p>
			<span class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4 mt-10">
            We received {{$proposals->count()}} inquiries from organizations in 17 areas of activity. 
            <br>{{$proposals->sum('amount_requested')}} TON Crystal have been requested and {{$proposals->sum('paid_amount')}} have been donated. 
            <br>{{count($proposals->where('proposal_status_id','=',1))}} partner offers accepted and {{count($proposals->where('proposal_status_id','=',5))}} projects per TON Seed were accepted.
			</span>
		</div>  
</div>

<!-- This is an example component -->
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div class="p-3 mr-4 ml-2 text-blue-500 bg-blue-100 rounded-full">
				<svg class="w-6 h-6 text-wave-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
				</div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
						Total Proposals
					</p>
					<p class="text-lg font-semibold text-gray-700">
						{{$proposals->count()}}
					</p>
				</div>
			</div>
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div class="p-3 mr-4 ml-2 text-green-500 bg-wave-100 rounded-full">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
					</svg>
				</div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
					Funds requested
					</p>
					<p class="text-lg font-semibold text-gray-700">
						{{$proposals->sum('amount_requested')}}
					</p>
				</div>
			</div>
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div class="p-3 mr-4 ml-2 text-red-500 bg-red-100 rounded-full">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-7a2 2 0 012-2h2m3-4H9a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-1m-1 4l-3 3m0 0l-3-3m3 3V3" />
				</svg>
				</div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
						Funds allocated
					</p>
					<p class="text-lg font-semibold text-gray-700">
						{{$proposals->sum('paid_amount')}}
					</p>
				</div>
			</div>
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div
					class="p-3 mr-4 ml-2 text-wave-500 bg-wave-100 rounded-full">
					<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="8" r="7"></circle>
						<polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
					</svg>
				</div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
						Approved by partners
					</p>
					<p class="text-lg font-semibold text-gray-700" style="float: left;">
					{{count($proposals->where('proposal_status_id','=',1))}}
					</p>
					<span class="text-green-500 text-sm font-semibold ml-2">+{{count($proposals->where('proposal_status_id','=',5))}} TON Seed</span>
					
				</div>
			</div>
		</div>
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


        <!-- This is an example component -->
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div class="p-3 mr-4 ml-2 text-green-500 bg-gray-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                </svg>				
            </div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
                        Number of categories
					</p>
					<p class="text-lg font-semibold text-gray-700">
						{{$categories->count()}}
					</p>
				</div>
			</div>
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div class="p-3 mr-4 ml-2 text-green-500 bg-wave-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                </svg>
				</div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
					Number of AMA Sessions
					</p>
					<p class="text-lg font-semibold text-gray-700">
						{{$ama->count()}}
					</p>
				</div>
			</div>
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div class="p-3 mr-4 ml-2 text-wave-500 bg-wave-100 rounded-full">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-7a2 2 0 012-2h2m3-4H9a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-1m-1 4l-3 3m0 0l-3-3m3 3V3" />
				</svg>
				</div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
                        Analytical reports
					</p>
					<p class="text-lg font-semibold text-gray-700">
						{{$reports->count()}}
					</p>
				</div>
			</div>
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div
					class="p-3 mr-4 ml-2 text-wave-500 bg-wave-100 rounded-full">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
					</svg>
				</div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
					Activity period (months)
					</p>
					<p class="text-lg font-semibold text-gray-700">
					{{count($proposalMonth)}}
					</p>
				</div>
			</div>
		</div>
	</div>

   
	<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
	    <div class="flex flex-col justify-start flex-1 mb-5 overflow-hidden bg-white border rounded-lg lg:mr-3 lg:mb-0 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-wave-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                </svg>				
                </div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
                        Partner application statuses
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
                        Reference for all time
	                </p>
				</div>

	        </div>
			
	        <div class="relative p-5">
				<h1 class="pl-10  text-gray-500 sm:pl-80  ">Approved by partners <span class=" text-xs text-green-400">
					{{round(count($proposals->where('proposal_status_id','=',1))/count($proposals->where('proposal_status_id'))*100, 2)}}%
				</span></h1>
				<div class="ml-10 sm:ml-80 h-4 relative w-60 rounded-full overflow-hidden">
					<div class=" w-full h-full bg-gray-200 absolute "></div>
					<div class=" h-full bg-green-400 sm:bg-green-500 absolute" style="width:{{round(count($proposals->where('proposal_status_id','=',1))/count($proposals->where('proposal_status_id'))*100, 2)}}%"></div>
				</div>

				<h1 class="pl-10 pt-2 text-gray-500 sm:pl-80">Rejected <span class=" text-xs text-red-500">{{round(count($proposals->where('proposal_status_id','=',2))/count($proposals->where('proposal_status_id'))*100, 2)}}%</span></h1>
				<div class="ml-10 sm:ml-80 h-4 relative w-60 rounded-full overflow-hidden">
					<div class=" w-full h-full bg-gray-200 absolute "></div>
					<div class=" h-full bg-red-500 sm:bg-wave-400 absolute" style="width:{{round(count($proposals->where('proposal_status_id','=',2))/count($proposals->where('proposal_status_id'))*100, 2)}}%"></div>
				</div>
				<h1 class="pl-10 pt-2 text-gray-500 sm:pl-80">Under consideration <span class=" text-xs text-wave-500">{{round(count($proposals->where('proposal_status_id','=',3))/count($proposals->where('proposal_status_id'))*100, 2)}}%</span></h1>
				<div class="ml-10 sm:ml-80 h-4 relative w-60 rounded-full overflow-hidden">
					<div class=" w-full h-full bg-gray-200 absolute "></div>
					<div class=" h-full bg-wave-400 sm:bg-red-500 absolute" style="width:{{round(count($proposals->where('proposal_status_id','=',3))/count($proposals->where('proposal_status_id'))*100, 2)}}%"></div>
				</div>
				<h1 class="pl-10 pt-2 text-gray-500 sm:pl-80">Canceled <span class=" text-xs text-gray-600">{{round(count($proposals->where('proposal_status_id','=',4))/count($proposals->where('proposal_status_id'))*100, 2)}}%</span></h1>
				<div class="ml-10 sm:ml-80 h-4 relative w-60 rounded-full overflow-hidden">
					<div class=" w-full h-full bg-gray-200 absolute "></div>
					<div class=" h-full bg-gray-800 sm:bg-indigo-500 absolute" style="width:{{round(count($proposals->where('proposal_status_id','=',4))/count($proposals->where('proposal_status_id'))*100, 2)}}%"></div>
				</div>
				<h1 class="pl-10 pt-2 text-gray-500 sm:pl-80">TON Seed approved <span class=" text-xs text-yellow-400">{{round(count($proposals->where('proposal_status_id','=',5))/count($proposals->where('proposal_status_id'))*100, 2)}}%</span></h1>
				<div class="ml-10 sm:ml-80 h-4 relative w-60 rounded-full overflow-hidden">
					<div class=" w-full h-full bg-gray-200 absolute "></div>
					<div class=" h-full bg-yellow-400 sm:bg-indigo-500 absolute" style="width:{{round(count($proposals->where('proposal_status_id','=',5))/count($proposals->where('proposal_status_id'))*100, 2)}}%"></div>
				</div>
				
			</div>
		</div>
		<div class="flex flex-col justify-start flex-1 overflow-hidden bg-white border rounded-lg lg:ml-3 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-wave-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                </svg>				</div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
                        Subject of proposals
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
                        Statistics by category of affiliate offers
	                </p>
				</div>

	        </div>
	        <div class="relative p-5">
				@foreach($categories as $cat)
				<a href="/proposals/category/{{$cat->id}}">
				<button type="button" class="focus:outline-none text-blue-600 text-sm py-2.5 px-5 rounded-full hover:bg-blue-50"
				style="font-size:1.{{$cat->proposals->count()-10}}rem;"
				>
					{{$cat->title}} <span class="text-green-500">{{$cat->proposals->count()}}</span>
				</button>
				</a>
				@endforeach
			</div>
		
			<div class="flex items-center ml-4">
				<span class="ml-1 text-xs font-medium text-gray-400 transition duration-150 ease-in-out rounded-full hover:text-gray-500">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: left;">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
				</svg> Click to see analytics for the category
				</span>
		</div>
	    </div>

		
	</div>
	<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
	    <div class="flex flex-col justify-start flex-1 mb-5 overflow-hidden bg-white border rounded-lg lg:mr-3 lg:mb-0 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-wave-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
				</svg>				</div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
					Partner rating analysis
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
					Average score (partners with a rating of zero are not taken into account)
	                </p>
				</div>

	        </div>
	        <div class="relative p-5">
			<a href="#journal-scroll">
			<div id="chartdiv"></div>
			</a>
			</div>
		</div>
		<div class="flex flex-col justify-start flex-1 overflow-hidden bg-white border rounded-lg lg:ml-3 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-wave-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
				</svg>				
			</div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
						Analysis of expenditure of funds
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
					Shows how quickly partners spent allocated tokens
	                </p>
				</div>

	        </div>
	        <div class="relative p-5">
			<div id="chartpay"></div>
			</div>
	    </div>

	</div>

	<style>
  #journal-scroll::-webkit-scrollbar {
            width: 4px;
            cursor: pointer;
            /*background-color: rgba(229, 231, 235, var(--bg-opacity));*/

        }
        #journal-scroll::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
            /*background: red;*/
        }
        #journal-scroll::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #a0aec0;
            /*outline: 1px solid slategrey;*/
        }
</style>
<div>
<div class="container mx-auto py-10 flex justify-center h-screen lg:flex-row max-w-7xl xl:px-5">
	<div class="w-4/12 pl-4  h-full flex flex-col">
                    <div class="bg-white text-ml text-gray-500 font-bold px-5 py-2">
                        All Partnerships 
                    </div>
                    <div class="w-full h-full overflow-auto shadow bg-white" style="overflow:auto;" id="journal-scroll">
                    <table class="w-full table_sort">
                        <tbody class="">
						<thead>
                            <tr class="relative transform scale-100
                                text-xs py-1 border-b-2 border-blue-100 cursor-default
                                bg-wave-100" style="position: sticky;top: 0;z-index:1;">
                                <th class="pl-3 pr-3 text-wave-500">Date</th>
                                <th class="pl-3 pr-3 text-wave-500">Title</th>
                                <th class="pl-3 pr-3 text-wave-500">Category</th>
                                <th class="pl-3 pr-3 text-wave-500">Status</th>
                                <th class="pl-3 pr-3 text-wave-500">Amount requested</th>
                                <th class="pl-3 pr-3 text-wave-500" style="width: 100px;">Paid amount</th>
                                <th class="pl-3 pr-3 text-wave-500">Forum</th>
								<th class="pl-3 pr-3 text-wave-500">Applicant</th>
                                <th class="pl-3 pr-3 text-wave-500">Application</th>
                                <th class="pl-3 pr-3 text-wave-500">Wallet</th>
                            </tr>
						</thead>
						<div class="flex items-center ml-4">
							<span class="ml-1 text-xs font-medium text-gray-400 transition duration-150 ease-in-out rounded-full hover:text-gray-500">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: left;">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
							</svg> Click to sort by content or open in a new tab
							</span>
					</div>
                        @foreach($proposals as $proposal)
                            <tr class="relative transform scale-100
                                text-xs py-1 border-b-2 border-blue-100 cursor-default
                                bg-opacity-25">
                                <td class="pl-3 pr-3 whitespace-no-wrap">
                                    <div>{{$proposal->date_time}}</div>
                                </td>
								
                                <td class="pl-3 pr-3 whitespace-no-wrap" style="max-width: 280px; cursor: pointer;" onclick="window.open('/proposals/show/{{$proposal->id}}')">
                                    <div class="hover:text-wave-500">{{$proposal->title}}</div>
                                </td>
								
                                <td class="pl-3 pr-3 whitespace-no-wrap" onclick="window.open('/proposals/category/{{$proposal->proposalCategory->id}}')" style="cursor: pointer;">
                                    <div class="hover:text-wave-500">{{$proposal->proposalCategory->title}}</div>
                                </td>
                                <td class="pl-3 pr-3 whitespace-no-wrap">
									@if($proposal->proposalStatus->id == 1)
									<div class="text-green-500">{{$proposal->proposalStatus->title}}</div>
									@elseif($proposal->proposalStatus->id == 2 || $proposal->proposalStatus->id == 4)
									<div class="text-red-500">{{$proposal->proposalStatus->title}}</div>
									@elseif($proposal->proposalStatus->id == 5)
									<div class="text-yellow-400">{{$proposal->proposalStatus->title}}</div>
									@else
									<div>{{$proposal->proposalStatus->title}}</div>
									@endif
                                   
                                </td>
								
                                <td class="pl-3 pr-3 whitespace-no-wrap">
								@if($proposal->amount_requested)
                                    <div>💎 {{$proposal->amount_requested}}</div>
								@endif
                                </td>
																
                                <td class="pl-3 pr-3 whitespace-no-wrap">
								@if($proposal->paid_amount)
                                    <div>💎 {{$proposal->paid_amount}}</div>
								@endif
                                </td>
								
                                <td class="pl-3 pr-3 whitespace-no-wrap">
								@if($proposal->url_forum)
                                    <a href="{{$proposal->url_forum}}" target="_blank"><div>🔗</div></a>
								@endif
                                </td>
								<td class="pl-3 pr-3 whitespace-no-wrap">
								@if($proposal->applicant)
								<a href="https://forum.freeton.org/u/{{$proposal->applicant}}" target="_blank">
                                	<div class="hover:text-wave-500">{{$proposal->applicant}}</div>
								</a>
								@endif
                                </td>
                                <td class="pl-3 pr-3 whitespace-no-wrap">
								@if($proposal->url_aplication)
                                <a href="{{$proposal->url_aplication}}" target="_blank"><div>🔗</div></a>
								@endif
                                </td>
                                <td class="pl-3 pr-3 whitespace-no-wrap" 
								@if($proposal->wallet)
								onclick="window.open('https://ton.live/accounts/accountDetails?id={{$proposal->wallet}}')" 
								style="cursor: pointer;"
								@endif
								>
								@if($proposal->wallet)
                                      <button class="flex flex-row items-center focus:outline-none text-gray-500 focus:shadow-outline rounded-lg">
                                    <svg style="float:left;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                        </svg> 
									@if(isset($proposal->proposalScore[0]->score))
									{{round($proposal->proposalScore[0]->score, 4)}}
									@else
									---
									@endif
                                    </button>
								@else
								No wallet
								@endif
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>

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

			<?php
  $mathIndex = 30.55;

?>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<script>

</script>
<script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chartMin = -50;
var chartMax = 100;



var data = {
  score: 52.7,
  gradingData: [
    {
      title: "Negative",
      color: "#ee1f25",
      lowScore: -100,
      highScore: -20
    },
    {
      title: "Suspicious",
      color: "#f04922",
      lowScore: -20,
      highScore: 0
    },
    {
      title: "Confirmed",
      color: "#fdae19",
      lowScore: 0,
      highScore: 20
    },
    {
      title: "Famous",
      color: "#f3eb0c",
      lowScore: 20,
      highScore: 40
    },
    {
      title: "Priority",
      color: "#b0d136",
      lowScore: 40,
      highScore: 60
    },
    {
      title: "Sustainable",
      color: "#54b947",
      lowScore: 60,
      highScore: 80
    },
    {
      title: "High efficiency",
      color: "#0f9747",
      lowScore: 80,
      highScore: 100
    }
  ]
};

/**
Grading Lookup
 */
function lookUpGrade(lookupScore, grades) {
  // Only change code below this line
  for (var i = 0; i < grades.length; i++) {
    if (
      grades[i].lowScore < lookupScore &&
      grades[i].highScore >= lookupScore
    ) {
      return grades[i];
    }
  }
  return null;
}

// create chart
var chart = am4core.create("chartdiv", am4charts.GaugeChart);
chart.hiddenState.properties.opacity = 0;
chart.fontSize = 11;
chart.innerRadius = am4core.percent(80);
chart.resizable = true;

/**
 * Normal axis
 */

var axis = chart.xAxes.push(new am4charts.ValueAxis());
axis.min = chartMin;
axis.max = chartMax;
axis.strictMinMax = true;
axis.renderer.radius = am4core.percent(80);
axis.renderer.inside = true;
axis.renderer.line.strokeOpacity = 0.1;
axis.renderer.ticks.template.disabled = false;
axis.renderer.ticks.template.strokeOpacity = 1;
axis.renderer.ticks.template.strokeWidth = 0.5;
axis.renderer.ticks.template.length = 5;
axis.renderer.grid.template.disabled = true;
axis.renderer.labels.template.radius = am4core.percent(15);
axis.renderer.labels.template.fontSize = "0.9em";

/**
 * Axis for ranges
 */

var axis2 = chart.xAxes.push(new am4charts.ValueAxis());
axis2.min = chartMin;
axis2.max = chartMax;
axis2.strictMinMax = true;
axis2.renderer.labels.template.disabled = true;
axis2.renderer.ticks.template.disabled = true;
axis2.renderer.grid.template.disabled = false;
axis2.renderer.grid.template.opacity = 0.5;
axis2.renderer.labels.template.bent = true;
axis2.renderer.labels.template.fill = am4core.color("#000");
axis2.renderer.labels.template.fontWeight = "bold";
axis2.renderer.labels.template.fillOpacity = 0.3;



/**
Ranges
*/

for (let grading of data.gradingData) {
  var range = axis2.axisRanges.create();
  range.axisFill.fill = am4core.color(grading.color);
  range.axisFill.fillOpacity = 0.8;
  range.axisFill.zIndex = -1;
  range.value = grading.lowScore > chartMin ? grading.lowScore : chartMin;
  range.endValue = grading.highScore < chartMax ? grading.highScore : chartMax;
  range.grid.strokeOpacity = 0;
  range.stroke = am4core.color(grading.color).lighten(-0.1);
  range.label.inside = true;
  range.label.text = grading.title.toUpperCase();
  range.label.inside = true;
  range.label.location = 0.5;
  range.label.inside = true;
  range.label.radius = am4core.percent(10);
  range.label.paddingBottom = -5; // ~half font size
  range.label.fontSize = "0.9em";
}

var matchingGrade = lookUpGrade(data.score, data.gradingData);

/**
 * Label 1
 */

var label = chart.radarContainer.createChild(am4core.Label);
label.isMeasured = false;
label.fontSize = "6em";
label.x = am4core.percent(50);
label.paddingBottom = 15;
label.horizontalCenter = "middle";
label.verticalCenter = "bottom";
//label.dataItem = data;
label.text = data.score.toFixed(1);
//label.text = "{score}";
label.fill = am4core.color(matchingGrade.color);

/**
 * Label 2
 */

var label2 = chart.radarContainer.createChild(am4core.Label);
label2.isMeasured = false;
label2.fontSize = "2em";
label2.horizontalCenter = "middle";
label2.verticalCenter = "bottom";
label2.text = matchingGrade.title.toUpperCase();
label2.fill = am4core.color(matchingGrade.color);


/**
 * Hand
 */

var hand = chart.hands.push(new am4charts.ClockHand());
hand.axis = axis2;
hand.innerRadius = am4core.percent(55);
hand.startWidth = 8;
hand.pin.disabled = true;
hand.value = data.score;
hand.fill = am4core.color("#444");
hand.stroke = am4core.color("#000");

hand.events.on("positionchanged", function(){
  label.text = axis2.positionToValue(hand.currentPosition).toFixed(1);
  var value2 = axis.positionToValue(hand.currentPosition);
  var matchingGrade = lookUpGrade(axis.positionToValue(hand.currentPosition), data.gradingData);
  label2.text = matchingGrade.title.toUpperCase();
  label2.fill = am4core.color(matchingGrade.color);
  label2.stroke = am4core.color(matchingGrade.color);  
  label.fill = am4core.color(matchingGrade.color);
})

setInterval(function() {
    var value = <?php echo $mathIndex; ?>;
    hand.showValue(value, 1000, am4core.ease.cubicOut);
}, 2000);
</script>
<style>
    .group:hover .group-hover\:block {
        display: flex;
    }
	.group:hover .group-hover\:block-2 {
        display: none;
    }
	.iframe-content iframe {
    width: 100%;
    aspect-ratio: 18 / 9;
    overflow: hidden;
    margin-bottom: -44px;
}

</style>

<style>
  #control{
    text-align:center;
  }
  #crossing ul li:nth-child(n+8) {
  display:none;
}

#crossing.expand ul li:nth-child(n+8) {
  display:list-item;
}

#crossing ul li#control {
  display:list-item;
  margin-top: 15px;
  cursor:pointer;
}

.table_sort th {
    cursor: pointer;
}
.table_sort tbody tr:nth-child(even) {
    background: #f2fbff;
}

th.sorted[data-order="1"],
th.sorted[data-order="-1"] {
    position: relative;
}

th.sorted[data-order="1"]::after,
th.sorted[data-order="-1"]::after {
    right: 8px;
    position: absolute;
}

th.sorted[data-order="-1"]::after {
	content: "▼"
}

th.sorted[data-order="1"]::after {
	content: "▲"
}
#chartdiv {
  width: 100%;
  height: 300px;
}
iframe .logoBar{
	display: none;
}

iframe {
    display: block;
    vertical-align: middle;
    width: 100%;
    height: 800px;
}
#chartpay {
  width: 100%;
  height: 300px;
}
</style>
<script>
	function sortList(ul){
    var new_ul = ul.cloneNode(false);

    // Add all lis to an array
    var lis = [];
    for(var i = ul.childNodes.length; i--;){
        if(ul.childNodes[i].nodeName === 'LI')
            lis.push(ul.childNodes[i]);
    }

    // Sort the lis in descending order
    lis.sort(function(a, b){
       return parseInt(b.childNodes[0].data , 10) - 
              parseInt(a.childNodes[0].data , 10);
    });

    // Add them into the ul in order
    for(var i = 0; i < lis.length; i++)
        new_ul.appendChild(lis[i]);
    ul.parentNode.replaceChild(new_ul, ul);
}
</script>
<script>
  document.getElementById('control').onclick = function(){
  document.getElementById("crossing").classList.toggle("expand");
  if (document.getElementById('control').innerHTML != '↑ Roll up'){
    document.getElementById('control').innerHTML = '↑ Roll up';
  }else{
    document.getElementById('control').innerHTML = '↓ Show all categories...';
  }
  
}
</script>
<script>
	document.addEventListener('DOMContentLoaded', () => {

	const getSort = ({ target }) => {
		const order = (target.dataset.order = -(target.dataset.order || -1));
		const index = [...target.parentNode.cells].indexOf(target);
		const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
		const comparator = (index, order) => (a, b) => order * collator.compare(
			a.children[index].innerHTML,
			b.children[index].innerHTML
		);
		
		for(const tBody of target.closest('table').tBodies)
			tBody.append(...[...tBody.rows].sort(comparator(index, order)));

		for(const cell of target.parentNode.cells)
			cell.classList.toggle('sorted', cell === target);
};

document.querySelectorAll('.table_sort thead').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));

});
</script>
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