<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Resources\Admin\TeamResource;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamResource(Team::all());
    }

    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->all());

        if ($request->input('photos', false)) {
            $team->addMedia(storage_path('tmp/uploads/' . basename($request->input('photos'))))->toMediaCollection('photos');
        }

        return (new TeamResource($team))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamResource($team);
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->all());

        if ($request->input('photos', false)) {
            if (!$team->photos || $request->input('photos') !== $team->photos->file_name) {
                if ($team->photos) {
                    $team->photos->delete();
                }
                $team->addMedia(storage_path('tmp/uploads/' . basename($request->input('photos'))))->toMediaCollection('photos');
            }
        } elseif ($team->photos) {
            $team->photos->delete();
        }

        return (new TeamResource($team))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
