<?php

namespace App\Http\Livewire\Antrian;

use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAntrian extends Component
{
    public $antrian_id, $no_antrian, $nama, $no_hp, $paket, $tanggal_antrian, $user_id, $data;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'no_antrian' => 'required',
        'nama' => 'required',
        'no_hp' => 'required|numeric',
        'paket' => 'required',
        'tanggal_antrian' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function save()
    {
        // Ambil waktu saat ini dalam timezone Asia/Jakarta
        $now = now()->setTimezone('Asia/Jakarta');
    
        // Periksa apakah waktu sekarang sudah lewat jam 21:00
        if ($now->hour >= 21) {
            session()->flash('error', 'Tidak bisa menambah antrian setelah jam 21.00 WIB.');
            return;
        }
    
        // Mengambil data antrian terbaru berdasarkan paket yang dipilih
        $latestAntrian = Antrian::where('paket', $this->paket)
            ->where('tanggal_antrian', now()->toDateString())
            ->latest('id')
            ->first();
    
        // Jika tanggal berbeda dengan hari ini, maka reset nomor antrian dari awal
        if (!$latestAntrian) {
            if ($this->paket === 'cut') {
                $this->no_antrian = 'U1';
            } elseif ($this->paket === 'look') {
                $this->no_antrian = 'G1';
            } elseif ($this->paket === 'mood') {
                $this->no_antrian = 'T1';
            } elseif ($this->paket === 'enjoy') {
                $this->no_antrian = 'L1';
            }
            $this->tanggal_antrian = now()->toDateString();
        } else {
            // Jika tanggalnya sama dengan hari ini, maka no antrian akan melakukan increment / pengurutan
            $kode_awal = substr($latestAntrian->no_antrian, 0, 1);
            $angka = (int) substr($latestAntrian->no_antrian, 1);
            $angka += 1;
            $this->no_antrian = $kode_awal . $angka;
            $this->tanggal_antrian = $latestAntrian->tanggal_antrian;
        }
    
        $validatedData = $this->validate();
        $validatedData['no_antrian'] = $this->no_antrian;
        $validatedData['tanggal_antrian'] = $this->tanggal_antrian;
        $validatedData['user_id'] = auth()->user()->id;
    
        Antrian::create($validatedData);
        session()->flash('success', 'Berhasil Mengambil Antrian');
        $this->emit('update');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }
    

    public function resetInput()
    {
        $this->no_antrian = '';
        $this->nama = '';
        $this->no_hp = '';
        $this->paket = '';
    }

    public function close_modal()
    {
        $this->resetInput();
    }

    public function editAntrian($antrian_id)
    {
        $antrian = Antrian::find($antrian_id);
        if ($antrian) {
            $this->antrian_id = $antrian->id;
            $this->no_antrian = $antrian->no_antrian;
            $this->nama = $antrian->nama;
            $this->no_hp = $antrian->no_hp;
            $this->paket = $antrian->paket;
        } else {
            return redirect()->to('/');
        }
    }

    public function updateAntrian()
    {

        if ($this->paket === 'cut') {
            $this->no_antrian = 'U1';
        } elseif ($this->paket === 'look') {
            $this->no_antrian = 'G1';
        } elseif ($this->paket === 'mood') {
            $this->no_antrian = 'T1';
        } elseif ($this->paket === 'enjoy') {
            $this->no_antrian = 'L1';
        }

        $latest_no_antrian = Antrian::where('paket', $this->paket)
            ->latest()
            ->first();

        if ($latest_no_antrian) {
            $kode_awal = substr($latest_no_antrian->no_antrian, 0, 1);
            $angka = (int) substr($latest_no_antrian->no_antrian, 1);
            $angka += 1;
            $this->no_antrian = $kode_awal . $angka;
        }

        $validatedData = $this->validate([
            'no_antrian' => 'required|unique:antrians',
            'nama' => 'required',
            'no_hp' => 'required',
            'paket' => 'required',
        ]);

        Antrian::where('id', $this->antrian_id)->update([
            'no_antrian' => $validatedData['no_antrian'],
            'nama' => $validatedData['nama'],
            'no_hp' => $validatedData['no_hp'],
            'paket' => $validatedData['paket'],
        ]);

        session()->flash('success', 'Berhasil Mengedit Data Antrian Anda');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function deleteAntrian($antrian_id)
    {
        $this->antrian_id = $antrian_id;
    }

    public function destroy()
    {
        Antrian::find($this->antrian_id)->delete();
        session()->flash('success', 'Berhasil Menghapus 1 Data');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function showDetail($antrian_id)
    {
        $antrian = Antrian::find($antrian_id);
        if ($antrian) {
            $this->antrian_id = $antrian->id;
            $this->no_antrian = $antrian->no_antrian;
            $this->nama = $antrian->nama;
            $this->no_hp = $antrian->no_hp;
            $this->paket = $antrian->paket;
        } else {
            return redirect()->to('/');
        }
    }

    public function mount()
    {
        $this->data = Antrian::all();
    }

    public function render()
    {
        return view('livewire.antrian.show-antrian', [
            'antrian' => $this->paket ? Antrian::where('paket', $this->paket)->where('is_call', 0)->paginate(10) : Antrian::where('is_call', 0)->paginate(10),
            'cekAntrian' => Antrian::where('user_id', Auth::id())->count(),
            'detailAntrian' => Antrian::where('user_id', Auth::id())->where('is_call', 0)->get(),
        ]);
    }
}
