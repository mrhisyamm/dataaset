<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenghapusanRequest;
use App\Http\Requests\UpdatePenghapusanRequest;
use App\Repositories\PenghapusanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\Penghapusan;
use App\Models\DetailPenghapusan;
use App\Models\Barang;
use Illuminate\Support\Str;
use PDF;

class PenghapusanController extends AppBaseController
{
    /** @var  PenghapusanRepository */
    private $PenghapusanRepository;

    public function __construct(PenghapusanRepository $PenghapusanRepo)
    {
        $this->PenghapusanRepository = $PenghapusanRepo;
    }

    /**
     * Display a listing of the Penghapusan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $penghapusan = $this->PenghapusanRepository->all();

        return view('penghapusan.index')
            ->with('penghapusan', $penghapusan);



    }

    /**
     * Show the form for creating a new Penghapusan.
     *
     * @return Response
     */
    public function create()
    {
        $nom_barang = \App\Models\Barang::get();
        $brg = \App\Models\Barang::all();
        $barang = \App\Models\Barang::all()->pluck('nama','id');
        // $keterangan = Keterangan::all();
        return view('penghapusan.create',
           compact('barang','nom_barang','brg'));
    }

    /**
     * Store a newly created Penghapusan in storage.
     *
     * @param CreatePenghapusanRequest $request
     *
     * @return Response
     */
    public function store(CreatePenghapusanRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

 
            $penghapusan = $this->PenghapusanRepository->create($input);
            foreach ($input['nama'] as $key => $row) {
                $detail_Penghapusan = new \App\Models\Detail_Penghapusan();
                $barang = \App\Models\Barang::where('nama', $input['nama'][$key])->first();
                $detail_Penghapusan->barangs_id = $barang->id;
                $result = $penghapusan->id;
                if ($input['qty'][$key] > $barang->stok){
                    Flash::error('Stok Kurang gan.');
                    return redirect(route('Penghapusan.create', $result)); 
                };
                $detail_Penghapusan->qty = $input['qty'][$key];
                $detail_Penghapusan->keterangan = $input['keterangan'][$key];
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();

                $nmfile = Str::uuid().".".$extension;
                $path = $request->file('file')->storeAs(
                    'bukti',$nmfile, 'data'
                );
                $detail_Penghapusan->bukti = $nmfile;
                // $detail_Penghapusan->subtotal = $input['subtotal'][$key];
                $detail_Penghapusan->penghapusan_id = $penghapusan->id;
                $detail_Penghapusan->save();
                
                //update stok ke table barang    
                $new_stok = (int)$barang->stok - (int)$input['qty'][$key];
                $barang->stok = $new_stok;
                $barang->save();

                //update detail pembelian
                $daftar_pembelian = \App\Models\Detail_pembelian::whereRaw('qty>qty_terjual AND barangs_id=?',[(int)$input['id'][$key]])
                                    ->orderBy('tanggal_expired')
                                    ->get();

                $jumlah = (int)$input['qty'][$key];
                foreach($daftar_pembelian as $pembelian) {
                    if ($jumlah > 0) {
                        $sisa = $pembelian->qty - $pembelian->qty_terjual;
                        if ($sisa>=$jumlah) {
                          $pembelian->qty_terjual += $jumlah;
                          $pembelian->save();
                          $jumlah = 0;
                        } else {
                          $pembelian->qty_terjual += $sisa;
                          $pembelian->save();
                          $jumlah -= $sisa;   
                        }
                    }
                }
               
            }
            $results = $penghapusan->id;
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
       
        
        // dd( $result);
        Flash::success('Penghapusan saved successfully.');
        //return redirect(route('Penghapusan.index'));

        return redirect(route('penghapusan.show', $result, $results)); 
    }

    /**
     * Display the specified Penghapusan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penghapusan = $this->PenghapusanRepository->find($id);

        if (empty($penghapusan)) {
            Flash::error('Penghapusan not found');

            return redirect(route('penghapusan.index'));
        }

        return view('penghapusan.show')->with('penghapusan', $penghapusan);
    }

    /**
     * Show the form for editing the specified Penghapusan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penghapusan = $this->PenghapusanRepository->find($id);

        if (empty($penghapusan)) {
            Flash::error('Penghapusan not found');

            return redirect(route('penghapusan.index'));
        }

        return view('penghapusan.edit')->with('penghapusan', $penghapusan);
    }

    /**
     * Update the specified Penghapusan in storage.
     *
     * @param int $id
     * @param UpdatePenghapusanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenghapusanRequest $request)
    {
        $penghapusan = $this->PenghapusanRepository->find($id);

        if (empty($penghapusan)) {
            Flash::error('Penghapusan not found');

            return redirect(route('penghapusan.index'));
        }

        $penghapusan = $this->PenghapusanRepository->update($request->all(), $id);

        Flash::success('Penghapusan updated successfully.');

        return redirect(route('penghapusan.index'));
    }

    /**
     * Remove the specified Penghapusan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penghapusan = $this->PenghapusanRepository->find($id);

        if (empty($penghapusan)) {
            Flash::error('Penghapusan not found');

            return redirect(route('penghapusan.index'));
        }

        $this->PenghapusanRepository->delete($id);

        Flash::success('penghapusan deleted successfully.');

        return redirect(route('penghapusan.index'));
    }
    public function pdf($id)
    {
         $penghapusan = $this->PenghapusanRepository->find($id);
        if (empty($penghapusan)) {
            Flash::error('Penghapusan not found');
            return redirect(route('penghapusan.index'));
        }
        $pdf = PDF::loadView('penghapusan.nota',
            compact('penghapusan'))->setPaper([0,0,450.98,300.85],'landscape');
        //return $pdf->download('detail_Penghapusan.pdf'); 
        return $pdf->stream('detail_Penghapusan.pdf'); 
    }
}
