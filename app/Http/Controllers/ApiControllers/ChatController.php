<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    use CommonTrait;

    public function create_chat(Request $request)
    {
        $chat_exist = Chat::where(function ($query) use ($request) {
            $query->where('sender_id', Auth::id());
            $query->orWhere('receiver_id', Auth::id());
        })->where(function ($query) use ($request) {
            $query->where('sender_id', $request->receiver_id);
            $query->orWhere('receiver_id', $request->sender_id);
        })->first();
        if ($chat_exist) {
            if ($request->type == 'text' && !$request->message) {
                return $this->sendError('Message required', null);
            }
            if ($request->type == 'video' && !$request->has('media')) {
                return $this->sendError('Video required ', null);
            }
            if ($request->type == 'image' && !$request->has('media')) {
                return $this->sendError('Image required ', null);
            }

            $sender_id = Auth::id();
            $receiver_id = $request->receiver_id;

            if ($chat_exist->sender_deleted == 1) {
                $chat_exist->sender_deleted = 0;
                $chat_exist->update();
            }

            if ($chat_exist->receiver_id == 1) {
                $chat_exist->receiver_id = 0;
                $chat_exist->update();
            }

            $message = new ChatMessage();
            $message->chat_id = $chat_exist->id;
            $message->sender_id = $sender_id;
            $message->receiver_id = $receiver_id;

            if ($request->type == 'image') {
                if ($request->media) {
                    $img = $request->media;
                    $image_name = $img->getClientOriginalName() . '-' . time();
                    $folder_to_save = '/uploads/messages/';
                    $filePath = $folder_to_save . $image_name . '.' . $img->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/messages/');
                    $img->move($destinationPath, $image_name . '.' . $img->getClientOriginalExtension());
                    $message->file_path = $filePath;
                    $message->message = $image_name;
                    $type = 'image';
                } else {
                    return $this->sendError('Image required', null);
                }
            }
            if ($request->type == 'multi_images') {
                if ($request->media) {
                    $path_array = [];
                    foreach ($request->media as $img) {
                        $image_name = $img->getClientOriginalName() . '-' . time();
                        $folder_to_save = '/uploads/messages/';
                        $filePath = $folder_to_save . $image_name . '.' . $img->getClientOriginalExtension();
                        $destinationPath = public_path('/uploads/messages/');
                        $img->move($destinationPath, $image_name . '.' . $img->getClientOriginalExtension());
                        array_push($path_array, $filePath);
                    }
                    $message->file_path = implode(', ', $path_array);
                    $message->message = 'multi_images';
                    $type = 'multi_images';
                } else {
                    return $this->sendError('Images required', null);
                }
            }
            if ($request->has('link')) {
                $type = $request->type;
                $message->file_path = $request->link;
            }
            if ($request->message) {
                $message->message = $request->message;
            }

            if (isset($type)) {
                $message->type = $type;
            } else {
                $message->type = $request->type;
            }
            $message->is_read = 0;
            $message->save();

            $chat_exist->last_message_id = $message->id;
            $chat_exist->save();

            $data['message'] = ChatMessage::where('id', $message->id)->with('sender', 'receiver')->first();
            $data['chat'] = $chat_exist;
        } else {
            $chat = new Chat();
            $chat->sender_id = Auth::id();
            $chat->receiver_id = $request->receiver_id;
            if ($chat->save()) {
                $current_chat = Chat::where('id', $chat->id)->with('sender', 'receiver')->first();
                if ($request->has('type')) {
                    if ($request->type == 'text' && !$request->message) {
                        return $this->sendError('Message required', null);
                    }
                    if ($request->type == 'video' && !$request->has('media')) {
                        return $this->sendError('Video required ', null);
                    }
                    if ($request->type == 'image' && !$request->has('media')) {
                        return $this->sendError('Image required ', null);
                    }

                    if ($current_chat->sender_id == Auth::id()) {
                        $sender_id = $current_chat->sender_id;
                        $receiver_id = $current_chat->receiver_id;
                    } else {
                        $sender_id = $current_chat->receiver_id;
                        $receiver_id = $current_chat->sender_id;
                    }
                    $message = new ChatMessage();
                    $message->chat_id = $current_chat->id;
                    $message->sender_id = $sender_id;
                    $message->receiver_id = $receiver_id;
                    if ($request->type == 'image') {
                        if ($request->media) {
                            $img = $request->media;
                            $image_name = $img->getClientOriginalName() . '-' . time();
                            $folder_to_save = '/uploads/messages/';
                            $filePath = $folder_to_save . $image_name . '.' . $img->getClientOriginalExtension();
                            $destinationPath = public_path('/uploads/messages/');
                            $img->move($destinationPath, $image_name . '.' . $img->getClientOriginalExtension());
                            $message->file_path = $filePath;
                            $message->message = $image_name;
                            $type = 'image';
                        } else {
                            return $this->sendError('Image required', null);
                        }
                    }
                    if ($request->type == 'multi_images') {
                        if ($request->media) {
                            $path_array = [];
                            foreach ($request->media as $img) {
                                $image_name = $img->getClientOriginalName() . '-' . time();
                                $folder_to_save = '/uploads/messages/';
                                $filePath = $folder_to_save . $image_name . '.' . $img->getClientOriginalExtension();
                                $destinationPath = public_path('/uploads/messages/');
                                $img->move($destinationPath, $image_name . '.' . $img->getClientOriginalExtension());
                                array_push($path_array, $filePath);
                            }
                            $message->file_path = implode(', ', $path_array);
                            $message->message = 'multi_images';
                            $type = 'multi_images';
                        } else {
                            return $this->sendError('Images required', null);
                        }
                    }
                    if ($request->message) {
                        $message->message = $request->message;
                    }
                    if ($request->has('link')) {
                        $type = $request->type;
                        $message->file_path = $request->link;
                    }

                    if (isset($type)) {
                        $message->type = $type;
                    } else {
                        $message->type = $request->type;
                    }
                    $message->is_read = 0;
                    $message->save();

                    $current_chat->last_message_id = $message->id;
                    $current_chat->save();

                    $data['message'] = ChatMessage::where('id', $message->id)->with('sender', 'receiver')->first();
                    $data['chat'] = $current_chat;
                }
            } else {
                return $this->sendError('Something went wrong', null);
            }
        }
        return $this->sendSuccess('Message added successfully.', $data);
    }
    public function add_message(Request $request)
    {
        if ($request->type == 'text' && !$request->message) {
            return $this->sendError('Message required', null);
        }

        $chat = Chat::where('id', $request->chat_id)->with('sender', 'receiver')->first();
        if ($chat->sender_deleted == 1) {
            $chat->sender_deleted = 0;
            $chat->update();
        }
        if ($chat->receiver_deleted == 1) {
            $chat->receiver_deleted = 0;
            $chat->update();
        }
        if ($chat->sender_id == Auth::id()) {
            $sender_id = $chat->sender_id;
            $receiver_id = $chat->receiver_id;
        } else {
            $sender_id = $chat->receiver_id;
            $receiver_id = $chat->sender_id;
        }
        $message = new ChatMessage();
        $message->chat_id = $request->chat_id;
        $message->sender_id = $sender_id;
        $message->receiver_id = $receiver_id;
        if ($request->type == 'image') {
            if ($request->media) {
                $img = $request->media;
                $image_name = $img->getClientOriginalName() . '-' . time();
                $folder_to_save = '/uploads/messages/';
                $filePath = $folder_to_save . $image_name . '.' . $img->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/messages/');
                $img->move($destinationPath, $image_name . '.' . $img->getClientOriginalExtension());
                $message->file_path = $filePath;
                $message->message = $image_name;
                $type = 'image';
            } else {
                return $this->sendError('Image required', null);
            }
        }
        if ($request->type == 'multi_images') {
            if ($request->media) {
                $path_array = [];
                foreach ($request->media as $img) {
                    $image_name = $img->getClientOriginalName() . '-' . time();
                    $folder_to_save = '/uploads/messages/';
                    $filePath = $folder_to_save . $image_name . '.' . $img->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/messages/');
                    $img->move($destinationPath, $image_name . '.' . $img->getClientOriginalExtension());
                    array_push($path_array, $filePath);
                }
                $message->file_path = implode(', ', $path_array);
                $message->message = 'images';
                $type = 'multi_images';
            } else {
                return $this->sendError('Images required', null);
            }
        }
        if ($request->message) {
            $message->message = $request->message;
        }
        
        if (isset($type)) {
            $message->type = $type;
        } else if ($request->type) {
            $message->type = $request->type;
        }

        $message->is_read = 0;
        $message->save();

        $chat->last_message_id = $message->id;
        $chat->save();

        $data['message'] = ChatMessage::where('id', $message->id)->with('sender', 'receiver')->first();
        $data['chat'] = $chat;

        return $this->sendSuccess('Message added successfully.', $data);
    }
    public function get_chat(Request $request)
    {
        $per_page = isset($request->per_page) ? $request->per_page : 20;

        $user_id = Auth::id();
        $chat = Chat::where('id', $request->chat_id)->with('sender', 'receiver')->first();

        if ($chat) {
            ChatMessage::where('chat_id', $request->chat_id)->where('receiver_id', Auth::id())->update(['is_read' => 1]);
            $data['message'] = ChatMessage::with('sender', 'receiver')->where('chat_id', $chat->id)
                ->whereRaw("IF(`sender_id` = $user_id, `sender_deleted`, `receiver_deleted`)= 0")
                ->latest()->paginate($per_page);

            return $this->sendSuccess('Got message successfully.', $data);
        } else {
            return $this->sendError('Invalid chat id', null);
        }
    }
    public function seen_all_messages(Request $request)
    {
        ChatMessage::where('chat_id', $request->chat_id)->where('receiver_id', $request->receiver_id)->where('is_read', 0)
        ->update([
                'is_read' => 1
        ]);

        return $this->sendSuccess('Messages read successfully', null);
    }
    
    public function delete_message(Request $request)
    {
        $message = ChatMessage::where('id', $request->message_id)->first();

        if (!$message) {

            return $this->sendError('No message found!', null);
        }

        if (ChatMessage::where(['id' => $request->message_id, 'sender_id' => $request->deleted_by, 'sender_deleted' => 0])->first()) {

            ChatMessage::where(['id' => $request->message_id])->update(['sender_deleted' => 1]);
            return $this->sendSuccess('Message deleted successfully!', null);
        } elseif (ChatMessage::where(['id' => $request->message_id, 'receiver_id' => $request->deleted_by, 'receiver_deleted' => 0])->first()) {

            ChatMessage::where(['id' => $request->message_id])->update(['receiver_deleted' => 1]);
            return $this->sendSuccess('Message deleted successfully!', null);
        } else {
            return $this->sendError('You are not allowed to delete this message!', null);
        }
    }
    public function delete_chat(Request $request)
    {
        $chat = Chat::where('id', $request->chat_id)->first();

        if (!$chat) {
            return $this->sendError('No chat found!', null);
        }
        if (Chat::where(['id' => $request->chat_id, 'sender_id' => $request->deleted_by, 'sender_deleted' => 0])->first()) {

            $userChat = Chat::where('id', $request->chat_id)->first();
            $userChat->sender_deleted = 1;
            $userChat->update();

            $messages = ChatMessage::where('chat_id', $userChat->id)
                ->where(function ($q) use ($request) {
                    $q->where('sender_id', $request->deleted_by);
                    $q->orWhere('receiver_id', $request->deleted_by);
                })
                ->get();
            foreach ($messages as $each) {
                $each->sender_deleted = 1;
                $each->update();
            }
            return $this->sendSuccess('Chat deleted successfully!', null);
        } elseif (Chat::where(['id' => $request->chat_id, 'receiver_id' => $request->deleted_by, 'receiver_deleted' => 0])->first()) {

            $userChat = Chat::where('id', $request->chat_id)->first();
            $userChat->receiver_deleted = 1;
            $userChat->update();

            $messages = ChatMessage::where('chat_id', $userChat->id)
                ->where(function ($q) use ($request) {
                    $q->where('sender_id', $request->deleted_by);
                    $q->orWhere('receiver_id', $request->deleted_by);
                })
                ->get();
            foreach ($messages as $each) {
                $each->receiver_deleted = 1;
                $each->update();
            }

            return $this->sendSuccess('Chat deleted successfully!', null);
        } else {
            return $this->sendError('You are not allowed to delete this Chat!', null);
        }
    }
    public function chat_search(Request $request)
    {
        $search_query = $request->search_text;
        $ids = User::where('full_name', 'like', '%' . $search_query . '%')->distinct('id')->pluck('id');

        if (!$ids) {
            return $this->sendSuccess('No result found!', null);
        }

        $per_page = isset($request->per_page) ? $request->per_page : 20;

        $chats = Chat::with('sender', 'receiver', 'last_message')->where(function ($query) use ($ids) {
            $query->where('sender_id', Auth::id());
            $query->orWhere('receiver_id', Auth::id());
        })->where(function ($query) use ($ids) {
            $query->whereIn('sender_id', $ids);
            $query->orWhereIn('receiver_id', $ids);
        })->paginate($per_page);

        return $this->sendSuccess('Search Result!', $chats);
    }
    public function find_chat(Request $request)
    {
        $chat = Chat::where(function ($query) use ($request) {
            $query->where('sender_id', Auth::id());
            $query->orWhere('receiver_id', Auth::id());
        })->where(function ($query) use ($request) {
            $query->where('campaign_id', $request->campaign_id);
        })->first();

        if ($chat) {
            $user_id = Auth::id();
            ChatMessage::where('chat_id', $chat->id)->where('receiver_id', Auth::id())->update(['is_read' => 1]);
            $messages = ChatMessage::with('sender', 'receiver', 'counter_offer')->where('chat_id', $chat->id)
                ->whereRaw("IF(`sender_id` = $user_id, `sender_deleted`, `receiver_deleted`)= 0")
                ->orderBy('id', 'DESC')
                ->paginate(30);
            return $this->sendSuccess('All Messages', $messages);
        } else {
            return $this->sendSuccess('No Chat Found', '');
        }
    }
    public function get_current_chats(Request $request)
    {
        $search_query = isset($request->search_text) ? $request->search_text : "";
        $per_page = isset($request->per_page) ? $request->per_page : 20;
        $user_id = Auth::id();
        if (!empty($search_query)) {
            $ids = User::Where('full_name', 'like', '%' . $search_query . '%')->distinct('id')->pluck('id');

            if (!$ids) {
                return $this->sendSuccess('No result found!', null);
            }
            $per_page = isset($request->per_page) ? $request->per_page : 20;

            $chats = Chat::with('sender', 'receiver', 'last_message')->where(function ($query) use ($ids) {
                $query->where('sender_id', Auth::id());
                $query->orWhere('receiver_id', Auth::id());
            })->where(function ($query) use ($ids) {
                $query->whereIn('sender_id', $ids);
                $query->orWhereIn('receiver_id', $ids);
            })->paginate($per_page);

            return $this->sendSuccess('Search Result!', $chats);
        } else {
            if (!$request->type || $request->type == 'current') {
                $chats = Chat::with('sender', 'receiver', 'last_message')
                    ->withCount(['getMessages' => function ($query) use ($user_id) {
                        $query->where('receiver_id',$user_id)->where('is_read', 0);
                    }])
                    ->where(function ($query) use ($user_id) {
                        $query->where('sender_id', $user_id);
                        $query->orWhere('receiver_id', $user_id);
                    })
                    ->whereRaw("IF(`sender_id` = $user_id, `sender_deleted`, `receiver_deleted`)= 0")
                    ->orderBy('updated_at', 'desc')
                    ->paginate($per_page);
                return $this->sendSuccess('Got chat successfully.', $chats);
            } else if ($request->type == 'past') {
                $chats = Chat::with('sender', 'receiver', 'last_message')
                    ->withCount(['messages' => function ($query) {
                        $query->where('is_read', 0);
                    }])
                    ->where(function ($query) use ($user_id) {
                        $query->where('sender_id', $user_id);
                        $query->orWhere('receiver_id', $user_id);
                    })
                    ->whereRaw("IF(`sender_id` = $user_id, `sender_deleted`, `receiver_deleted`)= 0")
                    ->orderBy('updated_at', 'desc')
                    ->paginate($per_page);
                return $this->sendSuccess('Got chat successfully.', $chats);
            } else {
                return $this->sendError("Invalid type only allowed 'current' or 'past' ", null);
            }
        }
    }
    public function get_unread_count(Request $request)
    {
        $chat = Chat::where(function ($query) use ($request) {
            $query->where('sender_id', Auth::id());
            $query->orWhere('receiver_id', Auth::id());
        })->where(function ($query) use ($request) {
            $query->where('campaign_id', $request->campaign_id);
        })->first();

        if ($chat) {
            $unread = ChatMessage::where('chat_id', $chat->id)->where('receiver_id', Auth::id())->where('is_read', 0)->count();
            return $this->sendSuccess('Got chat successfully.', $unread);
        }

        return $this->sendError('Chat not found', null);
    }
    public function seen_message(Request $request)
    {
        $message = ChatMessage::find($request->message_id);

        if ($message) {
            $message->is_read = 1;
            $message->update();

            return $this->sendSuccess('Message Seen Updated.', $message);
        }

        return $this->sendError('Invalid Message id', null);
    }
    public function initiate_chat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try {
            $chat_exist = Chat::where(function ($query) use ($request) {
                $query->where('sender_id', Auth::id());
                $query->orWhere('receiver_id', Auth::id());
            })->where(function ($query) use ($request) {
                $query->where('sender_id', $request->receiver_id);
                $query->orWhere('receiver_id', $request->receiver_id);
            })->first();

            if (!$chat_exist) {
                DB::beginTransaction();
                $chat = new Chat();
                $chat->sender_id = Auth::id();
                $chat->receiver_id = $request->receiver_id;
                $chat->save();

                $this->sendNotification(Auth::id(),$request->receiver_id,'chat', 'Hi, "'.Auth::user()->full_name.'" has requested to chat with you. Go to Chats to accept or reject request.');
                
                DB::commit();
                $data['chat'] = Chat::where('id', $chat->id)->first();
                return $this->sendSuccess('Chat Created.', $data);
            }

            $data['chat'] = Chat::where('id', $chat_exist->id)->first();
            return $this->sendSuccess('Already Existed.', $data);
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
    }
}
