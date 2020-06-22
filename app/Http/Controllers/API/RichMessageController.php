<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RichMessageResource;
use App\RichMessage;
use App\Message;
use App\Image;
use Storage;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RichMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->data);
        if (!$data->id) {
            $richMessage = RichMessage::create(
                ['rich_message_type_id' => $data->rich_message_type_id]
            );
            $message = new Message(['title' => $data->title]);
            $richMessage->message()->save($message);
        } else {
            $richMessage = RichMessage::find($data->id);
            $richMessage->rich_message_type_id = $data->rich_message_type_id;
            $richMessage->save();
            foreach ($richMessage->images as $image) {
                Storage::delete($image->src);
            }
            $richMessage->images()->delete();
            $richMessage->message()->update(['title' => $data->title]);
        }

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = $richMessage->images()->create([
                    'src' => $path,
                ]);
            }
        }
        return response()->ok([], 201);
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
    public function update(Request $request, RichMessage $richMessage)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
