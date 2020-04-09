<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Repositories\WorkRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Work;
use App\Models\User;
use App\Models\Location;
use App\Models\Activity;

class WorkController extends AppBaseController
{
    /** @var  WorkRepository */
    private $workRepository;

    public function __construct(WorkRepository $workRepo)
    {
        $this->workRepository = $workRepo;
    }

    /**
     * Display a listing of the Work.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $from =  Carbon::now()->startOfMonth()->toDateTimeString();

        $works = Work::where('created_at', '>', $from)->orderBy('created_at', 'DESC')->paginate(15);

        return view('works.index')
            ->with('works', $works);
    }

    /**
     * Show the form for creating a new Work.
     *
     * @return Response
     */
    public function create()
    {

        $users = User::pluck('name', 'id');
        $locations = Location::pluck('name', 'id');
        $activities = Activity::pluck('description', 'id');

        return view('works.create', compact('users', 'locations', 'activities'));
    }

    /**
     * Store a newly created Work in storage.
     *
     * @param  CreateWorkRequest  $request
     *
     * @return Response
     */
    public function store(CreateWorkRequest $request)
    {
        $input = $request->all();

        $work = $this->workRepository->create($input);

        Flash::success('Work saved successfully.');

        return redirect(route('works.index'));
    }

    /**
     * Store a newly created Work in storage.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function insert(Request $request)
    {
        $inputs = $request->get('data');

        foreach ($inputs as $input){
            Work::create($input);
        }
        //Work::insert($inputs);

        return response()->json(['done' => $inputs]);

    }

    /**
     * Display the specified Work.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $work = $this->workRepository->find($id);

        if (empty($work)) {
            Flash::error('Work not found');

            return redirect(route('works.index'));
        }

        return view('works.show')->with('work', $work);
    }

    /**
     * Show the form for editing the specified Work.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $work = $this->workRepository->find($id);

        if (empty($work)) {
            Flash::error('Work not found');

            return redirect(route('works.index'));
        }

        $users = User::pluck('name', 'id');
        $locations = Location::pluck('name', 'id');
        $activities = Activity::pluck('description', 'id');

        return view('works.edit', compact('work', 'users', 'locations', 'activities'));

    }

    /**
     * Update the specified Work in storage.
     *
     * @param  int  $id
     * @param  UpdateWorkRequest  $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkRequest $request)
    {
        $work = $this->workRepository->find($id);

        if (empty($work)) {
            Flash::error('Work not found');

            return redirect(route('works.index'));
        }

        $work = $this->workRepository->update($request->all(), $id);

        Flash::success('Work updated successfully.');

        return redirect(route('works.index'));
    }

    /**
     * Remove the specified Work from storage.
     *
     * @param  int  $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $work = $this->workRepository->find($id);

        if (empty($work)) {
            Flash::error('Work not found');

            return redirect(route('works.index'));
        }

        $this->workRepository->delete($id);

        Flash::success('Work deleted successfully.');

        return redirect(route('works.index'));
    }
}
