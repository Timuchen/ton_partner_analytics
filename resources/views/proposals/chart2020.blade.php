
<!-- Component Start -->
<div class="flex flex-col mx-auto lg:flex-row">

<div class="flex flex-col items-center w-full max-w-screen-md pb-6 ">
		<div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">
			
		@foreach($proposalMonth as $key => $value)
		@if(substr($key, -4)==2020)
		@php
			$crystal = 0;
			$crystalPaid = 0;
			$accepted = 0;
			$rejected = 0;
			$consideration = 0;
			$canseled = 0;
			$seed = 0;
		@endphp
		<div class="relative flex flex-col items-center flex-grow pb-5 group">

		@foreach($value as $props)
		@php
			$crystal += $props['amount_requested'];
			$crystalPaid += $props['paid_amount'];
			if($props['proposal_status_id'] == 1){
				$accepted++;
			}
			elseif($props['proposal_status_id'] == 2){
				$rejected++;
			}
			elseif($props['proposal_status_id'] == 3){
				$consideration++;
			}
			elseif($props['proposal_status_id'] == 4){
				$canseled++;
			}
			elseif($props['proposal_status_id'] == 5){
				$seed++;
			}
			if($props['date_time']){
				$dateTime = $props['date_time'];
			}
		@endphp
		@endforeach

		<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block"
		style="z-index: 1;font-size: 10px;color: #2852a8;margin-top: -15px;"
		>{{$crystal}} \ <span class="text-green-500"> {{$crystalPaid}}</span></span>
		<a href="/proposals/date?year={{substr($key, -4)}}&month={{\Carbon\Carbon::parse($dateTime)->format('m') }}" class="relative flex justify-center w-full bg-wave-100" style="height:{{$consideration*2}}px"></a>
		<a href="/proposals/date?year={{substr($key, -4)}}&month={{\Carbon\Carbon::parse($dateTime)->format('m') }}" class="relative flex justify-center w-full bg-wave-500" style="height:{{$accepted*2}}px"></a>
		<a href="/proposals/date?year={{substr($key, -4)}}&month={{\Carbon\Carbon::parse($dateTime)->format('m') }}" class="relative flex justify-center w-full bg-red-400" style="height:{{$rejected*2}}px"></a>
		<a href="/proposals/date?year={{substr($key, -4)}}&month={{\Carbon\Carbon::parse($dateTime)->format('m') }}" class="relative flex justify-center w-full bg-red-200" style="height:{{$canseled*2}}px"></a>
		<a href="/proposals/date?year={{substr($key, -4)}}&month={{\Carbon\Carbon::parse($dateTime)->format('m') }}" class="relative flex justify-center w-full bg-yellow-400 absolute" style="height:{{$seed*2}}px"></a>
		<span class="absolute bottom-0 text-xs font-bold">
			<a href="/proposals/date?year={{substr($key, -4)}}&month={{\Carbon\Carbon::parse($dateTime)->format('m') }}">
				{{substr($key, 0, -4)}}
			</a>
		</span>
		</div>
		@endif
		@endforeach			
		</div>

		<div class="flex w-full mt-3">
			<div class="flex items-center ml-4">
				<span class="ml-1 text-xs font-medium">💎 Requested \ <span class="text-green-500">Issued by</span> TON Crystals</span>
			</div>
			<div class="flex items-center ml-auto">
				<span class="block w-4 h-4 bg-wave-500"></span>
				<span class="ml-1 text-xs font-medium">Accepted</span>
			</div>
			<div class="flex items-center ml-4">
				<span class="block w-4 h-4 bg-wave-100"></span>
				<span class="ml-1 text-xs font-medium">Under consideration</span>
			</div>
			<div class="flex items-center ml-4">
				<span class="block w-4 h-4 bg-red-400"></span>
				<span class="ml-1 text-xs font-medium">Rejected</span>
			</div>
			<div class="flex items-center ml-4">
				<span class="block w-4 h-4 bg-red-200"></span>
				<span class="ml-1 text-xs font-medium">Canceled</span>
			</div>
			<div class="flex items-center ml-4">
				<span class="block w-4 h-4 bg-yellow-400"></span>
				<span class="ml-1 text-xs font-medium">TON Seed</span>
			</div>
		</div>
	</div>
</div>
	<!-- Component End  -->
