<?php

namespace App\MoonShine\Resources;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShine\Fields\Text;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Decorations\Block;
use Leeto\MoonShine\Actions\FiltersAction;

class OrderResource extends Resource
{
    public static string $model = Order::class;
    public static string $title = 'Заказы';

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
		        ID::make(),
                Text::make('Пользователь', 'user_id'),
                Text::make('Данные карзины', 'cart_data'),
                Text::make('Сумма итого', 'total_sum'),
                Text::make('Адрес', 'address'),
                Text::make('Телефон', 'phone')





		    ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
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
