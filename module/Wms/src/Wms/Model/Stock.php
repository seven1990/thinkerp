<?php
namespace Wms\Model;

 class Stock
 {
     public $id;
     public $storehouse_sn;
     public $goods_id;
     public $goods_name;
     public $goods_barcode;
     public $totalstock;
     public $stock;
     public $lockstock;
     public $defectivestock;
     public $lockdefectivestock;
     public $shop_id;


     public function exchangeArray($data)
     {
         $this->id             = (!empty($data['id'])) ? $data['id'] : null;
         $this->storehouse_sn  = (!empty($data['storehouse_sn'])) ? $data['storehouse_sn'] : null;
         $this->goods_id       = (!empty($data['goods_id'])) ? $data['goods_id'] : null;
         $this->goods_name     = (!empty($data['goods_name'])) ? $data['goods_name'] : null;
         $this->goods_barcode  = (!empty($data['goods_barcode'])) ? $data['goods_barcode'] : null;
         $this->totalstock     = (!empty($data['totalstock'])) ? $data['totalstock'] : null;
         $this->stock          = (!empty($data['stock'])) ? $data['stock'] : null;
         $this->lockstock      = (!empty($data['lockstock'])) ? $data['lockstock'] : null;
         $this->defectivestock = (!empty($data['defectivestock'])) ? $data['defectivestock'] : null;
         $this->shop_id        = (!empty($data['shop_id'])) ? $data['shop_id'] : null;
     }
 }