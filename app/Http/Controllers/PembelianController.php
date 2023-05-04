<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Repositories\PembelianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Barang;
use App\Models\Detail_pembelian;
use App\Models\Pembelian;
use App\Models\Suplier;
use DB;

class PembelianController extends AppBaseController
{
    /** @var  PembelianRepository */
    private $pembelianRepository;

    public function __construct(PembelianRepository $pembelianRepo)
    {
        $this->pembelianRepository = $pembelianRepo;
    }

    /**
     * Display a listing of the Pembelian.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pembelians = $this->pembelianRepository->all();
        $detail_pembelian = Detail_Pembelian::all();
        $barangs = Barang::all();

        return view('pembelians.index')
            ->with('pembelians', $pembelians)->with('detail_pembelian', $detail_pembelian)->with('barangs', $barangs);
    }

    /**
     * Show the form for creating a new Pembelian.
     *
     * @return Response
     */
    public function create()
    {
        $nom_barang = \App\Models\Barang::get();
        $barang = \App\Models\Barang::all()->pluck('nama','id');
                $suplier = \App\Models\Suplier::all()->pluck('name','id');
        return view('pembelians.create',
            compact('barang','suplier','nom_barang'));
    }

    /**
     * Store a newly created Pembelian in storage.
     *
     * @param CreatePembelianRequest $request
     *
     * @return Response
     */
    public function store(CreatePembelianRequest $request)
    {
         DB::beginTransaction();
        try {
            $input = $request->all();
            $pembelian = $this->pembelianRepository->create($input);
            foreach ($input['nama'] as $key => $row) {
                $detail_pembelian = new \App\Models\Detail_pembelian();
                $barang = \App\Models\Barang::where('nama', $input['nama'][$key])->first();
                //$a = \App\Models\Barang::where('nama', $input['nama'][$key])->first();

                $detail_pembelian->barangs_id = $barang->id;

                
                $detail_pembelian->qty = $input['qty'][$key];
                $detail_pembelian->subtotal = $input['subtotal'][$key];
                $detail_pembelian->tanggal_beli = $input['tanggal_beli'][$key];
                $detail_pembelian->harga_beli = $input['harga_beli'][$key];
                $detail_pembelian->pembelians_id = $pembelian->id;
                $detail_pembelian->save();

                $new_stok = (int)$barang->stok + (int)$input['qty'][$key];
                // $new = (int)$barang->harga_beli+0;
                //$a->harga_beli=(int)$input['harga_beli'][$key];
                $barang->stok = $new_stok;
                $barang->save();
                //$a->save();


            }
            $result = $pembelian->id;
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
       
        
        // dd( $result);
        Flash::success('Pembelian saved successfully.');
        //return redirect(route('pembelians.index'));
            return redirect(route('pembelians.show', $result));
    }

    /**
     * Display the specified Pembelian.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pembelian = $this->pembelianRepository->find($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        return view('pembelians.show')->with('pembelian', $pembelian);
    }

    /**
     * Show the form for editing the specified Pembelian.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pembelian = $this->pembelianRepository->find($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        return view('pembelians.edit')->with('pembelian', $pembelian);
    }

    /**
     * Update the specified Pembelian in storage.
     *
     * @param int $id
     * @param UpdatePembelianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembelianRequest $request)
    {
        $pembelian = $this->pembelianRepository->find($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        $pembelian = $this->pembelianRepository->update($request->all(), $id);

        Flash::success('Pembelian updated successfully.');

        return redirect(route('pembelians.index'));
    }

    /**
     * Remove the specified Pembelian from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pembelian = $this->pembelianRepository->find($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        $this->pembelianRepository->delete($id);

        Flash::success('Pembelian deleted successfully.');

        return redirect(route('pembelians.index'));
    }
}
