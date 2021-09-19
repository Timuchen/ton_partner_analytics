<?php

namespace Wave\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;

class HomeController extends \App\Http\Controllers\Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(setting('auth.dashboard_redirect', true) != "null"){
    		if(!\Auth::guest()){
    			return redirect('dashboard');
    		}
    	}


        $seo = [

            'title'         => setting('site.title', 'Laravel Wave'),
            'description'   => setting('site.description', 'Software as a Service Starter Kit'),
            'image'         => url('/og_image.png'),
            'type'          => 'website'

        ];
        $calendar = Proposal::selectRaw('
        year(date_time) year, 
        month(date_time)month,
        count(*) data, 
        sum(amount_requested) amount_requested
        ')
        ->groupBy('year', 'month',)
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        $tr = Proposal::select('date_time', 'id', 'title', 'amount_requested', 'paid_amount', 'proposal_status_id')
        ->orderBy('date_time', 'ASC')
        ->get();

        $proposalMonth = $tr->groupBy(function($item){
            return date('M Y', strtotime($item->date_time));
        })->toArray();


        return view('theme::home', compact('seo', 'calendar', 'proposalMonth'));
    }
}
