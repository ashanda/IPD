<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $message = new Chat();
    $message->index_number = $request->input('index_number');
    $message->msg = $request->input('message');
    $message->bid = $request->input('bid');
    $message->save();

    // Fetch the last inserted message from the database
    $lastInsertedMessage = Chat::latest()->first();

    return response()->json(['message' => 'Record stored successfully', 'data' => $lastInsertedMessage], 200);
}
    
    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function getChatMessages()
    {
        // Fetch chat messages here and return them as JSON
        $batch = json_decode(Auth::user()->batch, true);
        $currentDate = Carbon::now();

        $chatMessages = User::join('chats', function ($join) use ($batch, $currentDate) {
            $join->on(function ($query) use ($batch) {
                foreach ($batch as $value) {
                    $query->orWhereJsonContains('chats.bid', $value);
                }
            })
            ->on('chats.index_number', '=', 'users.index_number') // Added this line
            ->whereIn('users.type', [2, 0]);
        })
        ->select('chats.*', 'users.fname', 'users.lname')
        ->distinct()
        ->orderBy('chats.created_at', 'desc')
        ->get();

 
            return response()->json($chatMessages);
       }
}
