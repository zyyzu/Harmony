<div class="card text-center">
    <div class="card-header">
      Utwórz post
    </div>
    <div class="card-body">
        <form action="{{ route('post.create') }}" method="POST">
            {{ csrf_field() }}
            <textarea class="form-control @error('email') is-invalid @enderror" id="post_area" name="post_content" rows="3" placeholder="Wpisz coś..."></textarea>
            <button id="post_submit" name="post_submit" type="submit" style="margin-top: 15px" class="btn btn-primary" value="1">Utwórz post</button>
            @error('post_submit')
                <span class="invalid-feedback" role="alert">
                    <strong>Coś poszło nie tak podczas tworzenia wpisu</strong>
                </span>
            @enderror
        </form>
    </div>
</div>
