<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CV de {{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 40px;
            color: #333;
        }
        h1 {
            color: #2d3748;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h2 {
            color: #4a5568;
            font-size: 18px;
            margin: 20px 0 10px;
        }
        h3 {
            color: #4a5568;
            font-size: 16px;
            margin: 15px 0 10px;
        }
        p {
            margin: 10px 0;
        }
        .section {
            margin-bottom: 20px;
        }
        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .skill {
            background-color: #f7fafc;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 14px;
        }
        .project {
            margin-bottom: 15px;
        }
        .project-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .project-description {
            font-size: 14px;
            color: #4a5568;
        }
        .project-link {
            color: #3182ce;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->title }}</h2>
    
    <div class="section">
        <p>{{ $user->bio }}</p>
    </div>

    <div class="section">
        <h3>Compétences</h3>
        <div class="skills">
            @foreach($user->skills as $skill)
                <span class="skill">{{ $skill->name }}</span>
            @endforeach
        </div>
    </div>

    <div class="section">
        <h3>Projets</h3>
        @foreach($user->projects as $project)
            <div class="project">
                <div class="project-title">{{ $project->title }}</div>
                <div class="project-description">{{ $project->description }}</div>
                @if($project->link)
                    <div class="project-link">{{ $project->link }}</div>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html> 