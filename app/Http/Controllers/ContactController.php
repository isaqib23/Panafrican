<?php

namespace App\Http\Controllers;

use App\Transformers\ContactTransform;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Repositories\ContactRepository;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * @var ContactRepository
     */
    private $repository;

    /**
     * ContactController constructor.
     * @param ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = $this->repository->all()
            ->transformWith(new ContactTransform())->toArray();

        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request\ContactRequest $request
     *
     * @return Response
     */
    public function store(Request\ContactRequest $request)
    {
        $contact = $this->repository->store($request);

        return response()->json((new ContactTransform())->transform($contact));
    }

    /**
     * @param Request\DeleteContactRequest $request
     * @return JsonResponse
     */
    public function getContactById(Request\DeleteContactRequest $request){
        $contact = $this->repository->findWhere(['id' => $request->input('id')])->first();

        return response()->json((new ContactTransform())->transform($contact));
    }

    /**
     * @param Request\DeleteContactRequest $request
     * @return JsonResponse
     */
    public function delete(Request\DeleteContactRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Contact deleted successfully'],200);
    }
}
