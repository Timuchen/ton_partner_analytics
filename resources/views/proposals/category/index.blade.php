@extends('theme::layouts.app')

@section('content')

<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
<div class="flex flex-col justify-start">
			<h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
				Free TON proposals
			</h1>
			<span class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4 mt-10">
            {!! $category->description !!}
			</span>
      <ul class="flex self-start inline w-auto px-3 py-1 mt-3 text-xs font-medium text-gray-600 bg-blue-100 rounded-md">
				<li class="mr-4 font-bold text-blue-600 uppercase">Category:</li>
        <li class="text-blue-700"><a href="/proposals">Proposals</a></li>
        <li class="mx-2">&middot;</li>
				<li class="">{{ $category->title }}</li>
			</ul>
		</div>  
        </div>
        <br>
        <div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
<!-- Component Start -->
<div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl">
		
		<!-- Tile 1 -->
		<div class="flex items-center p-4 bg-white rounded">
			<div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
				<svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
				</svg>
			</div>
			<div class="flex-grow flex flex-col ml-4">
				<span class="text-xl font-bold">$8,430</span>
				<div class="flex items-center justify-between">
					<span class="text-gray-500">Revenue last 30 days</span>
					<span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span>
				</div>
			</div>
		</div>
		
		<!-- Tile 2 -->
		<div class="flex items-center p-4 bg-white rounded">
			<div class="flex flex-shrink-0 items-center justify-center bg-red-200 h-16 w-16 rounded">
				<svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
				</svg>
			</div>
			<div class="flex-grow flex flex-col ml-4">
				<span class="text-xl font-bold">211</span>
				<div class="flex items-center justify-between">
					<span class="text-gray-500">Sales last 30 days</span>
					<span class="text-red-500 text-sm font-semibold ml-2">-8.1%</span>
				</div>
			</div>
		</div>
		
		<!-- Tile 3 -->
		<div class="flex items-center p-4 bg-white rounded">
			<div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
				<svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
				</svg>
			</div>
			<div class="flex-grow flex flex-col ml-4">
				<span class="text-xl font-bold">140</span>
				<div class="flex items-center justify-between">
					<span class="text-gray-500">Customers last 30 days</span>
					<span class="text-green-500 text-sm font-semibold ml-2">+28.4%</span>
				</div>
			</div>
		</div>
		
	</div>
	<!-- Component End  -->
</div>
        <div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
        <div id="crossing" class="flex flex-col justify-start w-full lg:mr-3 lg:mb-0" style="max-width: 350px;">
			<ul class="flex flex-col w-full">
      @if ($subcategories->count() > 0)
      <li class="my-px">
					<span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Subcategories</span>

				</li>
      @endif
      @foreach($subcategories as $subcategory)
          <li class="my-px">
   <a href="/proposals/category/{{$subcategory->id}}"
      class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                 @if ( $subcategory->image )
                 <span class="flex items-center justify-center text-lg text-gray-400">
                             <img class="rounded-full h-8 w-8 object-cover" src="/storage/{{ $subcategory->image }}" alt="">
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
     <span class="ml-3">{{ $subcategory->title }}</span>
   </a>
 </li>
 
     @endforeach

				<li class="my-px">
					<span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Proposals categories</span>

				</li>
                @foreach($categories as $cat)
					
					
                 <li class="my-px">
					<a href="/proposals/category/{{$cat->id}}"
					   class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                        @if ( $cat->image )
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
        
    <div class="max-w-l mx-auto px-4 py-4 bg-white shadow-md rounded-lg">
      <div class="py-2 flex flex-row items-center justify-between">
        <div class="flex flex-row items-center">

          <a href="#" class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">

            @if ( $category->image )
                        <span class="flex items-center justify-center text-lg text-gray-400">
                        <img class="rounded-full h-8 w-8 object-cover" src="/storage/{{$category->image}}" alt="">
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

            <p class="ml-2 text-base font-medium">{{$category->title}}</p>
          </a>

        </div>
        <div class="flex flex-row items-center">
          <p class="text-xs font-semibold text-gray-500">🕥 {{ Carbon\Carbon::parse($proposal->created_at)->diffForHumans() }}</p>
        </div>
      </div>
      <div class="mt-2 image-h-animation">
        <a href="/proposals/show/{{$proposal->id}}">
        @if($proposal->image)
        <img class="object-cover w-full rounded-lg " src="/storage/{{$proposal->image}}" alt="" style="max-width: 1300px">
        @else
        <img class="object-cover w-full rounded-lg " src="/storage/QNP1RbOScTqy6qhUjcyS.png" alt="" style="max-width: 1300px">
        @endif
        </a>
        
        <div class="py-2 flex flex-row items-center">
        <a href="/login">
          <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            <span class="ml-1">0</span>
          </button>
        </a>
        <a href="/proposals/show/{{$proposal->id}}/#comments">
          <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            <span class="ml-1">0</span>
          </button>
        </a>
        @if($proposal->balance)
          <span class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
          💎 <span class="ml-1">{{$proposal->balance}}</span>
          </span>
        @endif

        </div>
      </div>
      <div class="py-2">
      <a href="/proposals/show/{{$proposal->id}}">
        <p class="leading-snug">{{$proposal->title}}</p>
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
</br>

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
  document.getElementById('control').onclick = function(){
  document.getElementById("crossing").classList.toggle("expand");
  if (document.getElementById('control').innerHTML != '↑ Roll up'){
    document.getElementById('control').innerHTML = '↑ Roll up';
  }else{
    document.getElementById('control').innerHTML = '↓ Show all categories...';
  }
  
}
</script>


@endsection
