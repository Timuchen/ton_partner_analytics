<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Proposal;
use App\ProposalCategory;
use App\ProposalStatus;
use App\ProposalReport;
use App\ProposalStage;
use App\ProposalScore;
use App\ProposalAma;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::paginate(10);
        $allProps = Proposal::get();

        $categories = ProposalCategory::whereNull('proposal_category_id')
        ->with('subcategories')
        ->get()->sortBy('date_time');
        
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

        return view('proposals.index', compact('proposals', 'categories', 'allProps', 'calendar', 'proposalMonth'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        $proposalCatId = $proposal->first()->proposal_category_id;
        $category = ProposalCategory::where('id', '=', $proposalCatId)->firstOrFail();

        $reports = ProposalReport::all();
        $stages = ProposalStage::all();
        $score = ProposalScore::all();
        $ama = ProposalAma::all();

        return view('proposals.show', compact('proposal', 'category', 'reports', 'stages', 'score', 'ama'));
    }

    public function search(Request $request)
    {
        $key = trim($request->get('q'));

        $proposals = Proposal::query()
            ->where('title', 'like', "%{$key}%")
            ->orWhere('description', 'like', "%{$key}%")
            ->orWhere('wallet', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        //get all the categories
        $categories = ProposalCategory::all();

        //get all the tags
        //$tags = Tag::all();

        //get the recent 5 proposals
        // $recent_proposals = Proposal::query()
        //     ->where('id', true)
        //     ->orderBy('created_at', 'desc')
        //     ->take(5)
        //     ->get();

        if(count($proposals) > 0)
        return view('proposals.search', [
            'key' => $key,
            'proposals' => $proposals,
            'categories' => $categories,
            //'tags' => $tags,
            //'recent_proposals' => $recent_proposals
        ]);

        else {
            return view ('proposals.search')->withMessage('No Details found. Try to search again !');
        }
        
        }
        public function month(Request $request){
            $year = $request->get('year');
            $month = $request->get('month');
            $dateMonth = "$year-$month";

            $proposals = Proposal::whereMonth('date_time', '=', $month)
            ->whereYear('date_time', $year)
            ->get();

            $preMonth = Proposal::whereMonth('date_time', '=', $month-1)
            ->whereYear('date_time', $year)
            ->get();

            $cat = $proposals->groupBy('proposal_category_id');

            $categories = new ProposalCategory;

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

            $propCount = Proposal::get();
                        
            return view ('proposals.month', compact('year','month', 'dateMonth', 'proposals', 'categories', 'cat', 'preMonth', 'calendar', 'propCount'));
        }
        public function analitics(){
            $categories = ProposalCategory::orderBy('title', 'asc')->get();
            $proposals = Proposal::get();
            $reports = ProposalReport::all();
            $stages = ProposalStage::all();
            $score = ProposalScore::all();
            $ama = ProposalAma::all();

            
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
            
            return view('proposals.analitics', compact('proposals', 'categories', 'reports', 'stages', 'score', 'ama', 'calendar', 'proposalMonth'));
        }
        public function filter(){
            $proposals = Proposal::paginate(10);
            $allProps = Proposal::get();
    
            $categories = ProposalCategory::whereNull('proposal_category_id')
            ->with('subcategories')
            ->get()->sortBy('date_time');
            
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
    
            return view('proposals.index', compact('proposals', 'categories', 'allProps', 'calendar', 'proposalMonth'));
        }
}

