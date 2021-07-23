@extends('theme::layouts.app')

@section('content')
<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
<div class="flex flex-col justify-start">
			<h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
				Free TON proposals 
			</h1>
			<p class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4">
            @if (isset($proposals) && isset($key))
            
            Searching results for <b>{{$key}}</b>: {{$proposals->count()}}
            @endif
			</p>
		</div>  
</div>
</br>
</div>
 
 
    @if (isset($proposals))
    <div class="grid sm:grid-cols-2 col-span-4 gap-6 my-6 px-4 md:px-6 lg:px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">   
    @foreach($proposals as $proposal)
        
    <div class="max-w-l mx-auto px-4 py-4 bg-white shadow-md rounded-lg">
      <div class="py-2 flex flex-row items-center justify-between">
        <div class="flex flex-row items-center">
          <a href="/proposals/category/{{$proposal->proposalCategory->id}} " class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
          @if ($proposal->proposalCategory->image)  
          <img class="rounded-full h-8 w-8 object-cover" src="/storage/{{ $proposal->proposalCategory->image }}" alt="">
          @else
          <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg fill="none"
								 stroke-linecap="round"
								 stroke-linejoin="round"
								 stroke-width="2"
								 viewBox="0 0 24 24"
								 stroke="currentColor"
								 class="h-6 w-6">
								<path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
							</svg>
						</span>
          @endif
          <p class="ml-2 text-base font-medium">{{$proposal->proposalCategory->title}} </p>
          </a>
        </div>
        <div class="flex flex-row items-center">
          <p class="text-xs font-semibold text-gray-500">🕥 {{ Carbon\Carbon::parse($proposal->created_at)->diffForHumans() }}</p>
        </div>
      </div>
      <div class="mt-2 image-h-animation">
        <a href="/proposals/show/{{$proposal->id}}">
        @if($proposal->image)
        <img class="object-cover w-full rounded-lg" src="/storage/{{$proposal->image}}" alt="" style="max-width: 1300px; max-height: 242px;">
        @else
        <img class="object-cover w-full rounded-lg" src="/storage/QNP1RbOScTqy6qhUjcyS.png" alt="" style="max-width: 1300px; max-height: 242px;">
        @endif
      </a>
        
        <div class="py-2 flex flex-row items-center">
        @if ($proposal->amount_requested)
        <span class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
        💎 <span class="ml-1">{{$proposal->amount_requested}}</span>
          </span>
        @endif
        <span class="flex flex-row items-center ml-3 focus:outline-none focus:shadow-outline rounded-lg">
        Status: <span title="Requested" class="ml-1">{{$proposal->proposalStatus->title}}</span>
          </span>
       
        </div>
      </div>
      <div class="py-2">
      <a href="/proposals/show/{{$proposal->id}}">
        <p class="leading-snug">{{$proposal->title}}</p>
      </a>  
      </div>
    </div>
      
	@endforeach
    </div>
</div>
    @else
        <p class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4" style="text-align: center;">
            No proposals found for your request ...
        </p>
        <div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5"></div>
    @endif
    

@endsection