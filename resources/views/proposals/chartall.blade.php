

<!-- Component Start -->
<div class="flex flex-col mx-auto lg:flex-row">

<div class="flex flex-col items-center w-full max-w-screen-md pb-6 ">
		<div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">

			@foreach($calendar as $cal)
			@php
				$date1 = "2020-$cal->month-05";
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
				<a href="/proposals/date/{{$cal->year}}/{{$cal->month}}" class="relative flex justify-center w-full bg-wave-100" ></a>
				<a href="/proposals/date/{{$cal->year}}/{{$cal->month}}" class="relative flex justify-center w-full bg-wave-400"></a>
				<a href="/proposals/date/{{$cal->year}}/{{$cal->month}}" class="relative flex justify-center w-full bg-wave-500" style="height:{{$cal->data*2}}px"></a>
				<a href="/proposals/date/{{$cal->year}}/{{$cal->month}}" class="relative flex justify-center w-full bg-red-200"></a>
                <span class="absolute bottom-0" style="font-size: 10px;">
				<a href="/proposals/date/{{$cal->year}}/{{$cal->month}}">
				{{\Carbon\Carbon::parse($date1)->format('M')}} {{$cal->year}}
				</a>
				</span>
			</div>
			@endforeach            
		</div>
		<div class="flex w-full mt-3">
			<div class="flex items-center ml-auto">
				<span class="block w-4 h-4 bg-wave-500"></span>
				<span class="ml-1 text-xs font-medium">Partner offers \ Requested 💎 TON Crystals</span>
			</div>
		</div>
	</div>
</div>
	<!-- Component End  -->
