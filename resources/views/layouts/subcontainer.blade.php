

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<div class="container">

  <div class="container-fluid">
    @foreach ($data as $det )

      <div class="row" style="margin-top:-17px; background-color:#89CFF0;">

            <div class="col-sm h-50">
                <h5 style="color: white; padding:10px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                    <b> {{ $det->title }} </b> </h5>
            </div>
      </div>

        <div class="row bg-light" style="margin-top:10px;">

             <div class="col-sm-1 border">
                <p style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" >Type </p>
             </div>

             <div class="col-sm-2 border">
                <small style="margin-right:15px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> {{ $det->category }} </small>
             </div>


             <div class="col-sm-1 border">
                <p style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Posted </p>
             </div>

            <div class="col-sm-2 border">
                <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> {{ $det->created_at }} </small>
            </div>

             <div class="col-sm-1"></div>

            <div class="col-sm-1 border">
                <p style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Due </p>
            </div>

            <div class="col-sm-2 border">
              <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> {{ $det->duedate }} </small>
            </div>

       </div>
     @endforeach
 </div>

 <div class="container-fluid">



    <div class="row" style="margin-top: 10px;">
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






   <div class="row">

     <div class="col-sm-9" style="margin-top:5px;">
        <div class="row" style="margin-top:10px;">
            <div class="col border" style="margin-left:5px; padding:10px;" >
                <span style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"> <b>Topic</b> </span> <br>
                <span style="padding-top:3px;margin-bottom:10px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" > {{$det->subtopic}} </span>
            </div>
        </div>

    <div class="row " style="margin-top:30px; ">
        <div class="col-sm border" style="margin-left:5px;" >
             <span style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" > <b> Instructions </b> </span>
                <ul class="list-inline">
             <li> <span style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> Sources: 3 sources required </span> </li>
             <li> <span style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> Citation Style: APA 7th edition </span> </li>
             <li> <span style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> 300 words per page – up to 50 more words per page </span> </li>
             <li> <span style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> unique, and free of plagiarism. All assignments go through plagiarism-detection </span> </li>
            </ul>
        </div>
    </div>

</div>

    <div class="col-sm-2 bg-light border h-auto" style="margin-top:15px; margin-left:30px;">

      <div class="row">
        <div class="prc">
        <span  style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> Price:</span>
            @foreach ($data as $det )
        <small style="margin-left: 13px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> {{ $det->price}} KES  </small>
        </div>

       <form action="{{ url('bid') }}" method="post">
          @csrf
        <input type="hidden" value="{{ $det->id }}" name="topid">
           @endforeach

        <div class="pay" style="margin-top:10px;">
            <span style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Payment Mode</span>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pay_mode" value="mpesa"   style="margin-left:4px ;">
                <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> mpesa  </small>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="pay_mode" value="airtel" style="margin-left:4px; ">
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">airtel </small>
            </div>
        </div>

     <div class="form-check" style="margin-top: 15px;">
        <input class="form-check-input" type="checkbox" value="" id="">
        <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Confirm </small>
     </div>

     <div class="d-grid gap-2">
        <button type="submit" name="submit"  class="btn btn-primary btn-sm" style="margin: 10px;">Bid job</button>
     </div>

     </form>
 </div>

</div>

</div>

<!-- chat and reply section start --->
    <div class="row">
        <div class="col-sm-4" style="margin-top:20px;">

            <div class="row" >
                <div class="col-sm" style="margin-left:3px; ">
                <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> <b> Reply to this post </b> </small>

                    <form method="post" action="{{ url('addcomment') }}">
                        @csrf

                    <textarea name="comment" id="reply" cols="21" rows="6"></textarea> <br>
                            @foreach ($data as $det )
                    <input type="hidden" name="post_id"  value={{ $det->id }} >
                            @endforeach
                    <button class="btn btn-success btn-sm" type="submit"style="float:right;">send</button>
                    </form>
                </div>
            </div>

        </div>


    <div class="col-sm-8 h-auto" style="margin-top: 20px;">

        <div class="row" >
            <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-left:15px;"> <b>Chats  </b></small>
            <div class="col-sm-12 border" style="margin-left:30px;">
                    @foreach ($comments as $comm )

                <div style="padding-left:15%;">
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> <b> {{ $comm->name }} </b> </small> <br>
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">  {{ $comm->comment }}  </small> <br>
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                                <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comm->id }}"
                                    style="text-decoration:none ;">Reply</a> </small>

                             @foreach ( $replies as $rep )
                        @if($rep->comment_id==$comm->id)
                    <div  style="padding-left: 30%; padding-bottom: 10px;">
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> <b> {{ $rep->name }}</b> </small> <br>
                    <small style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> {{ $rep->reply }}</small>
                    </div>
                    @endif   @endforeach </div>
                         @endforeach

                 <div class="replydiv" style="display:none;">
                   <form method="post" action="{{ url('addreply') }}" >
                      @csrf
                      <input type="hidden" name="commentid" id="comment_id">
                                      @foreach ($data as $det )
                      <input type="hidden" name="post_id"  value={{ $det->id }} >
                              @endforeach
                      <textarea name="reply" id="reply" cols="20" rows="3" placeholder="write something here"></textarea> <br>
                      <button type="submit" class="btn btn-primary"> reply </button>
                      <a href="javascript::void(0);" onclick="close_reply(this)" style="text-decoration:none ;">close</a>
                      </form>
                  </div>

            </div>





              </div>

        </div>

 </div>



            <script type="text/javascript">
                function reply(caller) {
                    document.getElementById('comment_id').value=$(caller).attr('data-Commentid')
                    $('.replydiv').insertAfter($(caller));
                    $('.replydiv').show();
                }

                function close_reply(caller) {
                    $('.replydiv').hide();

                }
            </script>

    <!-- chat and reply section start --->









</div>
