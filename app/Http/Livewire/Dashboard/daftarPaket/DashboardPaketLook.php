<?php

namespace App\Http\Livewire\Dashboard\DaftarPaket;

use App\Models\Antrian;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardPaketLook extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $antrian_id;

    public function panggilAntrian($antrian_id)
    {
        $this->antrian_id = $antrian_id;
    }

    public function updatePanggilan()
    {
        Antrian::find($this->antrian_id)->update(['is_call' => 1]);

        session()->flash('success', 'Berhasil Mengambil Antrian Ini');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function deleteAntrian($antrian_id)
    {
        Antrian::find($antrian_id)->delete();

        session()->flash('success', 'Berhasil Menghapus Antrian Ini');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        return view('livewire.dashboard.daftar-paket.dashboard-paket-look', [
            'goodLook' => Antrian::where('paket', 'look')->where('is_call', 0)->paginate(10)
        ]);
    }
}
