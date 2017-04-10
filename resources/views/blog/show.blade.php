 @extends('layouts.app')
@section('content')
 <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">
                    @if($post->image_url != null)
					<div class="post-item-image">
                        <a href="#">
                            <img src="{{ $post->image_url }}" alt="">
                        </a>
                    </div>
					@endif

                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{$post->title}}</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> {{$post->author->name}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{$post->date}}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>

                            <p>{{$post->body}}</p>
                        </div>
                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img alt="Author 1" src="{{asset('img/author.jpg')}}" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">{{$post->author->name}}</a></h4>
                        <div class="post-author-count">
                          <a href="#">
                              <i class="fa fa-clone"></i>
                              90 posts
                          </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad aut sunt cum, mollitia excepturi neque sint magnam minus aliquam, voluptatem, labore quis praesentium eum quae dolorum temporibus consequuntur! Non.</p>
                      </div>
                    </div>
                </article>

                <article class="post-comments">
                    <h3><i class="fa fa-comments"></i> 5 Comments</h3>
					
					<!-- INICIO COMENTARIOS -->
                    @include('blog.comments')
					<!-- FIM DOS COMENTARIOS -->
					
					
                    <div class="comment-footer padding-10">
                        <h3>Leave a comment</h3>
                        <form>
                            <div class="form-group required">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group required">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" name="website" id="website" class="form-control">
                            </div>
                            <div class="form-group required">
                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment" rows="6" class="form-control"></textarea>
                            </div>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
                                </div>
                                <div class="pull-right">
                                    <p class="text-muted">
                                        <span class="required">*</span>
                                        <em>Indicates required fields</em>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>

                </article>
            </div>
			<!-- THE SIDE BAR -->
			@include('sidebar')
                
            </div>
        </div>
		@endsection