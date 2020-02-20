<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function allow()
    {
        $this->ban(false);
    }

    public function ban($status = true)
    {
        $this->update(compact('status'));
    }
}
