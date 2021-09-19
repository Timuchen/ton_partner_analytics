@extends('theme::layouts.app')

@section('content')

<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
<div class="flex flex-col justify-start">
			<h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
				Free TON partners proposals
			</h1>
			<p class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4">
				Partner offer analytics
			</p>

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
						{{$allProps->count()}}
					</p>
				</div>
			</div>
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
				<div class="p-3 mr-4 ml-2 text-green-500 bg-wave-100 rounded-full">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
					</svg>
					</svg>
				</div>
				<div>
					<p class="mt-2 text-sm font-medium text-gray-600">
					Funds requested
					</p>
					<p class="text-lg font-semibold text-gray-700">
						{{$allProps->sum('amount_requested')}}
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
						{{$allProps->sum('paid_amount')}}
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
					{{count($allProps->where('proposal_status_id','=',1))}}
					</p>
					<span class="text-green-500 text-sm font-semibold ml-2">+{{count($allProps->where('proposal_status_id','=',5))}} TON Seed</span>
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
                          @include('proposals.chart2020', $proposalMonth)
                          </div>
                          <div id="third" >
                          @include('proposals.chart2021')
                          </div>
                        </div>
</div>

        <div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
        <div id="crossing" class="flex flex-col justify-start w-full lg:mr-3 lg:mb-0" style="max-width: 350px;">
			<ul class="flex flex-col w-full">
				<li class="my-px">
				<div class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
					<span class="flex font-medium text-sm text-gray-400 uppercase">Categories proposails ({{$allProps->count()}})</span>
					<span class="flex items-center justify-center text-sm text-gray-500 font-semibold ml-auto"> 	
					<a style="cursor:pointer;" onclick="sortList(document.getElementsByClassName('list')[0]);">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
</svg>
					</a>
					</span>
					
				</div>
				</li>
				<ul class="flex flex-col w-full list">
                @foreach($categories as $cat)
					
					
                 <li class="my-px" style="font-size: 0px;">
				 {{$cat->proposals->count()}}
					<a href="/proposals/category/{{$cat->id}}" style="font-size: 14px;"
					   class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                        @if($cat->image)
						<span class="flex items-center justify-center text-lg text-gray-400">
                        <img class="rounded-full h-8 w-8 object-cover" src="/storage/{{ $cat->image }}" alt="">
						</span>
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
						<span class="ml-3">{{ $cat->title }}</span>
            <span class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">{{$cat->proposals->count()}}</span>
            </a>
				</li>
				
		        @endforeach
</ul>
                
        <li id="control" class="flex items-center justify-center text-sm text-gray-500 font-semibold hover:bg-blue-100 h-6 px-2 rounded-full">↓ Show all categories...</li>
			</ul>
      </br>
      @if(auth()->user())
      <ul class="flex flex-col w-full">
      <li class="my-px">
					<span class="flex font-medium text-sm text-gray-400 px-4 my-4 ">Publisher menu</span>
				</li>
				<li class="my-px">
					<a href="/proposals/create"
					   class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
						<span class="flex items-center justify-center text-lg text-green-400">
							<svg fill="none"
								 stroke-linecap="round"
								 stroke-linejoin="round"
								 stroke-width="2"
								 viewBox="0 0 24 24"
								 stroke="currentColor"
								 class="h-6 w-6">
								<path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
							</svg>
						</span>
						<span class="ml-3">Add new proposal</span>
					</a>
				</li>
        <a href="/proposals/category/create"
					   class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
						<span class="flex items-center justify-center text-lg text-gray-400">
            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
								<path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
							</svg>
						</span>
						<span class="ml-3">Add new category</span>
					</a>
				</li>

			</ul>
            @endif
		</div>

    <div class="grid sm:grid-cols-2 col-span-4 gap-6 my-6 px-4 md:px-6 lg:px-8">    
    @if ($proposals->count()>0)
    @foreach($proposals as $proposal)

    <div class="max-w-l mx-auto px-4 py-4 bg-white shadow-md rounded-lg" style="width: 100%;">
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
          <p class="text-xs font-semibold text-gray-500" style="min-width: 110px;">🕥 {{ Carbon\Carbon::parse($proposal->date_time)->diffForHumans() }}</p>
        </div>

      </div>


	  <div class="mt-2 image-h-animation">
        @if(isset($proposal->image))
        <a href="/proposals/show/{{$proposal->id}}">
        <img class="object-cover w-full rounded-lg" src="/storage/{{$proposal->image}}" alt="" style="max-width: 1300px; max-height: 242px;">
        </a>
        @else
        <a href="/proposals/show/{{$proposal->id}}">
        <img class="object-cover w-full rounded-lg" src="/storage/undraw_Asset_selection_re_k5fj.png" alt="" style="max-width: 1300px; max-height: 242px;">
        </a>
        @endif
		<div class="py-2 flex flex-row items-center">
		@if($proposal->wallet)
		<a href="https://ton.live/accounts/accountDetails?id={{$proposal->wallet}}" target="_blank" class="mr-2">
		<button class="flex flex-row items-center focus:outline-none text-gray-500 focus:shadow-outline rounded-lg">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
			</svg> 
		</button>
		</a>
        @endif
        @if ($proposal->amount_requested)
        <span class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg mr-2">
         💎 <span title="Requested" class="ml-1">{{$proposal->amount_requested}} </span>
        </span>
        @endif
        <span class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
		@if($proposal->proposalStatus->id == 1)
        <span title="Requested" class="ml-2 bg-green-400 pr-2 pl-2 rounded-full text-white">{{$proposal->proposalStatus->title}}</span>
		@elseif($proposal->proposalStatus->id == 2 || $proposal->proposalStatus->id ==4)
		<span title="Requested" class="ml-2 bg-red-400 pr-2 pl-2 rounded-full text-white">{{$proposal->proposalStatus->title}}</span>
		@elseif($proposal->proposalStatus->id == 5)
		<span title="Requested" class="ml-2 bg-yellow-400 pr-2 pl-2 rounded-full text-white">{{$proposal->proposalStatus->title}}</span>
		@else
		<span title="Requested" class="ml-2 bg-gray-200 pr-2 pl-2 rounded-full text-gray-800">{{$proposal->proposalStatus->title}}</span>
		@endif
          </span>
        </div>
      </div>
      <div class="py-2">
      <a href="/proposals/show/{{$proposal->id}}">
        <p class="leading-snug text-xl">{{$proposal->title}}</p>
      </a>  
      </div>
    </div>
	@endforeach
    @else
    <p class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4">
    Content coming soon ...
    </p>
    @endif
    </div>

</div>
<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5" style="max-width: 600px;">
{{ $proposals->links('theme::partials.pagination') }}
</div>
<style>
    .group:hover .group-hover\:block {
        display: flex;
    }
	.group:hover .group-hover\:block-2 {
        display: none;
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

