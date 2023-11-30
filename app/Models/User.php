<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int         $id
 * @property string      $first_name
 * @property string|null $last_name
 * @property string      $email
 * @property string      $avatar
 * @property string      $password
 * @property int         $permission_id
 * @property string      $status
 */
class User extends Authenticatable
{}
