<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdetail_pembelianRequest;
use App\Http\Requests\Updatedetail_pembelianRequest;
use App\Repositories\detail_pembelianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Detail_pembelian;
use Carbon;

class detail_pembelianController extends AppBaseController
{
    /** @var  detail_pembelianRepository */
    private $detailPembelianRepository;

    public function __construct(detail_pembelianRepository $detailPembelianRepo)
    {
        $this->detailPembelianRepository = $detailPembelianRepo;
    }

    /**
     * Display a listing of the detail_pembelian.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detailPembelians = Detail_pembelian::all();
        // orderBy('tanggal_beli')->get();
        //$detailPembelians = $this->detailPembelianRepository->all();
             $mytime = Carbon\Carbon::now(); // today

                    
                    
               
        return view('detail_pembelians.index',compact('detailPembelians','mytime'))
            ->with('detailPembelians', $detailPembelians);
    }

    /**
     * Show the form for creating a new detail_pembelian.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_pembelians.create');
    }

    /**
     * Store a newly created detail_pembelian in storage.
     *
     * @param Createdetail_pembelianRequest $request
     *
     * @return Response
     */
    public function store(Createdetail_pembelianRequest $request)
    {
        $input = $request->all();

        $detailPembelian = $this->detailPembelianRepository->create($input);

        Flash::success('Detail Pembelian saved successfully.');

        return redirect(route('detailPembelians.index'));
    }

    /**
     * Display the specified detail_pembelian.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailPembelian = $this->detailPembelianRepository->find($id);

        if (empty($detailPembelian)) {
            Flash::error('Detail Pembelian not found');

            return redirect(route('detailPembelians.index'));
        }

        return view('detail_pembelians.show')->with('detailPembelian', $detailPembelian);
    }

    /**
     * Show the form for editing the specified detail_pembelian.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailPembelian = $this->detailPembelianRepository->find($id);

        if (empty($detailPembelian)) {
            Flash::error('Detail Pembelian not found');

            return redirect(route('detailPembelians.index'));
        }

        return view('detail_pembelians.edit')->with('detailPembelian', $detailPembelian);
    }

    /**
     * Update the specified detail_pembelian in storage.
     *
     * @param int $id
     * @param Updatedetail_pembelianRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetail_pembelianRequest $request)
    {
        $detailPembelian = $this->detailPembelianRepository->find($id);

        if (empty($detailPembelian)) {
            Flash::error('Detail Pembelian not found');

            return redirect(route('detailPembelians.index'));
        }

        $detailPembelian = $this->detailPembelianRepository->update($request->all(), $id);

        Flash::success('Detail Pembelian updated successfully.');

        return redirect(route('detailPembelians.index'));
    }

    /**
     * Remove the specified detail_pembelian from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailPembelian = $this->detailPembelianRepository->find($id);

        if (empty($detailPembelian)) {
            Flash::error('Detail Pembelian not found');

            return redirect(route('detailPembelians.index'));
        }

        $this->detailPembelianRepository->delete($id);

        Flash::success('Detail Pembelian deleted successfully.');

        return redirect(route('detailPembelians.index'));
    }
}
