<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function allow()
    {
        $this->ban(false);
    }

    public function ban($status = true)
    {
        $this->update(compact('status'));
    }
}
