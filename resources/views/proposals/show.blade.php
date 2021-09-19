@extends('theme::layouts.app')

@section('content')

<div class="max-w-4xl px-5 mx-auto mt-10 lg:px-0">
        <a href="{{ route('proposals') }}" class="flex items-center mb-6 font-mono text-sm font-bold cursor-pointer text-wave-500">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            back to section
        </a>
    </div>



        <div class="max-w-4xl mx-auto mt-6 max-w-4xl px-5 mx-auto prose prose-xl lg:prose-2xl lg:px-0">
        <h3 class="flex flex-col leading-none">
          <span>{{ $proposal->title }}</span>
            <span class="mt-0 text-base font-normal">Written on 
            <time datetime="{{ Carbon\Carbon::parse($proposal->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($proposal->created_at)->toFormattedDateString() }}</time>. 
            Posted in <a class="text-wave-500" href="/proposals/category/{{$proposal->proposalCategory->id}}">{{$proposal->proposalCategory->title}}</a>. 
            <a href="#" id="show-text" class="inline-flex float-right px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" style="float:right;text-decoration: none;">
            ↓ Show description...
	          </a>
          </span>
        </h3>
        </div>



        <article id="post-{{ $proposal->id }}" class="max-w-4xl px-5 mx-auto prose prose-xl lg:prose-2xl lg:px-0">
    <meta property="name" content="{{ $proposal->title }}">
        <meta property="author" typeof="Person" content="admin">
        <meta property="dateModified" content="{{ Carbon\Carbon::parse($proposal->updated_at)->toIso8601String() }}">
        <meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($proposal->created_at)->toIso8601String() }}">
        <div id="crossing" class="hidden">
        <div class="relative">
          @if($proposal->image)
            <img class="w-full h-auto rounded-lg" src="/storage/{{ $proposal->image }}" alt="{{ $proposal->title }}">
          @else
          <img class="w-full h-auto rounded-lg" src="/storage/QNP1RbOScTqy6qhUjcyS.png" alt="{{ $proposal->title }}">
            @endif
          </div>        
       <div span class="mt-0 mt-10 text-base font-normal">
          <p class="text-sm font-normal">
           {!! $proposal->description !!}
          </p>
        </div>
    </div>

    </article> 


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
                        Partner application status
	                </h3>
                  @if($proposal->proposalStatus->id == 1)
	                <p class="text-sm leading-5 text-gray-500 mt" style="float: left;">
                        Current status: <span class="font-bold text-green-500">- {{$proposal->proposalStatus->title}}</span>
	                </p>
                  @if($proposal->url_aplication)
                  <a  href="{{ $proposal->url_aplication }}" target="_blank" class="text-sm leading-5 text-gray-500 mt hover:text-wave-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: left;margin-left: 10px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                  </svg></a> 
                  @endif
                  @elseif($proposal->proposalStatus->id == 2)
	                <p class="text-sm leading-5 text-gray-500 mt">
                        Current status: <span class="font-bold text-red-500">- {{$proposal->proposalStatus->title}}</span>
	                </p>
                  @if($proposal->url_aplication)
                  <a  href="{{ $proposal->url_aplication }}" target="_blank" class="text-sm leading-5 text-gray-500 mt hover:text-wave-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: left;margin-left: 10px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                  </svg></a> 
                  @endif
                  @else
                  <p class="text-sm leading-5 text-gray-500 mt">
                        Current status: <span class="font-bold text-wave-500">- {{$proposal->proposalStatus->title}}</span>
	                </p>
                  @endif
                  @if($proposal->url_aplication)
          @endif
				</div>

	        </div>
	        <div class="relative p-5">
          @if ($proposal->amount_requested)
              <div class="max-w-4xl mx-auto">
                Amount requested: 💎 {{ $proposal->amount_requested }}
              </div>
          @endif
          @if($proposal->paid_amount)
              <div class="max-w-4xl mx-auto ">

              Paid amount: 💎 {{ $proposal->paid_amount }}
              
              @if(isset($proposal->proposalScore[0]->score))
              <br>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: left;margin-right: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
              </svg>  
              Wallet Balance: {{ $proposal->proposalScore[0]->score }}
              @endif
              </div>
              @if($proposal->wallet)
              <a href="https://ton.live/accounts/accountDetails?id={{$proposal->wallet}}" target="_blank" class="inline-flex float-right px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" style="float:right;text-decoration: none;margin-top:-45px;">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
              </svg> View payout statistics
	          </a>
            @endif
          @endif

          @if($proposal->applicant)
          <div class="col-span-3 row-span-1" style="float: left;">
      <div class="flex align-bottom flex-col leading-none p-2 md:p-4">
        <div class="flex flex-row justify-between items-center">
          <a
            class="flex items-center no-underline hover:underline text-black"
            href="https://forum.freeton.org/u/{{ $proposal->applicant }}" target="_blank"
          >
            <img
              alt="Placeholder"
              class="block rounded-full"
              src="https://avatars.discourse-cdn.com/v4/letter/{{substr($proposal->applicant, 0)}}/ee7513/32.png"
            />
            <span class="ml-2 text-sm"> {{ $proposal->applicant }} </span>
          </a>
        </div>
      </div>
    </div>
          @endif
          @if($proposal->url_forum)
              <div class="max-w-4xl mx-auto cursor-pointer text-wave-500 mt-3">
                <a  href="{{ $proposal->url_forum }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: left;">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                  Forum URL</a> 
              </div>
          @endif



			</div>
		</div>
		<div class="flex flex-col justify-start flex-1 overflow-hidden bg-white border rounded-lg lg:ml-3 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
					<svg class="w-6 h-6 text-wave-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path></svg>
				</div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
                    AMA session
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
                  Partner proposal presentation and discussion
	                </p>
				</div>

	        </div>
	        <div class="relative p-5">
       
          @if($proposal->proposalAmas->count()>0)
          @foreach($proposal->proposalAmas as $ama)
          {{$ama->title}}
          {!! $ama->description !!}
          @endforeach
        @else
        
        <svg xmlns="http://www.w3.org/2000/svg" id="bbb60ac6-49e8-43f4-8a0f-978884ae8ca0" data-name="Layer 1" height="200" viewBox="0 0 766 663.78"><path d="M292.871,732.64839c-6.9791,23.31316,3.85236,47.1484,3.85236,47.1484s22.14678-13.96279,29.12586-37.276-3.85236-47.14841-3.85236-47.14841S299.85012,709.33525,292.871,732.64839Z" transform="translate(-217 -118.11)" fill="#f2f2f2"/><path d="M303.4675,733.27893c5.87388,23.61585-6.0677,46.91481-6.0677,46.91481s-21.465-14.98989-27.33882-38.60574,6.06764-46.91479,6.06764-46.91479S297.59362,709.66308,303.4675,733.27893Z" transform="translate(-217 -118.11)" fill="#f2f2f2"/><polygon points="435.535 638.619 439.977 627.192 398.017 604.619 391.461 621.484 435.535 638.619" fill="#ffb8b8"/><path d="M676.33666,726.91969a15.37868,15.37868,0,0,0-19.91544,8.7659l-2.9969,7.703-4.62021,11.89009-1.12945,2.91539,14.80606,5.75954,14.32146-36.84918Z" transform="translate(-217 -118.11)" fill="#2f2e41"/><path d="M648.80588,734.73787l-1.93215,5.12355-4.82182,12.78824-.11567.31983c-12.28491,1.57847-25.75239-1.516-38.20882-6.32324a155.31182,155.31182,0,0,1-14.62441-6.52576c-7.04426-3.5593-13.35151-7.31588-18.38323-10.52878-7.57588-4.86233-12.26034-8.51324-12.26034-8.51324s-1.23757,1.11835-3.477,3.03611c-3.00151,2.56814-7.79768,6.57847-13.87288,11.29915q-3.47624,2.7201-7.46478,5.69034c-19.60112,14.53884-44.75556-24.2561-44.75556-24.2561s7.07456-4.504,8.92274-5.37858c5.95119-2.81556,19.93229-9.4593,31.99433-15.36345,6.21425-3.04642,11.91181-5.90255,15.73713-7.93248,13.54579-7.212,30.38421,6.43472,30.38421,6.43472Z" transform="translate(-217 -118.11)" fill="#2f2e41"/><path d="M648.80588,734.73787l-1.93215,5.12355-4.82182,12.78824-.11567.31983c-12.28491,1.57847-25.75239-1.516-38.20882-6.32324a155.31182,155.31182,0,0,1-14.62441-6.52576c-7.04426-3.5593-13.35151-7.31588-18.38323-10.52878-7.57588-4.86233-12.26034-8.51324-12.26034-8.51324s-1.23757,1.11835-3.477,3.03611c-3.00151,2.56814-7.79768,6.57847-13.87288,11.29915q-3.47624,2.7201-7.46478,5.69034c-19.60112,14.53884-44.75556-24.2561-44.75556-24.2561s7.07456-4.504,8.92274-5.37858c5.95119-2.81556,19.93229-9.4593,31.99433-15.36345,6.21425-3.04642,11.91181-5.90255,15.73713-7.93248,13.54579-7.212,30.38421,6.43472,30.38421,6.43472Z" transform="translate(-217 -118.11)" opacity="0.14"/><circle cx="183.57878" cy="172.3117" r="172.3117" fill="#63b9ff"/><path d="M273.34937,175.331A172.32514,172.32514,0,0,0,560.4716,357.70067,172.32654,172.32654,0,1,1,273.34937,175.331Z" transform="translate(-217 -118.11)" opacity="0.2" style="isolation:isolate"/><polygon points="184.052 172.311 184.526 172.311 193.047 660.843 175.058 660.843 184.052 172.311" fill="#3f3d56"/><rect x="382.52342" y="507.1554" width="8.5209" height="32.19013" transform="translate(-473.4058 503.62826) rotate(-62.23413)" fill="#3f3d56"/><path d="M982,780.89786H218a1,1,0,0,1,0-2H982a1,1,0,0,1,0,2Z" transform="translate(-217 -118.11)" fill="#3f3d56"/><path d="M452.746,627.18653h-58a4.50508,4.50508,0,0,1-4.5-4.5v-25a33.5,33.5,0,0,1,67,0v25A4.50508,4.50508,0,0,1,452.746,627.18653Z" transform="translate(-217 -118.11)" fill="#2f2e41"/><path d="M507.9036,658.58833a9.377,9.377,0,0,0-7.1855,12.45427l-15.77152,14.50579,6.47754,11.7343,21.98473-20.7978a9.42779,9.42779,0,0,0-5.50525-17.89656Z" transform="translate(-217 -118.11)" fill="#ffb8b8"/><path d="M460.44794,724.54q-1.06862,0-2.14038-.09229A25.19929,25.19929,0,0,1,438.01,710.89248l-25.26734-48.63281a13.95418,13.95418,0,0,1,24.12989-13.96484l23.31079,52.30371,31.71924-25.772,18.36572,7.14941-31.01611,34.2417A25.48478,25.48478,0,0,1,460.44794,724.54Z" transform="translate(-217 -118.11)" fill="#ccc"/><path d="M553.91347,649.39517l-28.10169-28.10174a5.24193,5.24193,0,0,0-7.41315,0l-25.2799,25.27991a5.24192,5.24192,0,0,0,0,7.41314l26.25647,26.25647a5.24188,5.24188,0,0,0,7.13348.26l27.12512-23.43463a5.24189,5.24189,0,0,0,.53968-7.39349Q554.04859,649.53036,553.91347,649.39517Z" transform="translate(-217 -118.11)" fill="#3f3d56"/><polygon points="332.935 536.213 304.009 507.288 280.138 531.159 307.941 558.961 332.935 536.213" fill="#f2f2f2"/><circle cx="306.05974" cy="532.88576" r="11.74605" fill="#63b9ff"/><path d="M528.28786,661.00711a11.74609,11.74609,0,0,0-11.96552-19.632,11.74565,11.74565,0,1,1,10.65973,20.69257A11.8299,11.8299,0,0,0,528.28786,661.00711Z" transform="translate(-217 -118.11)" opacity="0.1" style="isolation:isolate"/><path d="M517.2848,648.66159c-1.40075,1.31617-1.47485,6.05414.66394,8.33039s5.68061,1.22888,7.08136-.08728.13013-2.40278-2.00872-4.67908S518.68562,647.34543,517.2848,648.66159Z" transform="translate(-217 -118.11)" fill="#f2f2f2"/><circle cx="312.20912" cy="533.07722" r="3.4803" fill="#2f2e41"/><circle cx="305.95329" cy="526.41933" r="3.4803" fill="#2f2e41"/><circle cx="312.20912" cy="533.07722" r="0.87007" fill="#f2f2f2"/><circle cx="312.58363" cy="530.93452" r="0.43504" fill="#f2f2f2"/><circle cx="306.32777" cy="524.27663" r="0.43504" fill="#f2f2f2"/><circle cx="305.95329" cy="526.41933" r="0.87007" fill="#f2f2f2"/><polygon points="431.99 654.69 437.297 643.639 397.196 617.909 389.363 634.22 431.99 654.69" fill="#ffb8b8"/><path d="M675.01215,744.90787a15.37868,15.37868,0,0,0-20.53,7.21l-3.57984,7.45-5.52,11.5-1.35009,2.82,14.31982,6.88,17.11011-35.64Z" transform="translate(-217 -118.11)" fill="#2f2e41"/><path d="M646.9621,750.58786l-2.32007,4.96-5.79,12.38-.13989.31c-12.36988.63-25.55982-3.49-37.61011-9.24a155.31151,155.31151,0,0,1-14.07983-7.63c-6.75-4.09-12.75-8.32-17.52-11.91-7.17994-5.43-11.57007-9.43-11.57007-9.43s-1.31983,1.02-3.69995,2.76c-3.18995,2.33-8.28,5.96-14.7,10.2q-3.67494,2.445-7.87989,5.1c-20.66015,12.99-50.04,28.81-75.03027,32.15-43.88989,5.87-33.55982-52.7-33.55982-52.7l34.92994-18.14,14.83007,3.01,16.51,3.34,5.84986,1.19s1.1101-.42,3.02-1.15c6.1499-2.35,20.60009-7.9,33.08008-12.86005,6.42993-2.56,12.33007-4.97,16.3-6.7,14.05982-6.15,29.8,8.75,29.8,8.75Z" transform="translate(-217 -118.11)" fill="#2f2e41"/><path d="M359.14474,781.63626a9.377,9.377,0,0,0,6.532-12.80913l15.00042-15.30183-7.07558-11.3837-20.88,21.90668a9.42779,9.42779,0,0,0,6.4232,17.588Z" transform="translate(-217 -118.11)" fill="#ffb8b8"/><circle cx="214.9579" cy="486.80653" r="23.38625" fill="#ffb8b8"/><path d="M401.53314,669.83389,421.905,727.58975l-.12232.20215c-2.83349,4.68408-3.75952,8.4624-2.67773,10.92627a4.76117,4.76117,0,0,0,3.01855,2.604l48.20874-33.69678-1.688-13.50537.094-.15088c4.65967-7.45556,6.16846-14.20751,4.48511-20.06738-2.18433-7.604-9.12549-11.05615-9.19532-11.09033l-.168-.13232L439.81512,633.414,407.673,639.12442Z" transform="translate(-217 -118.11)" fill="#ccc"/><path d="M370.55316,771.20938,356.9057,754.4125l32.89941-54.30957,15.33863-47.41259.47583.1538-.47583-.1538a19.04653,19.04653,0,1,1,33.96362,16.43652l-28.15967,42.189Z" transform="translate(-217 -118.11)" fill="#ccc"/><path d="M465.17131,600.18653H429.70573l-.36377-5.0918-1.81836,5.0918h-5.46093l-.72071-10.0918-3.604,10.0918H407.17131v-.5a26.52975,26.52975,0,0,1,26.49975-26.5h5.00025a26.53,26.53,0,0,1,26.5,26.5Z" transform="translate(-217 -118.11)" fill="#2f2e41"/><path d="M429.41548,631.85328a4.5972,4.5972,0,0,1-.79639-.07031l-25.96948-4.582V584.281H431.237l-.70777.8252c-9.84716,11.48437-2.42846,30.10645,2.87012,40.18457a4.43339,4.43339,0,0,1-.35229,4.707A4.48192,4.48192,0,0,1,429.41548,631.85328Z" transform="translate(-217 -118.11)" fill="#2f2e41"/><circle cx="588.13918" cy="324.68944" r="113.99999" fill="#3f3d56"/><path d="M775.99213,398.48812v96.99122a2.49731,2.49731,0,0,0,3.74028,2.30172l76.88333-48.49562a2.74779,2.74779,0,0,0,0-4.57144l-76.88333-48.49563a2.47393,2.47393,0,0,0-3.74028,2.26975Z" transform="translate(-217 -118.11)" fill="#f2f2f2"/></svg>
        <span class="text-gray-400 text-center">AMA session has not yet taken place or we did not have time to publish it</span>
        @endif
         
			</div>
	    </div>

	</div>
  <div class="max-w-4xl mx-auto mt-6 max-w-4xl px-5 mx-auto prose prose-xl lg:prose-2xl lg:px-0">
    <h3 style="margin-bottom: 1px;">Partner rating</h3>
    <span class="mt-0 text-base font-normal text-gray-400">
      It is generated automatically based on the received data. 
      You can improve partner statistics by adding analytical reports.
    </span>
  </div>
  <div id="chartdiv"></div>
  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
  <br>

      <a href="/login" style="text-align:center;" class="block mt-1 text-lg leading-tight text-gray-500 font-medium text-black hover:underline">Add analytical report ...</a>
      <br>

</div>
</br>
</br>
</br>
<?php
  $mathIndex = 0;
  if($proposal->rating){
    $mathIndex = $proposal->rating;
  }
?>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>
  /**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

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


<script>
  document.getElementById('show-text').onclick = function(){
  document.getElementById("crossing").classList.toggle("deschiden");
  if (document.getElementById('show-text').innerHTML != '↑ Hide description'){
    document.getElementById('show-text').innerHTML = '↑ Hide description';
  }else{
    document.getElementById('show-text').innerHTML = '↓ Show description...';
  }  
}
</script>
<style>
  .deschiden{
    display:block;
  }
  #chartdiv {
  width: 100%;
  height: 500px;
}

}

</style>

<script>
  (function() {
  setTimeout(function() {
    document.getElementsByClassName('logoBar')[0].style.visibility = 'hidden';
  }, 10000); 
  
</script>
@endsection