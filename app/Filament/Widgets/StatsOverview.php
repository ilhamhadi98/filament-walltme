<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $incoming = Transaction::incomes()->get()->sum('amount');
        $outgoing = Transaction::expense()->get()->sum('amount');

        return [
            Stat::make('Total Incoming', $incoming),
            Stat::make('Total Outgoing', $outgoing),
            Stat::make('Remain', $incoming - $outgoing),
        ];
    }
}
