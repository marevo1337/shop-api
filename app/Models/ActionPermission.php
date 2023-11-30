<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $action_id
 * @property int $permission_id
 */
class ActionPermission extends Model
{
    public $timestamps = false;
}
