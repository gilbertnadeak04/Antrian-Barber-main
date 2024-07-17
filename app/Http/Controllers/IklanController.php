<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Iklan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklans = Iklan::where('status', 'approved')->paginate(10); // adjust the number of items per page as needed
        return view('iklan.index', ['iklans' => $iklans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest()) {
            return redirect()->route('login')->with('error', 'Login terlebih dahulu');
        }
    
        $user = User::find(Auth::user()->id);
        $antrianCount = Antrian::where('user_id', $user->id)->where('is_call', 1)->count();
        $iklanCount = Iklan::where('user_id', $user->id)->count();
    
        if ($antrianCount < 2 || $iklanCount >= floor($antrianCount / 2)) {
            return redirect()->route('menu')->with('error', 'Anda hanya bisa menambah 1 iklan setiap 2 kali antrian.');
        }
    
        return view('iklan.create', ['user' => $user]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = 'uploads'; // Nama folder di dalam direktori public_html

        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();

        // Upload the file to the public_html/uploads directory
        $file->move($path, $fileName);

        Iklan::create([
            'title' => $request->title,
            'image' => $path . '/' . $fileName,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'status' => 'pending',
        ]);

        return redirect()->route('menu')->with('success', 'Iklan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {

        $iklans = Iklan::where('id', $id)->first();
        return view('iklan.show', ['iklans' => $iklans]);
    }
    public function menu()
    {
        if (Auth::guest()) {

            return redirect()->route('login')->with('error', 'Login terlebih dahulu');
        }
        $user = User::where('id', Auth::user()->id)->first();
        $antrians = Antrian::where('user_id', $user->id)->where('is_call', 1)->get();
        $iklans = Iklan::where('user_id', $user->id)->get();

        return view('iklan.menu', ['user' => $user, 'antrians' => $antrians, 'iklans' => $iklans]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $iklans = Iklan::where('id', $id)->first();
        return view('iklan.edit', ['iklans' => $iklans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $path = 'uploads'; // Nama folder di dalam direktori public_html

        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();

        // Upload the file to the public_html/uploads directory
        $file->move($path, $fileName);

        $data = [
            'title' => $request->title,
            'image' => $path . '/' . $fileName,
            'content' => $request->content,
        ];

        Iklan::where('id', $id)->update($data);

        return redirect()->route('menu')->with('success', 'Iklan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Iklan::where('id', $id)->delete();
        return redirect()->route('menu')->with('success', 'Iklan berhasil di hapus');
    }
}
