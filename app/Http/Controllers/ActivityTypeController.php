<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivityTypeRequest;
use App\Http\Requests\UpdateActivityTypeRequest;
use App\Repositories\ActivityTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ActivityTypeController extends AppBaseController
{
    /** @var  ActivityTypeRepository */
    private $activityTypeRepository;

    public function __construct(ActivityTypeRepository $activityTypeRepo)
    {
        $this->activityTypeRepository = $activityTypeRepo;
    }

    /**
     * Display a listing of the ActivityType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $activityTypes = $this->activityTypeRepository->all();

        return view('activity_types.index')
            ->with('activityTypes', $activityTypes);
    }

    /**
     * Show the form for creating a new ActivityType.
     *
     * @return Response
     */
    public function create()
    {
        return view('activity_types.create');
    }

    /**
     * Store a newly created ActivityType in storage.
     *
     * @param CreateActivityTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityTypeRequest $request)
    {
        $input = $request->all();

        $activityType = $this->activityTypeRepository->create($input);

        Flash::success('Activity Type saved successfully.');

        return redirect(route('activityTypes.index'));
    }

    /**
     * Display the specified ActivityType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activityType = $this->activityTypeRepository->find($id);

        if (empty($activityType)) {
            Flash::error('Activity Type not found');

            return redirect(route('activityTypes.index'));
        }

        return view('activity_types.show')->with('activityType', $activityType);
    }

    /**
     * Show the form for editing the specified ActivityType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activityType = $this->activityTypeRepository->find($id);

        if (empty($activityType)) {
            Flash::error('Activity Type not found');

            return redirect(route('activityTypes.index'));
        }

        return view('activity_types.edit')->with('activityType', $activityType);
    }

    /**
     * Update the specified ActivityType in storage.
     *
     * @param int $id
     * @param UpdateActivityTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityTypeRequest $request)
    {
        $activityType = $this->activityTypeRepository->find($id);

        if (empty($activityType)) {
            Flash::error('Activity Type not found');

            return redirect(route('activityTypes.index'));
        }

        $activityType = $this->activityTypeRepository->update($request->all(), $id);

        Flash::success('Activity Type updated successfully.');

        return redirect(route('activityTypes.index'));
    }

    /**
     * Remove the specified ActivityType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activityType = $this->activityTypeRepository->find($id);

        if (empty($activityType)) {
            Flash::error('Activity Type not found');

            return redirect(route('activityTypes.index'));
        }

        $this->activityTypeRepository->delete($id);

        Flash::success('Activity Type deleted successfully.');

        return redirect(route('activityTypes.index'));
    }
}
