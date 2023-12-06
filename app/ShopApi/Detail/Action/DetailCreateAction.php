<?php

namespace App\ShopApi\Detail\Action;

use App\Models\Detail;
use App\ShopApi\Detail\Contract\DetailCreateDataInterface;
use App\ShopApi\Exception\RuntimeException;
use App\ShopApi\Security\Permission\Service\PermissionChecker;

class DetailCreateAction
{
    private const ACTION = 'DetailCreate';

    public function __construct(
        private readonly PermissionChecker $permissionChecker
    ) {}

    /**
     * @throws RuntimeException
     */
    public function run(DetailCreateDataInterface $data): void
    {
        $this->permissionChecker->check(self::ACTION);

        $detail              = new Detail();
        $detail->title       = $data->getTitle();
        $detail->description = $data->getDescription();
        $detail->unit        = $data->getUnit();
        $detail->save();
    }
}
