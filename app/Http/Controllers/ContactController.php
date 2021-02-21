<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\deleteContactRequest;
use App\Transformers\ContactTransform;
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
     * @param ContactRequest $request
     *
     * @return Response
     */
    public function store(ContactRequest $request)
    {
        $contact = $this->repository->store($request);

        return response()->json((new ContactTransform())->transform($contact));
    }

    /**
     * @param $request
     * @return JsonResponse
     */
    public function getContactById(DeleteContactRequest $request){
        $contact = $this->repository->findWhere(['id' => $request->input('id')])->first();

        return response()->json((new ContactTransform())->transform($contact));
    }

    /**
     * @param deleteContactRequest $request
     * @return JsonResponse
     */
    public function delete(deleteContactRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Contact deleted successfully'],200);
    }
}
