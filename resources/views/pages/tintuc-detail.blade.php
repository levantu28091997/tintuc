@extends('layout.index')

@section('content')
<section class="detail deatil-page">
    <div class="detail-wrapper">
      <div class="container">
        <div class="detail-content">
          <div class="blogn-post-inner-right">
            <!-- Header Post -->
            <div class="blogn-post-content">
              <div class="blogn-post-thumb">
                <img src="upload/tintuc/{{$tin->image}}" alt="{{$tin->title_unsigned}}">
              </div>
              <h1 class="blogn-post-title">{{$tin->title}}</h1>
              <div class="blogn-post-meta blogn-post-meta-pd">
                <div class="blogn-post-author blogn-post-meta-child">
                  <div class="info-author d-flex info-author-blogn-post">
                    <div class="author-avatar">
                      <a href=""><img src="images/avatar.jpg" alt="Author"></a>
                    </div>
                    <h2 class="author-name d-flex align-items-center">By Admin</h2>
                  </div>
                </div>
                <div class="blogn-post-date blogn-post-meta-child">
                  <i class="blogn-post-icon lnr lnr-calendar-full"> {{ date('d-m-Y', strtotime($tin->updated_at)) }}</i>
                </div>
                <div class="blogn-post-comment blogn-post-meta-child">
                  <i class="blog-icon lnr lnr-bubble"> {{count($tin->comment)}} Comment</i>
                </div>
              </div>
            </div>
            <!-- Content -->
            <div class="blog-info">
              {!!$tin->content!!}
            </div>
            <!-- TAG -->
            <div class="blogn-post-tag">
              <div class="row">
                <div class="col-lg-7 col-md-12">
                  <div class="tag">
                    <h2 class="tag-title">Tag</h2>
                    <ul class="list-tag">
                      <li class="tag-item"><a href="" class="tag-item-link">Cactus</a></li>
                      <li class="tag-item"><a href="" class="tag-item-link">Flower</a></li>
                      <li class="tag-item"><a href="" class="tag-item-link">Indoor</a></li>
                      <li class="tag-item"><a href="" class="tag-item-link">Plant</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-5 col-md-12">
                  <div class="follow">
                    <div class="social-inner-st2">
                      <span class="social-text">Follow us:</span>
                      <div class="socials-st2">
                        <a href="" class="icon-social-st2"><i class="ti-facebook"></i></a>
                        <a href="" class="icon-social-st2"><i class="ti-twitter-alt"></i></a>
                        <a href="" class="icon-social-st2"><i class="ti-pinterest"></i></a>
                        <a href="" class="icon-social-st2"><i class="ti-youtube"></i></a>
                        <a href="" class="icon-social-st2"><i class="ti-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Comment -->
            <div class="blogn-post-comments">
              <h2 class="blogn-post-title">Comment ({{count($tin->comment)}})</h2>
              <ul class="blogn-post-comment-list">
                @if (count($tin->comment) > 0)
                @foreach ($tin->comment as $item)
                <li class="blogn-post-comment-item">
                  <div class="comment">
                    <div class="blogn-post-meta">
                      <div class="blogn-post-author blogn-post-meta-child">
                        <div class="info-author d-flex info-author-blogn-post">
                          <div class="author-avatar">
                            <img src="images/avatar.jpg" alt="Author">
                          </div>
                          <h2 class="author-name d-flex align-items-center">By {{$item->user->name}}</h2>
                        </div>
                      </div>
                      <div class="blogn-post-date blogn-post-meta-child">
                        At 17 Hour Ago
                      </div>
                    </div>
                    <p class="content-comment">{{$item->content}}
                    </p>
                    <div class="reply-comment">
                      <a href="">Reply</a>
                    </div>
                  </div>
                </li>
                @endforeach
                @else
                  {{'Không có bình luận nào cho bài viết này.'}}
                @endif
              </ul>
            </div>
            <!-- Leave A Comment -->
            @if (Auth::user())
            <div class="blogn-post-leave-comment">
              <h2 class="blogn-post-title">Leave A Comment</h2>
              <div class="blogn-post-leave-comment-form">
                <div class="touch-with-us-form">
                  <form class="form-touch-with-us" method="POST" action="{{route('postComment',$tin->id)}}">
                    @csrf
                    <textarea class="form-control custom-textarea blogn-post-textarea" name="content">Your Message Here*</textarea>
                    <button type="submit" class="newsletter-form-submit st2-btn-submit">
                      <span class="newsletter-submit-text st2-submit-text">Submit</span>
                      <span class="newsletter-submit-icon st2-submit-icon">
                        <i class="lnr lnr-arrow-right"></i>
                      </span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection