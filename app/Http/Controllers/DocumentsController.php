<?php

namespace App\Http\Controllers;

use App\Transformers\DocumentTransform;
use App\Transformers\SaleTargetTransform;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\DocumentRepository;
use Illuminate\Http\Response;

/**
 * Class DocumentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class DocumentsController extends Controller
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * DocumentsController constructor.
     *
     * @param DocumentRepository $repository
     */
    public function __construct(DocumentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $documents = $this->repository->all()
            ->transformWith(new DocumentTransform())->toArray();

        return response()->json($documents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\DocumentRequest $request
     *
     * @return Response
     */
    public function store(Requests\DocumentRequest $request)
    {
        $document = $this->repository->store($request);

        return response()->json((new DocumentTransform())->transform($document));
    }

    /**
     * @param Requests\DeleteDocumentRequest $request
     * @return JsonResponse
     */
    public function getDocumentById(Requests\DeleteDocumentRequest $request){
        $document = $this->repository->findWhere(['id' => $request->input('id')])->first();

        if(!is_null($document)){
            $document = (new DocumentTransform())->transform($document);
        }

        return response()->json($document);
    }

    /**
     * @param Requests\DeleteDocumentRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\DeleteDocumentRequest $request){
        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Document deleted successfully'],200);
    }
}
