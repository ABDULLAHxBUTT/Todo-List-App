<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 15px;
            font-family: 'Poppins', sans-serif;
        }

        .todo-container {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            animation: fadeIn 0.6s ease-in-out;
        }

        h1 {
            text-align: center;
            font-weight: 700;
            background: linear-gradient(90deg, #ff9966, #ff5e62);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 25px;
        }

        form input {
            border-radius: 12px !important;
        }

        form button {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .list-group-item {
            border: none;
            border-radius: 12px;
            margin-bottom: 12px;
            padding: 15px 20px;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            transform: scale(1.02);
            background: #e9ecef;
        }

        .btn-success {
            background: #28a745;
            border: none;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-danger {
            background: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background: #b52a37;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    
    <div class="todo-container">
        <h1>✨ My To-do List</h1>

        {{-- Add task form --}}
        <form action="{{ route('tasks.store') }}" method="POST" class="d-flex mb-4">
            @csrf
            <input type="text" name="title" class="form-control me-2" placeholder="Enter your task">
            <button class="btn btn-primary">Add</button>
        </form>

        {{-- Task-List --}}
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="{{ $task->is_completed ? 'text-decoration-line-through text-muted' : 'fw-bold' }}">
                        {{ $task->title }}
                    </span>

                    <div>
                        @if(!$task->is_completed)
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline">
                                @csrf @method('PUT')
                                <button class="btn btn-success btn-sm">✔ Complete</button>
                            </form>
                        @endif

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑 Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
