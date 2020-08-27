@extends('admin.layouts.app')

@section('content')

  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--  <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($heritage_count))
                      print $heritage_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Heritage</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-pdf"></i>
              </div>
              <a href="{{route('heritage.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($publication_count))
                      print $publication_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Publication</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="{{route('publication.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                   @php
                    if(!empty($current_issue_count))
                      print $current_issue_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Current Issue</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-clock"></i>
              </div>
              <a href="{{route('current_issue.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($gallery_state_count))
                      print $gallery_state_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total State Cover</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-image"></i>
              </div>
              <a href="{{route('gallery.state.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($gallery_tribe_count))
                      print $gallery_tribe_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Tribe Cover</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-image"></i>
              </div>
              <a href="{{route('gallery.state.tribe.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($gallery_individual_count))
                      print $gallery_individual_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Gallery Image</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-image"></i>
              </div>
              <a href="{{route('gallery.individual.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                   @php
                    if(!empty($folk_tales_count))
                      print $folk_tales_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Folk Tales</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-pdf"></i>
              </div>
              <a href="{{route('folk_tales.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($youtube_video_count))
                      print $youtube_video_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total YouTube Video</p>
              </div>
              <div class="icon">
                <i class="fa fa-photo-video"></i>
              </div>
              <a href="{{route('youtube_video.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($events_cover_count))
                      print $events_cover_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Events Cover</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-image"></i>
              </div>
              <a href="{{route('events.cover.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($events_individual_count))
                      print $events_individual_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Events Image</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-image"></i>
              </div>
              <a href="{{route('events.individual.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($magazine_count))
                      print $magazine_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Magazine</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="{{route('magazine.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  @php
                    if(!empty($member_subscription_count))
                      print $member_subscription_count;
                    else
                      print "0";
                  @endphp
                </h3>

                <p>Total Member Subscription</p>
              </div>
              <div class="icon">
                <i class="fa fa-photo-video"></i>
              </div>
              <a href="{{route('member_subscription.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('msg')
<div class="msg_box">
  <center class="msg">
    @if(session()->has('msg'))
      <b>{!! session()->get('msg') !!}</b>
    @endif
  </center>
</div>
@endsection