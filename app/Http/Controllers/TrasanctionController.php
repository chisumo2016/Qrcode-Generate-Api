<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrasanctionRequest;
use App\Http\Requests\UpdateTrasanctionRequest;
use App\Repositories\TrasanctionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TrasanctionController extends AppBaseController
{
    /** @var  TrasanctionRepository */
    private $trasanctionRepository;

    public function __construct(TrasanctionRepository $trasanctionRepo)
    {
        $this->trasanctionRepository = $trasanctionRepo;
    }

    /**
     * Display a listing of the Trasanction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trasanctionRepository->pushCriteria(new RequestCriteria($request));
        $trasanctions = $this->trasanctionRepository->all();

        return view('trasanctions.index')
            ->with('trasanctions', $trasanctions);
    }

    /**
     * Show the form for creating a new Trasanction.
     *
     * @return Response
     */
    public function create()
    {
        return view('trasanctions.create');
    }

    /**
     * Store a newly created Trasanction in storage.
     *
     * @param CreateTrasanctionRequest $request
     *
     * @return Response
     */
    public function store(CreateTrasanctionRequest $request)
    {
        $input = $request->all();

        $trasanction = $this->trasanctionRepository->create($input);

        Flash::success('Trasanction saved successfully.');

        return redirect(route('trasanctions.index'));
    }

    /**
     * Display the specified Trasanction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trasanction = $this->trasanctionRepository->findWithoutFail($id);


        if (empty($trasanction)) {
            Flash::error('Trasanction not found');

            return redirect(route('trasanctions.index'));
        }

        return view('trasanctions.show')->with('trasanction', $trasanction);
    }

    /**
     * Show the form for editing the specified Trasanction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trasanction = $this->trasanctionRepository->findWithoutFail($id);

        if (empty($trasanction)) {
            Flash::error('Trasanction not found');

            return redirect(route('trasanctions.index'));
        }

        return view('trasanctions.edit')->with('trasanction', $trasanction);
    }

    /**
     * Update the specified Trasanction in storage.
     *
     * @param  int              $id
     * @param UpdateTrasanctionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrasanctionRequest $request)
    {
        $trasanction = $this->trasanctionRepository->findWithoutFail($id);

        if (empty($trasanction)) {
            Flash::error('Trasanction not found');

            return redirect(route('trasanctions.index'));
        }

        $trasanction = $this->trasanctionRepository->update($request->all(), $id);

        Flash::success('Trasanction updated successfully.');

        return redirect(route('trasanctions.index'));
    }

    /**
     * Remove the specified Trasanction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trasanction = $this->trasanctionRepository->findWithoutFail($id);

        if (empty($trasanction)) {
            Flash::error('Trasanction not found');

            return redirect(route('trasanctions.index'));
        }

        $this->trasanctionRepository->delete($id);

        Flash::success('Trasanction deleted successfully.');

        return redirect(route('trasanctions.index'));
    }
}
