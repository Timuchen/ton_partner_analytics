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

<div class="container mx-auto py-10 flex justify-center h-screen">
	<div class="w-4/12 pl-4  h-full flex flex-col">
                    <div class="bg-white text-sm text-gray-500 font-bold px-5 py-2 shadow border-b border-gray-300">
                        All Partnerships
                    </div>
                    
                    <div class="w-full h-full overflow-auto shadow bg-white" style="overflow:hidden;" id="journal-scroll">
                    <table class="w-full">
                        <tbody class="">
                            <tr class="relative transform scale-100
                                text-xs py-1 border-b-2 border-blue-100 cursor-default
                                bg-blue-500 bg-opacity-25">
                                <td>Date</td>
                                <td>Title</td>
                                <td>Category</td>
                                <td>Status</td>
                                <td>Amount requested</td>
                                <td>Paid amount</td>
                                <td>Forum</td>
                                <td>Aplication</td>
                                <td>Wallet</td>
                            </tr>
                        @foreach($proposals as $proposal)
                            <tr class="relative transform scale-100
                                text-xs py-1 border-b-2 border-blue-100 cursor-default
                                bg-blue-500 bg-opacity-25">
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                    <div>{{$proposal->date_time}}</div>
                                </td>
                                <td class="pl-5 pr-3 whitespace-no-wrap" style="max-width: 350px;">
                                    <div>{{$proposal->title}}</div>
                                </td>
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                    <div>{{$proposal->proposalCategory->title}}</div>
                                </td>
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                    <div>{{$proposal->proposalStatus->title}}</div>
                                </td>
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                    <div>💎 {{$proposal->amount_requested}}</div>
                                </td>
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                    <div>💎 {{$proposal->paid_amount}}</div>
                                </td>
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                    <a href="{{$proposal->url_forum}}"><div>🔗</div></a>
                                </td>
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                <a href="{{$proposal->url_aplication}}"><div>🔗</div></a>
                                </td>
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                    <a href="https://ton.live/accounts/accountDetails?id={{$proposal->wallet}}" target="_blank">
                                    <button class="flex flex-row items-center focus:outline-none text-gray-500 focus:shadow-outline rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                        </svg> 
                                    </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                    </div>
                </div>
</div>

