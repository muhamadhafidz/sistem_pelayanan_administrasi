<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ready_document_request extends Model
{
    protected $guarded = [];
    
    public function document_request()
    {
        return $this->belongsTo('App\Document_request', 'document_request_id');
    }
}
