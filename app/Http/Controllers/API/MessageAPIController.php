<?php

namespace App\Http\Controllers\API;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageAPIController extends APIController
{

    private $slug = 'messages';
    private $model = Message::class;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $user = Auth::user();
        return Message::where('user_id', $user->id)->get();
    }

    /**
     * @param  Request  $request
     * @return Message
     */
    public function store(Request $request)
    {
        $message = new Message();
        $user = Auth::user();
        $message->user_id = $user->id;
        $message->save();
        return $message;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return Message::find($id);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function update(int $id)
    {
        $message = Message::find($id);
        if (isset($message->id)) {
            //
        }
        return $message;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $message = Message::find($id);
        if (isset($message->id)) {
            $message->delete();
        }
        return $message;
    }

}
