<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
use App\Mail\SendTicketAdminReply;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConversionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$ticket_id)
    {
        $user = \Auth::user();
        if(!$user || $user->can('reply-tickets')) {
            $ticket = Ticket::find($ticket_id);
            if($ticket) {
                $validation = ['reply_description' => ['required']];
                if ($request->hasfile('reply_attachments')) {
                    $validation['reply_attachments.*'] = 'mimes:zip,rar,jpeg,jpg,png,gif,svg,pdf,txt,doc,docx,application/octet-stream,audio/mpeg,mpga,mp3,wav|max:204800';
                }
                $this->validate($request, $validation);

                $post = [];
                $post['sender'] = ($user)?$user->id:'user';
                $post['ticket_id'] = $ticket->id;
                $post['description'] = $request->reply_description;
                $data = [];
                if ($request->hasfile('reply_attachments')) {
                    foreach ($request->file('reply_attachments') as $file) {
                        $name = $file->getClientOriginalName();
                        $file->storeAs('/tickets/' . $ticket->ticket_id, $name);
                        $data[] = $name;
                    }
                }
                $post['attachments'] = json_encode($data);
                $conversion = Conversion::create($post);

                // Send Email to User
                try {
                    Mail::to($ticket->email)->send(new SendTicketAdminReply($ticket,$conversion));
                }catch (\Exception $e){
                    $error_msg = "E-Mail has been not sent due to SMTP configuration ";
                }
                return redirect()->back()->with('success', __('Reply added successfully').((isset($error_msg))?'<br> <span class="text-danger">'.$error_msg.'</span>':''));
            }else{
                return view('403');
            }
        }else{
            return view('403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function show(Conversion $conversion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversion $conversion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversion $conversion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversion $conversion)
    {
        //
    }
}
