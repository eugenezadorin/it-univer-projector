<table class="table is-fullwidth app__project-list">
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>
                <a href="{{ $project->path() }}" class="app__project-list-name">{{ $project->name }}</a>
                <div class="app__project-list-description">{{ $project->description }}</div>
            </td>
            <td>
                <span class="icon app__project-list-icon" title="{{ $project->tasks()->count() }} tasks">
                    <i class="fas fa-tasks"></i>
                    <span class="app__project-list-counter">{{ $project->tasks()->count() }}</span>
                </span>
                <span class="icon app__project-list-icon" title="{{ $project->members()->count() }} members">
                    <i class="fas fa-user"></i>
                    <span class="app__project-list-counter">{{ $project->members()->count() }}</span>
                </span>
            </td>
            <td class="has-text-right">{{ $project->updated_at->format('H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
