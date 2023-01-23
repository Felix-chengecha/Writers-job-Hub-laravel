<?php

namespace App\Http\Controllers;

use App\Models\Bids;
use App\Models\comment;
use App\Models\reply;
use App\Models\Topics;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{

    public function add_project_view(){
        return view('admin.add_project');
      }


    public function redirect(){
         $usertype=Auth::user()->is_admin;
             if($usertype=='1'){
                $proj='project';
                return $this->index();
                }
            else{
              $dat = Topics::paginate(4);
              return view('home', compact('dat'));
            }
     }





    //fetch dashboard data
    public function index(){
        $writers=User::count();
        $topics=Topics::count();
        $bids=Bids::count();
        $suspended=User::where('is_banned','1')->count();
        $completed=Topics::where('status','completed')->count();
        $today=Bids::whereDate('created_at', Carbon::today())->count();


        $data=Topics::select('id','created_at')->get()->groupBy(function($data){
               return Carbon::parse($data->created_at)->format('M');  });
            $months=[];
            $monthcount=[];
              foreach($data as $month=>$values){
                  $months[]=$month;
                  $monthcount[]=count($values);
                }



               return view('admin.dashboard', [
                                'writ'=>$writers,
                                'topic'=>$topics,
                                'susp'=>$suspended,
                                'comp'=>$completed,
                                'bids' =>$bids,
                                'today'=>$today,
                                'head'=>'Monthly projects upload',
                                'months'=>$months,
                                'monthcount'=>$monthcount
                                ]);
       }




       public function index1(){

        $writers= User::count();
        $topics=Topics::count();
        $bids=Bids::count();
        $suspended=User::where('is_banned','1')->count();
        $completed=Topics::where('status','completed')->count();
        $today=Bids::whereDate('created_at', Carbon::today())->count();

        // line chart data
        $data=User::select('id','created_at')->get()->groupBy(function($data){
               return Carbon::parse($data->created_at)->format('M');
            });
             $months=[];
             $monthcount=[];
             foreach($data as $month=>$values){
                $months[]=$month;
                $monthcount[]=count($values);
                }


               return view('admin.dashboard', [
                                            'writ'=>$writers,
                                            'topic'=>$topics,
                                            'susp'=>$suspended,
                                            'comp'=>$completed,
                                            'bids' =>$bids,
                                            'today'=>$today,
                                            'head'=>'Monthly writers registration',
                                            'months'=>$months,
                                            'monthcount'=>$monthcount
                                            ]);

    }



    public function index2(){
        $writers=User::count();
        $topics=Topics::count();
        $bids=Bids::count();
        $suspended=User::where('is_banned','1')->count();
        $completed=Topics::where('status','completed')->count();
        $today=Bids::whereDate('created_at', Carbon::today())->count();
        // line chart data
        $data=Bids::select('id','created_at')->get()->groupBy(function($data){
               return Carbon::parse($data->created_at)->format('M');
            });
             $months=[];
             $monthcount=[];
             foreach($data as $month=>$values){
                $months[]=$month;
                $monthcount[]=count($values);
                }

               return view('admin.dashboard', [
                                            'writ'=>$writers,
                                            'topic'=>$topics,
                                            'susp'=>$suspended,
                                            'comp'=>$completed,
                                            'bids' =>$bids,
                                            'today'=>$today,
                                            'head'=>'Monthly projects bids',
                                            'months'=>$months,
                                            'monthcount'=>$monthcount
                                            ]);
       }


       public function index3(){
        $writers=User::count();
        $topics=Topics::count();
        $bids=Bids::count();
        $suspended=User::where('is_banned','1')->count();
        $completed=Topics::where('status','completed')->count();
        $today=Bids::whereDate('created_at', Carbon::today())->count();
        // line chart data
        $data=Bids::select('id','created_at')
              ->where('status','completed')
              ->get()->groupBy(function($data){
               return Carbon::parse($data->created_at)->format('M');
            });
             $months=[];
             $monthcount=[];
             foreach($data as $month=>$values){
                $months[]=$month;
                $monthcount[]=count($values);
                }

               return view('admin.dashboard', [
                                            'writ'=>$writers,
                                            'topic'=>$topics,
                                            'susp'=>$suspended,
                                            'comp'=>$completed,
                                            'bids' =>$bids,
                                            'today'=>$today,
                                            'head'=>'Monthly projects completed',
                                            'months'=>$months,
                                            'monthcount'=>$monthcount
                                            ]);
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

    public function reply1(Request $request) {
           $rep = new reply;
        $rep->name       = Auth::user()->name;
        $rep->user_id    = Auth::user()->id;
        $rep->post_id    = $request->post_id;
        $rep->comment_id = $request->commentid;
        $rep->reply     = $request->reply1;
        $rep->save();

     return back();

       }

    public function reply2(Request $request){

            $rep_id     =$request->reply_id;
            $name       = Auth::user()->name;
            $user_id    = Auth::user()->id;
            $post_id    = $request->post_id;
            $comment_id = $request->comment_id;
            $reply2     = $request->reply2;

        //     $rep = new reply;
        // $rep->rep_id     =$request->reply_id;
        // $rep->name       = Auth::user()->name;
        // $rep->user_id    = Auth::user()->id;
        // $rep->post_id    = $request->post_id;
        // $rep->comment_id = $request->comment_id;
        // $rep->reply2     = $request->reply2;
        // $rep->save();


        return [ 'rep1_id' => $rep_id, 'name'=>$name, 'user_id'=>$user_id, 'post_id'=>$post_id, 'comment_id'=>$comment_id,  'reply' => $reply2 ];
    }




    public function writers(){
        $user = DB::table('users')
             ->leftJoin('bids', 'bids.user_id', '=', 'users.id' )
             ->select( 'users.id','users.name','users.email','users.phone', 'users.rank', 'users.created_at',
               DB::raw('count(users.id) as count') )
             ->groupBy('users.id')
             ->get();

       return view('admin.writers',compact('user'));
    }


    public function projects(){
        $proj = DB::table('topics')
            ->leftJoin('bids', 'bids.topic_id', '=', 'topics.id' )
            ->select( 'topics.id','topics.title','topics.category','topics.duedate','topics.price', 'topics.status','topics.created_at',
              DB::raw('count(bids.topic_id) as bids'))
            ->groupBy('topics.id')
            ->get();

        return view('admin.projects',compact('proj'));
    }

    public function add_project(Request $request){
        $check = Topics::where('title', '=', request()->get('title'))
                ->where('subtopic', '=', request()->get('subtopic'))
                ->exists();

            if ($check == true) {
                return back()->with('warning', 'you have already added this project');
                }

            else {
            $topic=new Topics;

            $topic->title=$request->title;
            $topic->category=$request->category;
            $topic->duedate=$request->duedate;
            $topic->price=$request->price;
            $topic->subtopic=$request->subtopic;
            $topic->status=$request->status;
            $topic->save();

        return back()->with('message', 'project added successfully');
            }
    }


    public function writers_details(Request $request){
        $do=$request->id;

        $det=User::where('id', $do)->get();
        $bids=Bids::where('user_id', $do)->count();
        $assigned=Bids::where('user_id', $do)
                 ->where('status', 'assigned')
                 ->count();

        $completed = DB::table('bids')
                        ->leftJoin('topics', 'topics.id', '=', 'bids.topic_id' )
                        ->select('topics.id' )
                        ->where('bids.user_id', $do)
                        ->where('topics.status', 'completed')
                        ->count();

         $proj = DB::table('bids')
                    ->leftJoin('topics', 'topics.id', '=', 'bids.topic_id' )
                    ->select('topics.id', 'topics.category','topics.title', 'topics.price', 'topics.status', 'topics.duedate', 'bids.created_at' )
                    ->where('bids.user_id', $do)
                    ->where('bids.status', 'assigned')->get();

        return view('admin.writers-details',compact('proj','det', 'bids','assigned','completed'));
    }


    public function project_details(Request $request){
            $do=$request->id;
            $details=Topics::where('id',$do)->get();
            $rep_count=reply::where('post_id',$do)->count();
            $comment_count=comment::where('post_id',$do)->count();
            $msg_count=$rep_count+$comment_count;

            $replies = DB::table('replies')
                           ->leftJoin('comments','comments.id', 'replies.comment_id')
                           ->select('replies.id', 'replies.comment_id', 'replies.name', 'replies.reply', 'comments.name as commentor')
                           ->where('replies.post_id',$do)
                           ->get();

            $comments = comment::where('post_id', $do)->orderby('id', 'desc')->get();


            $project = DB::table('bids')
                            ->leftJoin('users','users.id', '=', 'bids.user_id')
                            ->select( 'users.name', 'users.phone', 'users.email', 'bids.pay_mode', 'bids.created_at')
                            ->where('bids.topic_id', $do)
                           ->get();

        return view('admin.project-details',compact('details', 'project','msg_count','comments', 'replies'));
    }





    }


