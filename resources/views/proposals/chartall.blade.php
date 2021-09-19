

<!-- Component Start -->
<div class="flex flex-col mx-auto lg:flex-row">

<div class="flex flex-col items-center w-full max-w-screen-md pb-6 ">
		<div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">

			@foreach($calendar as $cal)
			@php
				$date1 = "2020-$cal->month";
			@endphp
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 -mt-6 text-xs font-bold hidden group-hover:block" style="z-index: 1;font-size: 10px;color: #2852a8;margin-top: -15px;">
				@if($cal->amount_requested>0)
				{{$cal->amount_requested}}
				@else
				0
				@endif

				</span>
				<span class="absolute top-0 -mt-6 text-xs font-bold group-hover:block-2" style="z-index: 1;font-size: 10px;color: #2852a8;margin-top: -15px;">{{$cal->data}}</span>
				<a href="/proposals/date?year={{$cal->year}}&month={{$cal->month}}" class="relative flex justify-center w-full bg-wave-100" ></a>
				<a href="/proposals/date?year={{$cal->year}}&month={{$cal->month}}" class="relative flex justify-center w-full bg-wave-400"></a>
				<a href="/proposals/date?year={{$cal->year}}&month={{$cal->month}}" class="relative flex justify-center w-full bg-wave-500" style="height:{{$cal->data*2}}px"></a>
				<a href="/proposals/date?year={{$cal->year}}&month={{$cal->month}}" class="relative flex justify-center w-full bg-red-200"></a>
                <span class="absolute bottom-0" style="font-size: 10px;">
				<a href="/proposals/date?year={{$cal->year}}&month={{$cal->month}}">
				{{\Carbon\Carbon::parse($date1)->format('M')}} {{$cal->year}}
				</a>
				</span>
			</div>
			@endforeach            
		</div>
		<div class="flex w-full mt-3">
		<div class="flex items-center ml-4">
				<span class="ml-1 text-xs font-medium text-gray-400 transition duration-150 ease-in-out rounded-full hover:text-gray-500">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: left;">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
				</svg> Click to see analytics for the month
				</span>
		</div>
			<div class="flex items-center ml-auto">
				<span class="block w-4 h-4 bg-wave-500"></span>
				<span class="ml-1 text-xs font-medium">Partner offers \ Requested 💎 TON Crystals</span>
			</div>
		</div>
	</div>
</div>
	<!-- Component End  -->
