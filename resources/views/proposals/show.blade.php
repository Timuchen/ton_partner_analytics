@extends('theme::layouts.app')

@section('content')

<div class="max-w-4xl px-5 mx-auto mt-10 lg:px-0">
        <a href="{{ route('proposals') }}" class="flex items-center mb-6 font-mono text-sm font-bold cursor-pointer text-wave-500">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            back to section
        </a>
    </div>
    <article id="post-{{ $proposal->id }}" class="max-w-4xl px-5 mx-auto prose prose-xl lg:prose-2xl lg:px-0">
    <meta property="name" content="{{ $proposal->title }}">
        <meta property="author" typeof="Person" content="admin">
        <meta property="dateModified" content="{{ Carbon\Carbon::parse($proposal->updated_at)->toIso8601String() }}">
        <meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($proposal->created_at)->toIso8601String() }}">

        <div class="max-w-4xl mx-auto mt-6">

        <h1 class="flex flex-col leading-none">
            <span>{{ $proposal->title }}</span>
            <span class="mt-0 mt-10 text-base font-normal">Written on 
            <time datetime="{{ Carbon\Carbon::parse($proposal->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($proposal->created_at)->toFormattedDateString() }}</time>. 
            Posted in <a href="/proposals/category/{{$proposal->proposalCategory->id}}">{{$proposal->proposalCategory->name}}</a>. 
            <a href="#" id="show-text" class="inline-flex float-right px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" style="float:right;text-decoration: none;">
            ↑ Hide description
	          </a>
          </span>
        </h1>
        </div>
        <div id="crossing">
        <div class="relative">
          @if($proposal->image)
            <img class="w-full h-auto rounded-lg" src="/storage/{{ $proposal->image }}" alt="{{ $proposal->title }}">
          @else
          <img class="w-full h-auto rounded-lg" src="/storage/QNP1RbOScTqy6qhUjcyS.png" alt="{{ $proposal->title }}">
            @endif
          </div>
        


        @if($proposal->submission_start && $proposal->submission_end)
        <div class="max-w-4xl mx-auto">
        
        <span class="mt-0 mt-10 text-base font-normal"><b>Submission start:</b>
            <time datetime="{{ Carbon\Carbon::parse($proposal->submission_start)->toIso8601String() }}">{{ Carbon\Carbon::parse($proposal->submission_start)->toFormattedDateString() }}</time>. 
        </span>
        &middot;
        <span class="mt-0 mt-10 text-base font-normal"><b>Submission end:</b> 
            <time datetime="{{ Carbon\Carbon::parse($proposal->submission_start)->toIso8601String() }}">{{ Carbon\Carbon::parse($proposal->submission_start)->toFormattedDateString() }}</time>. 
        </span>
        </div>
        @endif
        @if($proposal->submission_start && $proposal->submission_end)
        <div class="max-w-4xl mx-auto">
        <span class="mt-0 mt-10 text-base font-normal"><b>Judging start:</b> 
            <time datetime="{{ Carbon\Carbon::parse($proposal->submission_start)->toIso8601String() }}">{{ Carbon\Carbon::parse($proposal->judging_start)->toFormattedDateString() }}</time>. 
        </span>
        &middot;
        <span class="mt-0 mt-10 text-base font-normal"><b>Judging end:</b> 
            <time datetime="{{ Carbon\Carbon::parse($proposal->submission_start)->toIso8601String() }}">{{ Carbon\Carbon::parse($proposal->judging_end)->toFormattedDateString() }}</time>. 
        </span>
        </div>
        @endif
        <div span class="mt-0 mt-10 text-base font-normal">
        <p class="text-sm font-normal">
        {!! $proposal->description !!}
        </p>
        </div>


    </div>
    @if ($proposal->balance)
        <div class="max-w-4xl mx-auto">
        Balance: 💎 {{ $proposal->balance }}
        </div>
        @endif
    </article> 

  <div class="max-w-2xl px-5 mx-auto mt-10 lg:px-0">
 <?php 
 $i=0; 
 ?>
 
</div>  

</div>
<br>

</br>
<br>

<script>
  document.getElementById('show-text').onclick = function(){
  document.getElementById("crossing").classList.toggle("deschiden");
  if (document.getElementById('show-text').innerHTML != '↓ Show description...'){
    document.getElementById('show-text').innerHTML = '↓ Show description...';
  }else{
    document.getElementById('show-text').innerHTML = '↑ Hide description';
  }
  
}
</script>
<style>
  .deschiden{
    display:none;
  }
</style>
@endsection