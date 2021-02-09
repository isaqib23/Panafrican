<?php

namespace App\Http\Controllers;

use App\Repositories\AccountsRepositoryEloquent;
use App\Repositories\ActivityRepositoryEloquent;
use App\Repositories\ContactRepositoryEloquent;
use App\Repositories\LeadsRepositoryEloquent;
use App\Repositories\OpportunityRepositoryEloquent;
use App\Transformers\NotesTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\NoteRepository;
use Illuminate\Http\Response;

/**
 * Class NotesController.
 *
 * @package namespace App\Http\Controllers;
 */
class NotesController extends Controller
{
    /**
     * @var NoteRepository
     */
    protected $repository;
    /**
     * @var LeadsRepositoryEloquent
     */
    private $leadsRepositoryEloquent;
    /**
     * @var ContactRepositoryEloquent
     */
    private $contactRepositoryEloquent;
    /**
     * @var OpportunityRepositoryEloquent
     */
    private $opportunityRepositoryEloquent;
    /**
     * @var ActivityRepositoryEloquent
     */
    private $activityRepositoryEloquent;
    /**
     * @var AccountsRepositoryEloquent
     */
    private $accountsRepositoryEloquent;

    /**
     * NotesController constructor.
     *
     * @param NoteRepository $repository
     * @param LeadsRepositoryEloquent $leadsRepositoryEloquent
     * @param ContactRepositoryEloquent $contactRepositoryEloquent
     * @param OpportunityRepositoryEloquent $opportunityRepositoryEloquent
     * @param ActivityRepositoryEloquent $activityRepositoryEloquent
     * @param AccountsRepositoryEloquent $accountsRepositoryEloquent
     */
    public function __construct(
        NoteRepository $repository,
        LeadsRepositoryEloquent $leadsRepositoryEloquent,
        ContactRepositoryEloquent $contactRepositoryEloquent,
        OpportunityRepositoryEloquent $opportunityRepositoryEloquent,
        ActivityRepositoryEloquent $activityRepositoryEloquent,
        AccountsRepositoryEloquent $accountsRepositoryEloquent
)
    {
        $this->repository = $repository;
        $this->leadsRepositoryEloquent = $leadsRepositoryEloquent;
        $this->contactRepositoryEloquent = $contactRepositoryEloquent;
        $this->opportunityRepositoryEloquent = $opportunityRepositoryEloquent;
        $this->activityRepositoryEloquent = $activityRepositoryEloquent;
        $this->accountsRepositoryEloquent = $accountsRepositoryEloquent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $notes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $notes,
            ]);
        }

        return view('notes.index', compact('notes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\NotesRequest $request
     *
     * @return Response
     *
     */
    public function store(Requests\NotesRequest $request)
    {
        if($request->input('type') == 'lead'){
            $lead = $this->leadsRepositoryEloquent->findWhere(["id" => $request->input('type_id')])->first();
            $request->merge(['branch_id' => $lead->branch_id]);
        }elseif($request->input('type') == 'opportunity'){
            $lead = $this->opportunityRepositoryEloquent->findWhere(["id" => $request->input('type_id')])->first();
            $request->merge(['branch_id' => $lead->branch_id]);
        }elseif($request->input('type') == 'account'){
            $lead = $this->accountsRepositoryEloquent->findWhere(["id" => $request->input('type_id')])->first();
            $request->merge(['branch_id' => $lead->branch_id]);
        }elseif($request->input('type') == 'contact'){
            $lead = $this->contactRepositoryEloquent->findWhere(["id" => $request->input('type_id')])->first();
            $request->merge(['branch_id' => $lead->branch_id]);
        }elseif($request->input('type') == 'activity'){
            $lead = $this->activityRepositoryEloquent->findWhere(["id" => $request->input('type_id')])->first();
            $request->merge(['branch_id' => $lead->branch_id]);
        }


        $note = $this->repository->store($request);

        return response()->json((new NotesTransformer())->transform($note));
    }
}
