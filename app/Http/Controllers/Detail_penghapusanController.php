<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetail_PenghapusanRequest;
use App\Http\Requests\UpdateDetail_PenghapusanRequest;
use App\Repositories\Detail_PenghapusanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Detail_PenghapusanController extends AppBaseController
{
    /** @var  Detail_PenghapusanRepository */
    private $detailPenghapusanRepository;

    public function __construct(Detail_PenghapusanRepository $detailPenghapusanRepo)
    {
        $this->detailPenghapusanRepository = $detailPenghapusanRepo;
    }

   
    public function index(Request $request)
    {
        $detailPenghapusan = $this->detailPenghapusanRepository->all();

        return view('detail__Penghapusan.index')
            ->with('detailpenghapusan', $detailPenghapusan);
    }

   
    public function create()
    {
        return view('detail__penghapusan.create');
    }

  
    public function store(CreateDetail_PenghapusanRequest $request)
    {
        $input = $request->all();

        $detailPenghapusan = $this->detailPenghapusanRepository->create($input);

        Flash::success('Detail  Penghapusan saved successfully.');

        return redirect(route('detailpenghapusan.index'));
    }


    public function show($id)
    {
        $detailPenghapusan = $this->detailPenghapusanRepository->find($id);

        if (empty($detailPenghapusan)) {
            Flash::error('Detail  Penghapusan not found');

            return redirect(route('detailPenghapusan.index'));
        }

        return view('detail__penghapusan.show')->with('detailPenghapusan', $detailPenghapusan);
    }

 
    public function edit($id)
    {
        $detailPenghapusan = $this->detailPenghapusanRepository->find($id);

        if (empty($detailPenghapusan)) {
            Flash::error('Detail  Penghapusan not found');

            return redirect(route('detailPenghapusan.index'));
        }

        return view('detail__penghapusan.edit')->with('detailPenghapusan', $detailPenghapusan);
    }

   
    public function update($id, UpdateDetail_PenghapusanRequest $request)
    {
        $detailPenghapusan = $this->detailPenghapusanRepository->find($id);

        if (empty($detailPenghapusan)) {
            Flash::error('Detail  Penghapusan not found');

            return redirect(route('detailPenghapusan.index'));
        }

        $detailPenghapusan = $this->detailPenghapusanRepository->update($request->all(), $id);

        Flash::success('Detail  Penghapusan updated successfully.');

        return redirect(route('detailPenghapusan.index'));
    }

  
    public function destroy($id)
    {
        $detailPenghapusan = $this->detailPenghapusanRepository->find($id);

        if (empty($detailPenghapusan)) {
            Flash::error('Detail  Penghapusan not found');

            return redirect(route('detailPenghapusans.index'));
        }

        $this->detailPenghapusanRepository->delete($id);

        Flash::success('Detail  Penghapusan deleted successfully.');

        return redirect(route('detailPenghapusans.index'));
    }
}
