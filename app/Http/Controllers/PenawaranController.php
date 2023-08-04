<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenawaranRequest;
use App\Http\Requests\UpdatePenawaranRequest;
use App\Repositories\PenawaranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penawaran;
use App\Models\User;
use Flash;
use Response;

class PenawaranController extends AppBaseController
{
    /** @var  PenawaranRepository */
    private $penawaranRepository;

    public function __construct(PenawaranRepository $penawaranRepo)
    {
        $this->penawaranRepository = $penawaranRepo;
    }

    /**
     * Display a listing of the Penawaran.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $penawarans = $this->penawaranRepository->all();
        
        return view('penawarans.index')
            ->with('penawarans', $penawarans);
    }

    public function indexDetail($id)
    {
        // return $id;
        // $penawaran = $this->penawaranRepository->find($id);
        // $penawarans = $this->penawaranRepository->all();
        $penawarans = Penawaran::where('lelang_id',$id)->get();
        foreach ($penawarans as $penawaran) {
            $penawaran['nama'] = User::find($penawaran['users_id'])->name;
        }

        $isPenawaranSelesai = false;
        foreach($penawarans as $penawaran){
            if ($penawaran->is_selected == 1) {
                $isPenawaranSelesai = true;
            }
        }

        return view('penawarans.index', compact('isPenawaranSelesai'))
            ->with('penawarans', $penawarans)->with('idLelang',$id);
    }

    /**
     * Show the form for creating a new Penawaran.
     *
     * @return Response
     */
    public function create()
    {
        return view('penawarans.create');
    }

    public function create2($lelangId)
    {
        return view('penawarans.create', compact('lelangId'));
    }

    /**
     * Store a newly created Penawaran in storage.
     *
     * @param CreatePenawaranRequest $request
     *
     * @return Response
     */
    public function store(CreatePenawaranRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $input['users_id'] = $user['id'];
        // return $input['lelangId'];;
        $input['lelang_id'] = $input['lelangId'];
        // return $input;
        $penawaran = $this->penawaranRepository->create($input);
        $lelangId = $input['lelangId'];
        Flash::success('Penawaran saved successfully.');

        return redirect(route('penawaran.detail',[$penawaran->lelang_id]));
        
    }

    /**
     * Display the specified Penawaran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penawaran = $this->penawaranRepository->find($id);
        // return $penawaran;
        if (empty($penawaran)) {
            Flash::error('Penawaran not found');

            return redirect(route('penawarans.index'));
        }

        return view('penawarans.show')->with('penawaran', $penawaran);
    }

    /**
     * Show the form for editing the specified Penawaran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penawaran = $this->penawaranRepository->find($id);

        // return $penawaran;

        $lelangId = $penawaran->lelang_id;

        if (empty($penawaran)) {
            Flash::error('Penawaran not found');

            return redirect(route('penawarans.index'));
        }

        return view('penawarans.edit',compact('lelangId'))->with('penawaran', $penawaran );
    }

    /**
     * Update the specified Penawaran in storage.
     *
     * @param int $id
     * @param UpdatePenawaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenawaranRequest $request)
    {

        $penawaran = $this->penawaranRepository->find($id);

        if (empty($penawaran)) {
            Flash::error('Penawaran not found');

            return redirect(route('penawarans.index'));
        }

        // return $penawaran;

        $penawaran = $this->penawaranRepository->update($request->all(), $id);

        Flash::success('Penawaran updated successfully.');

        return redirect(route('penawaran.detail',[$penawaran->lelang_id]));
    }

    /**
     * Remove the specified Penawaran from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penawaran = $this->penawaranRepository->find($id);

        if (empty($penawaran)) {
            Flash::error('Penawaran not found');

            return redirect(route('penawarans.index'));
        }

        $this->penawaranRepository->delete($id);

        Flash::success('Penawaran deleted successfully.');

        return redirect(route('penawarans.index'));
    }
    public function showDetail(Lelang $lelang)
{
    // Lakukan operasi apa pun yang diperlukan dengan objek $lelang
    // Misalnya, tampilkan penawaran yang terkait dengan lelang

    return view('penawarans.detail', compact('lelang'));
}
}
