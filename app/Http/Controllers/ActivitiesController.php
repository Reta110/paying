<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivitiesRequest;
use App\Http\Requests\UpdateActivitiesRequest;
use App\Repositories\ActivityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\ActivityType;

class ActivitiesController extends AppBaseController
{
    /** @var  ActivityRepository */
    private $activityRepository;

    public function __construct(ActivityRepository $activitiesRepo)
    {
        $this->activityRepository = $activitiesRepo;
    }

    /**
     * Display a listing of the Activities.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $activities = $this->activityRepository->all();

        return view('activities.index')
            ->with('activities', $activities);
    }

    /**
     * Show the form for creating a new Activities.
     *
     * @return Response
     */
    public function create()
    {

        $activity_types = ActivityType::pluck('name', 'id');

        return view('activities.create', compact('activity_types'));
    }

    /**
     * Store a newly created Activities in storage.
     *
     * @param CreateActivitiesRequest $request
     *
     * @return Response
     */
    public function store(CreateActivitiesRequest $request)
    {
        $input = $request->all();

        $activities = $this->activityRepository->create($input);

        Flash::success('Activities saved successfully.');

        return redirect(route('activities.index'));
    }

    /**
     * Display the specified Activities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activities = $this->activityRepository->find($id);

        if (empty($activities)) {
            Flash::error('Activities not found');

            return redirect(route('activities.index'));
        }

        return view('activities.show')->with('activities', $activities);
    }

    /**
     * Show the form for editing the specified Activities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activities = $this->activityRepository->find($id);

        if (empty($activities)) {
            Flash::error('Activities not found');

            return redirect(route('activities.index'));
        }

        $activity_types = ActivityType::pluck('name', 'id');

        return view('activities.edit', compact('activities', 'activity_types'));
    }

    /**
     * Update the specified Activities in storage.
     *
     * @param int $id
     * @param UpdateActivitiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivitiesRequest $request)
    {
        $activities = $this->activityRepository->find($id);

        if (empty($activities)) {
            Flash::error('Activities not found');

            return redirect(route('activities.index'));
        }

        $activities = $this->activityRepository->update($request->all(), $id);

        Flash::success('Activities updated successfully.');

        return redirect(route('activities.index'));
    }

    /**
     * Remove the specified Activities from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activities = $this->activityRepository->find($id);

        if (empty($activities)) {
            Flash::error('Activities not found');

            return redirect(route('activities.index'));
        }

        $this->activityRepository->delete($id);

        Flash::success('Activities deleted successfully.');

        return redirect(route('activities.index'));
    }
}
