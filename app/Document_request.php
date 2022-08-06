<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_request extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function archive_document()
    {
        return $this->belongsTo('App\Archive_document', 'archive_document_id');
    }

    public function ready_document_request()
    {
        return $this->hasOne('App\Ready_document_request', 'document_request_id');
    }
}
