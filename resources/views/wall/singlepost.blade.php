<div class="card single-post">
    <h5 class="card-header"><i class="fas fa-user"></i> {{ $post->getPostAuthor() }}</h5>
    <div class="card-body">
      <!--<h5 class="card-title">Special title treatment</h5>-->
      <p class="card-text">{{ $post->getPostContent() }}</p>
      <hr class="post-like-hr">
    </div>
    @if ($post->isLiked())
        <button id="postLikeButton" data-csrf="{{ csrf_token() }}" value="{{ $post->getPostID() }}" class="btn btn-info postLikeButton"><i class="far fa-thumbs-up"></i> Lubisz to | {{ $post->getPostLikes() }}</button>
    @else
        <button id="postLikeButton" data-csrf="{{ csrf_token() }}" value="{{ $post->getPostID() }}" class="btn btn-outline-info postLikeButton"><i class="far fa-thumbs-up"></i> Polub | {{ $post->getPostLikes() }}</button>
    @endif


    <div class="card-footer">
        <p class="h7">Komentarze</p>
    </div>
  </div>
