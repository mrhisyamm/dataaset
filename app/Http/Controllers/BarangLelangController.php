<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBarangLelangRequest;
use App\Http\Requests\UpdateBarangLelangRequest;
use App\Repositories\BarangLelangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Lelang;
use App\Models\Barang;
use Flash;
use Response;

class BarangLelangController extends AppBaseController
{
    /** @var  BarangLelangRepository */
    private $barangLelangRepository;

    public function __construct(BarangLelangRepository $barangLelangRepo)
    {
        $this->barangLelangRepository = $barangLelangRepo;
    }

    /**
     * Display a listing of the BarangLelang.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $barangLelangs = $this->barangLelangRepository->all();

        
        $i = 0;
        foreach ($barangLelangs as $value) {
            $barangLelangs[$i]['lelang'] = Lelang::find($value['lelang_id']);
            $barangLelangs[$i++]['barang'] = Barang::find($value['barangs_id']);
        }
        return view('barang_lelangs.index')
            ->with('barangLelangs', $barangLelangs);
    }
 
    /**
     * Show the form for creating a new BarangLelang.
     *
     * @return Response
     */
    public function create()
    {
        $lelangs = lelang::pluck('no_paket','id');
        $barangs = Barang::pluck('nama','id');

        // return $barangs;
        
        return view('barang_lelangs.create', compact('lelangs','barangs'));
    }

    /**
     * Store a newly created BarangLelang in storage.
     *
     * @param CreateBarangLelangRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangLelangRequest $request)
    {

        $input = $request->all();
        $input['barangs_id'] = $input['nama_barang'];
        // nama_barang
        $barang = Barang::where('id',$request->nama_barang)->first();
        $input['nama_barang'] = $barang['nama'];
        $barangLelang = $this->barangLelangRepository->create($input);

        Flash::success('Barang Lelang saved successfully.');

        return redirect(route('barangLelangs.index'));
    }

    /**
     * Display the specified BarangLelang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangLelang = $this->barangLelangRepository->find($id);

        if (empty($barangLelang)) {
            Flash::error('Barang Lelang not found');

            return redirect(route('barangLelangs.index'));
        }

        return view('barang_lelangs.show')->with('barangLelang', $barangLelang);
    }

    /**
     * Show the form for editing the specified BarangLelang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangLelang = $this->barangLelangRepository->find($id);

        if (empty($barangLelang)) {
            Flash::error('Barang Lelang not found');

            return redirect(route('barangLelangs.index'));
        }

        return view('barang_lelangs.edit')->with('barangLelang', $barangLelang);
    }

    /**
     * Update the specified BarangLelang in storage.
     *
     * @param int $id
     * @param UpdateBarangLelangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangLelangRequest $request)
    {
        $barangLelang = $this->barangLelangRepository->find($id);

        if (empty($barangLelang)) {
            Flash::error('Barang Lelang not found');

            return redirect(route('barangLelangs.index'));
        }

        $barangLelang = $this->barangLelangRepository->update($request->all(), $id);

        Flash::success('Barang Lelang updated successfully.');

        return redirect(route('barangLelangs.index'));
    }

    /**
     * Remove the specified BarangLelang from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangLelang = $this->barangLelangRepository->find($id);

        if (empty($barangLelang)) {
            Flash::error('Barang Lelang not found');

            return redirect(route('barangLelangs.index'));
        }

        $this->barangLelangRepository->delete($id);

        Flash::success('Barang Lelang deleted successfully.');

        return redirect(route('barangLelangs.index'));
    }
}
