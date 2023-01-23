@extends('admin.mlinks.app')

@section('mcontent')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="card mb-4">
    <div class="card-header" >
        <span class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); margin-left:40%;"> Project details </span>
    </div>

  <div class="card-body">


    <div class="container" >
        <div class="row border" style="margin-bottom:8px; " >

            @foreach ($details as $dt )

            <div class="col-1 border">
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-weight:bold; font-family: Arial, Helvetica, sans-serif;">  Title  <small>:</small> </small> <br> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-weight:bold; font-family: Arial, Helvetica, sans-serif;">  Topic  <small>:</small> </small> <br>
            </div>

            <div class="col-7 border">
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  {{ $dt->title }}  </small> <br> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-family: Arial, Helvetica, sans-serif;">  {{ $dt->subtopic }}  </small> <br>
            </div>


          <div class="col-4">
            <div class="row">
              <div class="col-4 " style="margin-bottom:10px; margin-left:60px;">
                <small> <i class="fa fa-code-branch"></i> </small>    <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-size:14px; font-family: Arial, Helvetica, sans-serif;">  Category  <small>:</small> </small> <br>
                <small> <i class="fa fa-usd"></i> </small>   <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-size:14px; font-family: Arial, Helvetica, sans-serif;">           Price :</small> <br>
                <small> <i class="fa fa-question"></i> </small>   <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-size:14px; font-family: Arial, Helvetica, sans-serif;">      Status  :</small> <br>
                <small> <i class="fa fa-upload"></i> </small>   <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-size:14px; font-family: Arial, Helvetica, sans-serif;">        Upload  :</small> <br>
                  <small> <i class="fa fa-clock"></i> </small>   <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805);margin-left:3px; font-size:14px; font-family: Arial, Helvetica, sans-serif;">       Due-date :</small> <br>
              </div>

              <div class="col-6 " style="margin-left:-7px; margin-bottom:10px; ">
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif; ">{{ $dt->category }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->price }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->status }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->created_at }}</small> <br>
                <small class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); font-size:13px;  font-weight:initial; font-family: Arial, Helvetica, sans-serif;">{{ $dt->duedate }}</small> <br>
              </div>

            </div>
        </div>
    @endforeach
</div>


  <!-- Modal start -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Chats </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

    <div class="col-12 border" style="margin-left:30px;">
        @foreach ($comments as $comm )
            <div style="padding-left:5%;">
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> <b> {{ $comm->name }} </b> </small> <br>
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">  {{ $comm->comment }}  </small> <br>
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comm->id }}"   style="text-decoration:none ;">reply</a> </small>

                 @foreach ( $replies as $rep )
                    @if($rep->comment_id==$comm->id)
                  <div  style="padding-left: 20%; padding-bottom: 10px;">
                    <span style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-weight:bold;">  {{ $rep->name }} </span>  <br>
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-weight:bold;">*{{$rep->commentor }}</small>
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-left:5px;"> {{ $rep->reply }}</small> <br>
                    <input type="text" name="cid" id="cid" value="{{ $comm->id }}">
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> <a href="javascript::void(0);" onclick="reply2(this, {{ $comm->id }} )" data-Replyid="{{ $rep->id }}" data-Comentid="{{ $comm->id }}" style="text-decoration:none ;">  reply </a> </small>
                  </div>
                     @endif
               @endforeach
            </div>
        @endforeach

                 <!--reply for the main post start -->
         <div class="replydiv" style="display:none;">
               <form method="post" action="{{ url('addreply') }}" >
                           @csrf
                  <input type="hidden" name="commentid" id="comment_id" >
                         @foreach ($details as $det )
                  <input type="hidden" name="post_id"  value={{ $det->id }} >
                          @endforeach
                  <textarea name="reply1" id="reply1" cols="30" rows="3" placeholder="write something here"></textarea> <br>
                  <button type="submit" class="btn btn-primary"> reply </button>
                  <a href="javascript::void(0);" onclick="close_reply(this)" style="text-decoration:none ;">close</a>
                </form>
          </div>
                 <!--reply for the main post end -->


                 <!--reply for any reply start -->
         <div class="replydiv2" style="display:none;">
                <form method="post" action="{{ url('reply2') }}" >
                    @csrf

                <input type="text" name="comment_id" id="comment_id" >

                       @foreach ($details as $det )
                <input type="text" name="post_id"  value={{ $det->id }} >
                      @endforeach
                <input type="text" name="reply_id" id="reply_id" >

               <textarea name="reply2" id="reply2" cols="30" rows="3" placeholder="write something here"></textarea> <br>
               <button type="submit" class="btn btn-primary"> reply </button>
               <a href="javascript::void(0);" onclick="close_reply(this)" style="text-decoration:none ;">close</a>
            </form>
         </div>
                 <!--reply for any reply end -->


    </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal end -->





          <div class="row" style="margin-top: 5px;">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
            </div>
            @endif
            @if(session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session()->get('warning')}}
            </div>
            @endif
        </div>

    <div class="row" style="margin-top:8px; ">

           <div class="card-header" >
            <span class="mt-3 mb-3" style="color: rgba(0, 0, 0, 0.805); margin-left:40%;">Project Bidders </span>
             <a href="#" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <small class="mt-3 mb-3" style="color: blue; margin-left:40%;">messages</small> <small>{{ $msg_count }}</small></a>
        </div>


    <div class="col" style="margin-top:15px;">
            <table id="datatablesSimple" >
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Pay Mode </th>
                    <th>Bid-Date</th>
                    <th>Chat</th>
                    <th>Assign</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Pay Mode </th>
                    <th>Bid-Date</th>
                    <th>Chat</th>
                    <th>Assign</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($project as $proj)
                        <tr>
                    <td>{{ $proj->name }}</td>
                    <td>{{ $proj->phone }}</td>
                    <td>{{ $proj->email }} Kes</td>
                    <td>{{ $proj->pay_mode }}</td>
                    <td>{{ $proj->created_at }}</td>
                    <td><a href="#" class="btn btn-success btn-sm" >chat</a> <small>0</small> </td>
                    <td> <a href="#" class="btn btn-success btn-sm" >assign</a></td>
                    </tr>
                    @endforeach
                 </tbody>
              </table>
           </div>
        </div>





    </div>


    <script type="text/javascript">

        function reply(caller) {
            document.getElementById('comment_id').value = $(caller).attr('data-Commentid')
            $('.replydiv').insertAfter($(caller));
            $('.replydiv').show();
        }


        function reply2(caller,id) {
            document.getElementById('reply_id').value =   $(caller).attr('data-Replyid')
            document.getElementById('comment_id').value =   id;

            console.log(id);

            // Comentid

            $('.replydiv2').insertAfter($(caller));
            $('.replydiv2').show();
        }


        function close_reply(caller) {
            $('.replydiv').hide();
            $('.replydiv2').hide();

        }


    </script>









 </div>
</div>

@endsection
