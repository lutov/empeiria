<?php

namespace App\Http\Controllers\API;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationAPIController extends APIController
{

    private $slug = 'conversations';
    private $model = Conversation::class;

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
        return Conversation::where('user_id', $user->id)->get();
    }

    /**
     * @param  Request  $request
     * @return Conversation
     */
    public function store(Request $request)
    {
        $conversation = new Conversation();
        $user = Auth::user();
        $conversation->user_id = $user->id;
        $conversation->save();
        return $conversation;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return Conversation::find($id);
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function update(int $id)
    {
        $conversation = Conversation::find($id);
        if (isset($conversation->id)) {
            //
        }
        return $conversation;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $conversation = Conversation::find($id);
        if (isset($conversation->id)) {
            $conversation->delete();
        }
        return $conversation;
    }

}
