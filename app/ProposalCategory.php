<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalCategory extends Model
{
    use HasFactory;
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function categories()
    {
        return $this->hasMany(ProposalCategory::class);
    }

    public function subcategories()
    {
        return $this->hasMany(ProposalCategory::class)->with('categories');
    }
    
}