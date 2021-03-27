<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ComponentPage extends Pivot
{
    protected $guarded = [];
    protected $table = 'component_page';

    public function customs()
    {
        return $this->hasMany(ComponentCustomDetail::class, 'component_page_id');
    }

    public function component()
    {
        return $this->belongsTo(Component::class, 'component_id');
    }
}
