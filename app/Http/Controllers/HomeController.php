<?php

namespace App\Http\Controllers;

use App\Models\Bids;
use App\Models\reply;
use App\Models\Topics;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dat = Topics::paginate(4);

        return view('home', compact('dat'));

    }

    public function search(Request $request)
    {
        $search_text = $request->search;

        $dat = Topics::where('title', 'LIKE', '%' . $search_text . '%')->paginate(4);

        return view('home', compact('dat'));
    }

    public function nav($id)
    {
        $data = Topics::where('id', $id)->get();
        $comments = comment::where('post_id', $id)->orderby('id', 'desc')->get();
        $replies = reply::where('post_id', $id)->get();

        return view('details', compact('data', 'comments', 'replies'));
    }

    public function add_comment(Request $request){
        $comment = new comment;
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();

        return back();
    }

    public function add_reply(Request $request) {
        $rep = new reply;
        $rep->name = Auth::user()->name;
        $rep->user_id = Auth::user()->id;
        $rep->post_id = $request->post_id;
        $rep->comment_id = $request->commentid;
        $rep->reply = $request->reply;
        $rep->save();

        return back();
    }


    public function bid(Request $request){
        $check = Bids::where('topic_id', '=', request()->get('topid'))
            ->where('user_id', '=', Auth::user()->id)->exists();

        if ($check == true) {
            return back()->with('warning', 'you have already placed a bid for this job');
        } else {
            $bids = new Bids;
            $bids->name = Auth::user()->name;
            $bids->user_id = Auth::user()->id;
            $bids->topic_id = $request->topid;
            $bids->pay_mode = $request->pay_mode;
            $bids->save();
            return back()->with('message', 'bid placed successfully please wait for confirmation');
        }
    }


    public function categ($di) {
        if ($di == 'article') {
            $dat = Topics::where('category', 'article')->paginate(4);
        }
        if ($di == 'academic') {
            $dat = Topics::where('category', 'academic')->paginate(4);
        }
        if ($di == 'content') {
            $dat = Topics::where('category', 'content')->paginate(4);
        }

        return view('home', compact('dat'));
    }


    public function myjobs()   {
        $dat = DB::table('bids')
            ->leftJoin( 'topics', 'topics.id', '=', 'bids.topic_id'
            )
            ->select(
                'topics.id',
                'topics.title',
                'topics.category',
                'topics.subtopic',
                'topics.duedate',
                'topics.price',
                'topics.status',
                'bids.created_at',
            )
            ->where('user_id', Auth::user()->id)
            ->where('bids.status', 'assigned')
            ->paginate(4);

        return view('home', compact('dat'));
    }
}
