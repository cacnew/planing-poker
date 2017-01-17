<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EntityService;

abstract class EntityController extends Controller
{
    protected $service;

    public function __construct(EntityService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getRepository()->all();
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id)
    {
        return $this->service->getRepository()->find($id);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

}
