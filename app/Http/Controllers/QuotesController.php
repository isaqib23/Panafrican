<?php

namespace App\Http\Controllers;

use App\Transformers\QuoteTransform;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\QuoteRepository;
use Illuminate\Http\Response;
use mysql_xdevapi\TableDelete;

/**
 * Class QuotesController.
 *
 * @package namespace App\Http\Controllers;
 */
class QuotesController extends Controller
{
    /**
     * @var QuoteRepository
     */
    protected $repository;

    /**
     * QuotesController constructor.
     *
     * @param QuoteRepository $repository
     */
    public function __construct(QuoteRepository $repository)
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
        $quotes = $this->repository->all()
            ->transformWith(new QuoteTransform())->toArray();

        return response()->json($quotes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\QuoteRequest $request
     *
     * @return Response
     */
    public function store(Requests\QuoteRequest $request)
    {
        $quote = $this->repository->store($request);

        return response()->json((new QuoteTransform())->transform($quote));
    }

    /**
     * @param Requests\deleteQuoteRequest $request
     * @return JsonResponse
     */
    public function getQuoteById(Requests\deleteQuoteRequest $request){
        $quote = $this->repository->findWhere(['id' => $request->input('id')])->first();

        if(!is_null($quote)){
            $quote = (new QuoteTransform())->transform($quote);
        }

        return response()->json($quote);
    }

    /**
     * @param Requests\deleteQuoteRequest $request
     * @return JsonResponse
     */
    public function delete(Requests\deleteQuoteRequest $request){

        $this->repository->delete($request->input('id'));

        return response()->json(['message' => 'Quote deleted successfully'],200);
    }
}
