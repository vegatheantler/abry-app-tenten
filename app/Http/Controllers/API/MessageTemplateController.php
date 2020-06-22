<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MessageTemplate;
// use App\MessageTemplateStoreRequest;
use App\Http\Resources\MessageTemplateResource;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;   

class MessageTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messageTemplates = QueryBuilder::for(MessageTemplate::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
            ])
            ->allowedIncludes(['messages'])
            ->allowedSorts(['id', 'created_at'])
            ->orderBy('id', 'ASC')
            ->get();
        return MessageTemplateResource::collection($messageTemplates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messageTemplate = MessageTemplate::create([$request]);

        return response()->ok($messageTemplate, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageTemplate $messageTemplate)
    {
        $messageTemplate->delete();
        return response()->ok();
    }
}
