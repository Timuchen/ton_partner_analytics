<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\ProposalCategory;

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

        return view('proposals.category.index', compact('proposals', 'category', 'categories', 'subcategories'));
    }
}
