<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalAma extends Model
{
    use HasFactory;
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
