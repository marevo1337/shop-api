<?php

namespace App\Models;

use App\ShopApi\Security\Auth\Contract\CredentialsDataInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property string      $first_name
 * @property string|null $last_name
 * @property string      $email
 * @property string      $avatar
 * @property string      $password
 * @property int         $permission_id
 * @property string      $status
 * @property Permission  $permission
 */
class User extends Model implements CredentialsDataInterface
{
    public function getId(): int
    {
        return $this->id;
    }

    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
}
