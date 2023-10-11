<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInboxRequest;
use App\Http\Requests\UpdateInboxRequest;
use App\Http\Resources\Admin\InboxResource;
use App\Models\Inbox;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InboxApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inbox_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InboxResource(Inbox::all());
    }

    public function store(StoreInboxRequest $request)
    {
        $inbox = Inbox::create($request->all());

        return (new InboxResource($inbox))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Inbox $inbox)
    {
        abort_if(Gate::denies('inbox_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InboxResource($inbox);
    }

    public function update(UpdateInboxRequest $request, Inbox $inbox)
    {
        $inbox->update($request->all());

        return (new InboxResource($inbox))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Inbox $inbox)
    {
        abort_if(Gate::denies('inbox_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inbox->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
