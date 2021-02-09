<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactRepository;

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
}
