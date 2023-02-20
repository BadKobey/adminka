<?php

namespace App\MoonShine;

use App\Models\Product;
use App\Models\User;
use Leeto\MoonShine\Dashboard\DashboardBlock;
use Leeto\MoonShine\Dashboard\DashboardScreen;
use Leeto\MoonShine\Metrics\LineChartMetric;
use Leeto\MoonShine\Metrics\ValueMetric;

class Dashboard extends DashboardScreen
{
	public function blocks(): array
	{
		return [
            DashboardBlock::make([
                ValueMetric::make('Пользователей')
                    ->value(User::query()->count()),
                ValueMetric::make('Организаций')
                    ->value(User::query()->count()),
                ValueMetric::make('Товаров')
                    ->value(Product::query()->count()),
                ValueMetric::make('Заказов')
                    ->value(User::query()->count())
            ])
        ];
	}
    public function metrics(): array
    {
        return [
            LineChartMetric::make('Заказы')
                ->line([
                    'Выручка' => Order::query()
                        ->groupBy('created_at')
                        ->selectRaw('SUM(price) as sum, created_at')
                        ->pluck('sum','created_at')
                        ->mapWithKeys(fn($value, $key) => [date('d.m.Y', strtotime($key)) => $value])
                        ->toArray()
                ]),
        ];
    }
}
