<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSuplierRequest;
use App\Http\Requests\UpdateSuplierRequest;
use App\Repositories\SuplierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SuplierController extends AppBaseController
{
    /** @var  SuplierRepository */
    private $suplierRepository;

    public function __construct(SuplierRepository $suplierRepo)
    {
        $this->suplierRepository = $suplierRepo;
    }

    /**
     * Display a listing of the Suplier.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $supliers = $this->suplierRepository->all();

        return view('supliers.index')
            ->with('supliers', $supliers);
    }

    /**
     * Show the form for creating a new Suplier.
     *
     * @return Response
     */
    public function create()
    {
        return view('supliers.create');
    }

    /**
     * Store a newly created Suplier in storage.
     *
     * @param CreateSuplierRequest $request
     *
     * @return Response
     */
    public function store(CreateSuplierRequest $request)
    {
        $input = $request->all();

        $suplier = $this->suplierRepository->create($input);

        Flash::success('Suplier saved successfully.');

        return redirect(route('supliers.index'));
    }

    /**
     * Display the specified Suplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suplier = $this->suplierRepository->find($id);

        if (empty($suplier)) {
            Flash::error('Suplier not found');

            return redirect(route('supliers.index'));
        }

        return view('supliers.show')->with('suplier', $suplier);
    }

    /**
     * Show the form for editing the specified Suplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suplier = $this->suplierRepository->find($id);

        if (empty($suplier)) {
            Flash::error('Suplier not found');

            return redirect(route('supliers.index'));
        }

        return view('supliers.edit')->with('suplier', $suplier);
    }

    /**
     * Update the specified Suplier in storage.
     *
     * @param int $id
     * @param UpdateSuplierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSuplierRequest $request)
    {
        $suplier = $this->suplierRepository->find($id);

        if (empty($suplier)) {
            Flash::error('Suplier not found');

            return redirect(route('supliers.index'));
        }

        $suplier = $this->suplierRepository->update($request->all(), $id);

        Flash::success('Suplier updated successfully.');

        return redirect(route('supliers.index'));
    }

    /**
     * Remove the specified Suplier from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suplier = $this->suplierRepository->find($id);

        if (empty($suplier)) {
            Flash::error('Suplier not found');

            return redirect(route('supliers.index'));
        }

        $this->suplierRepository->delete($id);

        Flash::success('Suplier deleted successfully.');

        return redirect(route('supliers.index'));
    }
}
