<?php
namespace App\Livewire\Components;
use Livewire\Component;
use App\Models\Fonds;

class AccountingCards extends Component
{
    public $accCards = [];
    public $totalIncome;
    public $totalExpenses;
    public $totalFunds;

    protected $listeners = ['refresh-funds' => 'loadData']; // 👈 Das ergänzt du

    public function mount()
    {
        $this->loadData(); // 👈 Logik ausgelagert
    }

    public function loadData()
    {
        $totalIncome = Fonds::all()->sum(function($fund) {
            return $fund->transactions()->where('status_type', 'entrée')->sum('amount');
        });

        $totalExpenses = Fonds::all()->sum(function($fund) {
            return $fund->transactions()->where('status_type', 'sortie')->sum('amount');
        });

        $totalFunds = Fonds::all()->sum(function($fund) {
            return $fund->transactions()->sum('amount');
        });

        $incomePercentage = $totalFunds ? ($totalIncome / $totalFunds) * 100 : 0;
        $expensesPercentage = $totalFunds ? ($totalExpenses / $totalFunds) * 100 : 0;

        $this->accCards = [
            [
                'title' => 'Revenus',
                'time' => 'Dernier mois',
                'value' => $totalIncome,
                'percentage' => round($incomePercentage, 2),
                'color' => 'green-500',
            ],
            [
                'title' => 'Dépenses',
                'time' => 'Dernier mois',
                'value' => $totalExpenses,
                'percentage' => round($expensesPercentage, 2),
                'color' => 'red-600',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.components.accounting-cards');
    }
}

