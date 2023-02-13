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

class ProductExportThousand implements FromCollection, ShouldAutoSize, WithEvents, WithHeadingRow, WithHeadings, WithMapping
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
        $poster = $product->images->where('is_main', true)->first();
        $poster = $poster ? 'https://zhannakangroup.com/i/products/images/' . $poster->name : '';

        return [
            $product->id,
            $product->displayName(),
            $product->description,
            'https://zhannakangroup.com/product/' . $product->slug,
            $poster,
            $product->price_kzt,
            'in stock',
            'new',
            $product->getCharacteristic('brand'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'title',
            'description',
            'link',
            'imagelink',
            'price',
            'availability',
            'condition',
            'brand'
        ];
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
