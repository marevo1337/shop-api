<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int    $id
 * @property int    $action_id
 * @property int    $permission_id
 * @property Action $action
 */
class ActionPermission extends Model
{
    public $timestamps = false;

    public function action(): BelongsTo
    {
        return $this->belongsTo(Action::class);
    }
}
