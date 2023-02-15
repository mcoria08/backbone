<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use CodeInc\StripAccents\StripAccents;

class ZipCodesCollection extends ResourceCollection
{
    public static $wrap = null;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $zipcode = $this->collection->first();

        $jsonObj = [];

        $jsonObj["zip_code"] = $zipcode->d_codigo;
        $jsonObj["locality"] = $zipcode->d_ciudad;
        $jsonObj["federal_entity"] = [
            "key" => intval($zipcode->c_estado),
            "name" => $zipcode->d_estado,
            "code" => $zipcode->c_cp,
        ];

        $jsonObj["settlements"] = $this->collection->transform(function ($item) use ($jsonObj) {
            return [
                "key" => intval($item->id_asenta_cpcons),
                "name" => $item->d_asenta,
                "zone_type" => $item->d_zona,
                "settlement_type" => [
                    "name" => $item->d_tipo_asenta
                ]
            ];
        });

        $jsonObj["municipality"] = [
            "key" => intval($zipcode->c_mnpio),
            "name" => $zipcode->D_mnpio
        ];

        return $jsonObj;
    }
}
