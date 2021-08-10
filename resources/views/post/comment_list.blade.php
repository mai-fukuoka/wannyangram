@foreach($post->comments as $comment)
<div class="mb-2">
    @if($comment->user->id==Auth::user()->id)

        <a class="delete" id="#" href="/comments/{{$comment->id}}" method="get">
                <div class="delete-comment">
                </div>
          	  </a>
    @endif
    <a class="no-text-decoration" href="/users/{{$comment->user->id}}">{{$comment->user->name}}</a>
    <p id="comment">{{$comment->comment}}</p>
</div>
@endforeach