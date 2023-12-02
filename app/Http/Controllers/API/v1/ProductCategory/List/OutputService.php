<?php

namespace App\Http\Controllers\API\v1\ProductCategory\List;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;

class OutputService
{
    public function build(Collection $productCategories): array
    {
        $dtoList = [];

        /** @var ProductCategory $productCategory */
        foreach ($productCategories as $productCategory) {
            $dtoList[] = [
                'id'          => $productCategory->id,
                'title'       => $productCategory->title,
                'description' => $productCategory->description
            ];
        }

        return $dtoList;
    }
}
