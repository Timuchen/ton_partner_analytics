<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalStatus extends Model
{
    use HasFactory;
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}
