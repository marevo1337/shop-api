<?php

namespace App\Http\Controllers\API\v1\Permission\List;

use App\Models\ActionPermission;
use App\Models\Permission;
use App\ShopApi\Security\Permission\Storage\ActionPermissionStorageInterface;
use Illuminate\Database\Eloquent\Collection;

class OutputBuilder
{
    public function __construct(
        private readonly ActionPermissionStorageInterface $actionPermissionStorage
    ) {}

    public function build(Collection $permissions): array
    {
        $dtoList = [];
        /** @var Permission $permission */
        foreach ($permissions as $permission) {
            /** @var ActionPermission[] $actions */
            $actions = $this->actionPermissionStorage->getByPermissionId($permission->id);
            $output  = [
                'id'          => $permission->id,
                'name'        => $permission->name,
                'description' => $permission->description,
                'actions'     => [],
            ];

            foreach ($actions as $action) {
                $output['actions'][] = [
                    'id'   => $action->action->id,
                    'name' => $action->action->name,
                    'key'  => $action->action->key,
                ];
            }

            $dtoList[] = $output;
        }

        return $dtoList;
    }
}
