<?php

namespace App\MoonShine\Resources;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShine\Fields\Image;
use Leeto\MoonShine\Fields\Select;
use Leeto\MoonShine\Fields\Text;
use Leeto\MoonShine\Fields\Textarea;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Decorations\Block;
use Leeto\MoonShine\Actions\FiltersAction;

class ProductResource extends Resource
{
	public static string $model = Product::class;
	public static string $title = 'Товары';

    protected bool $createInModal = true;
    protected bool $editInModal = true;
    public static bool $withPolicy = false; // Авторизация
    public static string $orderField = 'id'; // Поле сортировки по умолчанию
    public static string $orderType = 'DESC'; // Тип сортировки по умолчанию/
    public static int $itemsPerPage = 25; // Количество элементов на странице


	public function fields(): array
	{
		return [
		    Block::make('form-container', [
		        ID::make()->sortable(),
                Image::make('Фото', 'img')->nullable(),
                Text::make('Артикул', 'article'),
                Textarea::make('Номенклатура', 'nomenclature'),
                Text::make('Цена', 'price'),
                Text::make('Количество', 'count'),
                Text::make('Склад', 'stock')->nullable(),
                Text::make('Бренд', 'brand')->nullable()
		    ])
        ];
	}
	public function rules(Model $item): array
	{
	    return [
            'img' => ['nullable'],
            'stock' => ['nullable'],
            'brand' => ['nullable'],
        ];
    }

    public function search(): array
    {
        return ['id, article, nomenclature, brand, stock'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
