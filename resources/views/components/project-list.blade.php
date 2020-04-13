<table class="table is-fullwidth app__project-list">
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>
                <a href="/projects/{{ $project->slug }}" class="app__project-list-name">{{ $project->name }}</a>
                <div class="app__project-list-description">{{ $project->description }}</div>
            </td>
            <td>
                <span class="icon app__project-list-icon" title="3 tasks">
                    <i class="fas fa-tasks"></i>
                    <span class="app__project-list-counter">3</span>
                </span>
                <span class="icon app__project-list-icon" title="2 members">
                    <i class="fas fa-user"></i>
                    <span class="app__project-list-counter">2</span>
                </span>
            </td>
            <td class="has-text-right">{{ date("H:i", strtotime($project->updated_at)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
