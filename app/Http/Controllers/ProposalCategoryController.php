<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\ProposalCategory;
use Extraton\TonClient\Entity\Net\Filters;
use Extraton\TonClient\Entity\Net\ParamsOfSubscribeCollection;
use Extraton\TonClient\TonClient;

class ProposalCategoryController extends Controller
{
    
    public function index($id)
    {

        $category = ProposalCategory::where('id', '=', $id)->firstOrFail();
        $proposals = $category->proposals()->orderBy('created_at', 'ASC')->paginate(12);
        $categories = ProposalCategory::whereNull('proposal_category_id')
        ->with('subcategories')
        ->get()->sortBy('title');
        $subcategories = $category->subcategories;

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
        $allProps = $category->proposals()->get();

        return view('proposals.category.index', compact('proposals', 'category', 'categories', 'subcategories', 'calendar', 'allProps'));
    }
    public function show(){
        
    }
}
