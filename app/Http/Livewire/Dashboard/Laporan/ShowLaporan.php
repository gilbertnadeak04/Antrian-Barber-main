<?php

namespace App\Http\Livewire\Dashboard\Laporan;

use App\Models\Antrian;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLaporan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $tanggal_antrian, $paket, $search;
    protected $queryString = ['search'];
    public $hairCuts, $goodLooks, $goodMoods, $hairEnjoys;

    public function render()
    {
        $hairCuts = 0;
        $goodLooks = 0;
        $goodMoods = 0;
        $hairEnjoys = 0;

        if ($this->tanggal_antrian == "today") {
            $laporan = Antrian::where('tanggal_antrian', Carbon::now()->toDateString())->where('is_call', 1)->paginate(10);
            $currentDay = Carbon::now()->toDateString();
            $hairCuts = Antrian::where('paket', 'cut')->whereMonth('created_at', $currentDay)->where('is_call', 1)->count();
            $goodLooks = Antrian::where('paket', 'look')->whereMonth('created_at', $currentDay)->where('is_call', 1)->count();
            $goodMoods = Antrian::where('paket', 'mood')->whereMonth('created_at', $currentDay)->where('is_call', 1)->count();
            $hairEnjoys = Antrian::where('paket', 'enjoy')->whereMonth('created_at', $currentDay)->where('is_call', 1)->count();
        } else if ($this->tanggal_antrian == "week") {
            $laporan = Antrian::whereBetween('tanggal_antrian', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('is_call', 1)->paginate(10);
            $hairCuts = Antrian::where('paket', 'cut')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where('is_call', 1)->count();
            $goodLooks = Antrian::where('paket', 'look')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where('is_call', 1)->count();
            $goodMoods = Antrian::where('paket', 'mood')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where('is_call', 1)->count();
            $hairEnjoys = Antrian::where('paket', 'enjoy')->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->where('is_call', 1)->count();
        } elseif ($this->tanggal_antrian == "month") {
            $laporan = Antrian::whereMonth('tanggal_antrian', Carbon::now()->month)->where('is_call', 1)->paginate(10);
            $currentMonth = Carbon::now()->month;
            $hairCuts = Antrian::where('paket', 'cut')->whereMonth('created_at', $currentMonth)->where('is_call', 1)->count();
            $goodLooks = Antrian::where('paket', 'look')->whereMonth('created_at', $currentMonth)->where('is_call', 1)->count();
            $goodMoods = Antrian::where('paket', 'mood')->whereMonth('created_at', $currentMonth)->where('is_call', 1)->count();
            $hairEnjoys = Antrian::where('paket', 'enjoy')->whereMonth('created_at', $currentMonth)->where('is_call', 1)->count();
        } else if ($this->paket) {
            $laporan = $this->paket ? Antrian::where('paket', $this->paket)->where('is_call', 1)->paginate(10) : Antrian::where('is_call', 1)->paginate(10);
            $hairCuts = $this->paket ? Antrian::where('paket', $this->paket)->where('is_call', 1)->count() : Antrian::where('is_call', 1)->count();
        } else if ($this->search) {
            $laporan = Antrian::where('nama', 'like', '%' . $this->search . '%')->paginate(10);
        } else {
            $laporan = Antrian::where('is_call', 1)->paginate(10);
        }


        return view('livewire.dashboard.laporan.show-laporan', compact('laporan', 'hairCuts', 'goodLooks', 'goodMoods', 'hairEnjoys'));
    }
    
}
