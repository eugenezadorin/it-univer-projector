@extends('layout')
@section('title', 'Single project')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-2">Single project</h1>
                <p>Some project description Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>
</section>
<section class="section is-paddingless">
    <div class="container">
        <div class="columns">
            <div class="column">
                @include('widgets.tasks')
            </div>
        </div>
        <div class="columns">
            <div class="column">
                @include('widgets.latest-activity')
            </div>
            <div class="column">
                @include('widgets.project-members')
            </div>
        </div>
    </div>
</section>
@endsection
