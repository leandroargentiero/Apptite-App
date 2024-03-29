@extends('layouts.master')

@section('banner')

    <div class="eventdetail-wrapper" style="background-image:url('/homepictures/{{ $event->homepicture }}')">
        <div class="eventdetail-content">
            <h3 class="eventdetail-title">{{ $event->meal_name }}</h3>
        </div>
    </div>

@stop

@section('content')

    @if(Session::has('successmessage'))
        <div class="alert alert-success">
            <strong>{{ Session::get('successmessage') }}</strong>
        </div>
    @elseif (count($errors) > 0)
        <div class="alert alert-danger">
            <p>Woops! Er ging iets mis:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

                <!-- EDIT EVENT MODAL -->
        @include('modals.modal_editevent')

        <div class="profile-container">
            <!-- SECTION MEALINFO -->
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-custom">
                        <div class="panel-title">
                            {{ $event->meal_name }}
                            @if( $event->id == Auth::user()->id )
                                <a href="#" data-toggle="modal"
                                   data-target="#modalEditEvent">
                                    <i class="fa fa-cog pull-right" aria-hidden="true"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <img class="pull-left img-rounded" style="width: 100%; height: 100%"
                                 src="/mealpictures/{{ $event->meal_picture }}" alt="">
                        </div>

                        <div class="col-md-6">
                            <h4><i class="fa fa-info" aria-hidden="true"></i> Over gerecht:</h4>
                            <p>{{ $event->meal_description }}</p>

                            <h4><i class="fa fa-money" aria-hidden="true"></i> Prijs:</h4>
                            <p>€ {{ $event->price }} p.p.</p>

                            <h4><i class="fa fa-user" aria-hidden="true"></i> Aantal vrije plaatsen:</h4>
                            <p>{{ $event->event_places }}</p>

                            <h4><i class="fa fa-calendar" aria-hidden="true"></i> Wanneer:</h4>
                            <p>{{ date('H:i', strtotime($event->event_time)) }} - {{  date(' d F, Y', strtotime($event->event_date)) }}</p>

                            <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Waar:</h4>
                            <p>{{ $event->address }} </br>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- SECTION REVIEWS -->
                <h2 class="page-header">Reviews over deze chef</h2>
                <section class="comment-list">
                    @if(count($reviews) >= 1)
                    @foreach($reviews as $review)
                            <!-- REVIEW ARTICLE -->
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="/avatars/{{ $review->profilepic }}"/>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> {{ $review->name }}</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i
                                                    class="fa fa-clock-o"></i> {{  date(' d F, Y', strtotime($review->created_at)) }}
                                        </time>
                                    </header>
                                    <div class="comment-post">
                                        @for($i = 0; $i < $review->review_rating; $i++)
                                            <span class="fa fa-star" data-rating="{{$i}}"></span>
                                        @endfor
                                        <p>
                                            {{ $review->review_description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    @else
                        <p>{{ $event->name }} heeft nog geen reviews mogen ontvangen.</p>
                    @endif
                </section>
            </div>


            <!-- SECTION USER INFO -->
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="profile-header">
                        <ul>
                            <li class="user-image">
                                <img class="user-avatar" src="/avatars/{{ $event->profilepic }}" alt="user avatar">
                            </li>
                            <li class="username"><h3><a href="/profiel/{{ $event->id }}">{{ $event->name }}</a></h3>
                            </li>
                            <li class="member-since"> Apptiter sinds:
                                {{  date(' d F, Y', strtotime($event->created_at)) }}</li>
                        </ul>
                    </div>
                </div>

                <!-- CALL TO ACTION BOOK - CHANGE - FULL -->
                <div>
                    @if($event->id == Auth::user()->id)
                        <a class="cta-toevoegen" href="#" data-toggle="modal"
                           data-target="#modalEditEvent">Event wijzigen</a>
                    @elseif($event->event_places == 0)

                    @else
                        <a class="cta-toevoegen" href="#" data-toggle="modal" data-target="#modalReservation">Een
                            plaats
                            reserveren</a>
                    @endif

                    @include('modals.modal_reservation')
                </div>

                <!-- GOOGLE MAPS WITH USER'S LOCATION -->
                <div id="map" style="width: 100%; height: 300px;">
                    {!! Mapper::render() !!}
                </div>

            </div>
        </div>

@stop