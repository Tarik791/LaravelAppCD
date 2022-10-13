@include('home.header')

@include('home.product_view')


<!-- Comment and reply system starts here -->

<div style="text-align: center;">

<div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

    </div>
    <h1 style="font-size: 30px; text-align:center; padding-top: 20px; padding-bottom: 20px;">Comments</h1>

    <form action="{{ url('add_comment') }}" method="post">
    @csrf
            <textarea style="height: 150px; width:600px;" placeholder="Comment Something here" name="comment"></textarea>

            <br>

        <input type="submit" class="btn btn-primary" value="Comment">
    </form>

</div>

<div style="padding-left: 20%;">

    <h1 style="font-size: 20px; padding-bottom: 20px;">All Comments</h1>

    @foreach($comment as $comment)

    <div>
        <b>{{$comment->name}}</b>
        <p>{{ $comment->comment }}</p>

        <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
    </div>

    @foreach($reply as $rep)

        @if($rep->comment_id == $comment->id)
    <div style="padding-left: 3%; padding-bottom: 10px; padding-bottom: 10px;">
        <b>{{ $rep->name }}</b>
        <p>{{ $rep->reply }}</p>

    </div>
        @endif
    @endforeach
    
    @endforeach


    <!---- Reply Textbox --->
    <div style="display: none;"  class="replyDiv">

    <form action="{{ url('add_reply') }}" method="post">
    @csrf

        <input type="text" id="commentId" name="commentId" hidden="">
        <textarea style="height: 100px; width: 500px;" name="reply" placeholder="write something here"></textarea>
        <br>

        <button type="submit" class="btn btn-warning">Reply</button>

        <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>
    </form>
</div>
<br>
</div>






@include('home.subscribe')


@include('home.client')

@include('home.footer')
