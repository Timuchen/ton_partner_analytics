<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    public function proposalCategory()
    {
        return $this->belongsTo(ProposalCategory::class);
    }

    public function proposalStatus()
    {
        return $this->belongsTo(ProposalStatus::class);
    }
    public function proposalScore()
    {
        return $this->hasMany(ProposalScore::class);
    }
    public function proposalAmas()
    {
        return $this->hasMany(ProposalAma::class);
    }



    
}
