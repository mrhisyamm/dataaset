<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLelangRequest;
use App\Http\Requests\UpdateLelangRequest;
use App\Repositories\LelangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangLelang;
use App\Models\Penawaran;
use App\Models\Barang;
use Flash;
use Response;

class LelangController extends AppBaseController
{
    /** @var  LelangRepository */
    private $lelangRepository;

    public function __construct(LelangRepository $lelangRepo)
    {
        $this->lelangRepository = $lelangRepo;
    }

    /**
     * Display a listing of the Lelang.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lelangs = $this->lelangRepository->all();
        // return $lelangs;
        $a = [];

        $i = 0;
        foreach ($lelangs as $lelang) {
            
            $barangLelang = BarangLelang::where('lelang_id',$lelang['id'])->get();
            $kata = '';
            foreach ($barangLelang as $barang) {
                $namaBarang = Barang::find($barang->barangs_id);
                $kata .= "<p> " . 'Nama Barang: ' . $namaBarang->nama . "</p><p> Jumlah: " . $barang['jumlah'] . " </p>";
                $kata .= "<p> ------------------------------------------  </p>";
            }
            $lelang['barangLelangs'] = $kata;

            $penawarans = Penawaran::where('lelang_id',$lelang->id)->get();

            foreach ($penawarans as $value) {
                if ($value->is_selected == true) {
                    $lelang['is_selected'] = true;
                }
            }
        }

        // return $lelangs;
        // return $lelangs;

        return view('lelangs.index')->with('lelangs', $lelangs);
    }

    /**
     * Show the form for creating a new Lelang.
     *
     * @return Response
     */
    public function create()
    {
        return view('lelangs.create');
    }

    /**
     * Store a newly created Lelang in storage.
     *
     * @param CreateLelangRequest $request
     *
     * @return Response
     */
    public function store(CreateLelangRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $input['users_id'] = $user['id'];
        
        // return $input;

        $lelang = $this->lelangRepository->create($input);

        Flash::success('Lelang saved successfully.');

        return redirect(route('lelangs.index'));
    }

    /**
     * Display the specified Lelang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lelang = $this->lelangRepository->find($id);

        if (empty($lelang)) {
            Flash::error('Lelang not found');

            return redirect(route('lelangs.index'));
        }

        return view('lelangs.show')->with('lelang', $lelang);
    }

    /**
     * Show the form for editing the specified Lelang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lelang = $this->lelangRepository->find($id);

        if (empty($lelang)) {
            Flash::error('Lelang not found');

            return redirect(route('lelangs.index'));
        }

        //pemenang lelang sudah terpilih
        $penawarans = Penawaran::where('lelang_id',$lelang->id)->get();

        foreach ($penawarans as $penawaran) {
            if ($penawaran->is_selected == true) {
                $lelang['is_selected'] = true;
            }

            // return
        }
        // return $lelang;

        return view('lelangs.edit')->with('lelang', $lelang);
    }

    /**
     * Update the specified Lelang in storage.
     *
     * @param int $id
     * @param UpdateLelangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLelangRequest $request)
    {
        $input = $request->all();
        $lelang = $this->lelangRepository->find($id);

        if (empty($lelang)) {
            Flash::error('Lelang not found');

            return redirect(route('lelangs.index'));
        }

        // return $input;

        $barangLelangs = BarangLelang::where('lelang_id',$id)->get();
        if (!$lelang->is_done && $request->is_done == true) {
            foreach ($barangLelangs as $barangLelang) {
                // return $barangLelang;
                $barangAset = Barang::where('id',$barangLelang->barangs_id)->first();
                $barangAset->stok = $barangAset->stok + $barangLelang->jumlah;
                $barangAset->save();
            }
        }
        
         $input['is_done'] = $input['is_done'] == 'on' ? true : false;
        $lelang = $this->lelangRepository->update($input , $id);

        Flash::success('Lelang updated successfully.');

        return redirect(route('lelangs.index'));
    }

    /**
     * Remove the specified Lelang from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lelang = $this->lelangRepository->find($id);

        if (empty($lelang)) {
            Flash::error('Lelang not found');

            return redirect(route('lelangs.index'));
        }

        $this->lelangRepository->delete($id);

        Flash::success('Lelang deleted successfully.');

        return redirect(route('lelangs.index'));
    }
}
