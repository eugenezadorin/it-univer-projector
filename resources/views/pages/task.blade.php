@extends('layout', ['project' => $task->project])
@section('title', $task->name . ' - ' . $task->project->name)

@section('content')
    <section class="section">
        <div class="container">

            @if (session('message'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="notification is-danger">
                    <button class="delete"></button>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <a href="{{ $task->project->path() }}" class="tag is-info">#{{ $task->project->name }}</a>
            @foreach($task->tags as $tag)
                <a href="{{ $tag->path() }}" class="tag tag--{{ $tag->slug }}">#{{ $tag->name }}</a>
            @endforeach

            <h1 class="title is-2">{{ $task->name }}</h1>

            <div class="app__task-summary">
                <div class="app__task-summary-item">
                    <strong>Assignee:</strong> {{ $task->assignee->name }}
                </div>
                <div class="app__task-summary-item">
                    <strong>Priority:</strong> {{ $task->priority->name }}
                </div>
            </div>

            <div class="content">
                {{ $task->description }}
            </div>



            @foreach($task->comments as $comment)
            <article class="message is-info">
                <div class="message-header">
                    <p>{{ $comment->author->name }}</p>
                    <time>{{ $comment->created_at->format('d.m.Y H:i') }}</time>
                </div>
                <div class="message-body">
                    {!! nl2br($comment->text) !!}
                </div>
            </article>
            @endforeach

                <CommentsList>
                    <Comment author="" text="" date=""></Comment>
                    <Comment author="" text="" date=""></Comment>
                    <Comment author="" text="" date=""></Comment>
                    <CommentsForm></CommentsForm>
                </CommentsList>


            <div id="comments-list-app">
                <article class="message is-warning" v-for="comment in comments">
                    <div class="message-header">
                        <p>@{{ comment.author }}</p>
                        <time>@{{ comment.date }}</time>
                    </div>
                    <div class="message-body" v-html="comment.text"></div>
                </article>
            </div>
            <br><br>

            {{--
            <div id="comments-list-component">
                <comments-list load-url="{{ route('tasks.comments', ['project' => $task->project, 'task' => $task]) }}"></comments-list>
            </div>
            <br><br>
            --}}

            <form method="post" data-action="{{ $task->path() }}" action="{{ route('tasks.comment', ['project' => $task->project, 'task' => $task]) }}">
                @csrf
                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea class="textarea" name="message" placeholder="Type your comments here">{{ old('message') }}</textarea>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">Cancel</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
<script>
    import CommentsList from "../../js/components/CommentsList";
    export default {
        components: {CommentsList}
    }
</script>
