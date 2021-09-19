<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalScore extends Model
{
    use HasFactory;
    public function proposals()
    {
        return $this->belongsTo(Proposal::class);
    }
}
