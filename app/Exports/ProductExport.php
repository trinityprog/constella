<?php

namespace App\Exports;

use App\Services\CartService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductExport implements FromCollection, ShouldAutoSize, WithEvents, WithHeadingRow, WithHeadings, WithMapping
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection(): \Illuminate\Support\Collection
    {
        return $this->data;
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->vendor_code,
            $product->name,
            $product->displayName(),
            CartService::formatCurrency($product->price, false, $product->currency_id, $product->currency->code),
            $this->characterstics($product),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Артикул',
            'Название 1С',
            'Название сайт',
            'Цена',
            'Характеристики'
        ];
    }

    public function characterstics($item)
    {
        $text = '';
        $text .= 'Масса:'.$item->getCharacteristic('mass')."\n";
        if($item->getCharacteristic('metal_color') && $item->getCharacteristic('brand') !== 'La Perla')
            $text .= 'Материал:'.$item->getCharacteristic('metal_color')."\n";
        if($item->getCharacteristic('cloth_material') && $item->getCharacteristic('brand') !== 'La Perla') {
            $text .= 'Материал:';
            $cloth_material = json_decode($item->getCharacteristic('cloth_material'));
            $cloth_material_count = count($cloth_material);
            $index = 0;
            foreach($cloth_material as $material) {
                $text .= $material;
                if($index == $cloth_material_count) $text .= ',';
                $index++;
            }
            $text .= "\n";
        }
        if($item->getCharacteristic('stones') && $item->getCharacteristic('brand') !== 'La Perla') {
            $text .= 'Камни:';
            $stones = json_decode($item->getCharacteristic('stones'));
            $stones_count = count($stones);
            $index = 0;
            foreach($stones as $stone) {
                $text .= $stone->stone_type;
                if($index == $stones_count) $text .= ',';
                $index++;
            }
            $text .= "\n";
        }
        $text .= 'Бренд:'.$item->getCharacteristic('brand')."\n";
        $text .= 'Коллекция:'.$item->getCharacteristic('collection')."\n";
        $text .= 'Тип товара:'.$item->getCharacteristic('product_type')."\n";
        $text .= 'Размер:'.$item->getCharacteristic('size')."\n";

        return $text;
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class=> function(AfterSheet $event) {
                $cellRange = 'A1:Z1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(11)->setBold(true);
            },
        ];
    }

}
