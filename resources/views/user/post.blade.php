@extends('user/app')

@section('bg-img', Storage::disk('local')->url($slug->image))

  {{-- @foreach($slug as $slug) --}}

@section('title',$slug->title)

@section('sub-heading', $slug->subtitle)

@section('main-content')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=848954628801101&autoLogAppEvents=1"></script>

	<!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <small>Created At&nbsp;{{ $slug->created_at->diffForHumans() }}</small>

          @foreach($slug->categories as $category)

          <small class="float-right" style="margin-right: 20px">Category&nbsp;

          <a href="{{ route('PostsByCategory', $category) }}">{{ $category->name }}</a>

          @endforeach

          </small>


          
          {!! htmlspecialchars_decode( $slug->body) !!}

          
            <h3>Tag Clouds</h3>

          <a href=""><small class="" style="margin-right: 20px; border-radius: 5px; border: 1px solid gray; padding: 5px;">
          @foreach($slug->tags as $tags)

          {{ $tags->name }}

          @endforeach
          </small>
          </a>

        </div>
        {{-- @endforeach --}}
      </div>
      <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="10"></div>
    </div>
  </article>

  <hr>

@endsection

@push('user-script')

<script src="{{ asset('user/js/prism.js') }}"></script>

@endpush
