<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <style>
        .app-container {
            height: 100vh;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="app-container d-flex align-items-center justify-content-center flex-column">

        <h3>Todo list</h3>
        <div class="d-flex align-items-center mb-3">

            <form method="POST" action="{{ route('todo_list.store') }}" class="d-flex">
                @csrf
                <div class="form-group  mr-3 mb-0">
                    <input type="text" class="form-control" required maxlength="100" name="title" placeholder="Add a new task">

                </div>
                <button type="submit" id="addTask" class="btn btn-warning ">Add</button>
            </form>

        </div>

        <div class="table-wrapper" style="width: 30%">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr >
                        <td>No</th>
                        <td>title.</th>
                        <td>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($tasks as $todo)
                        <?php $i++; ?>
                        <tr >
                            <td>{{ $i }}</td>
                            <td id="title"> {{ $todo->title }}</td>
                            <td>

                                <form method="POST" action="{{ route('todo_list.destroy', $todo->id) }}"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


<script>
document.getElementById('addTask').addEventListener('click', function () {
    var taskTitle = document.getElementById('title').value;

    var tasks = JSON.parse(localStorage.getItem('tasks')) || [];
    tasks.push(taskTitle);
    localStorage.setItem('tasks', JSON.stringify(tasks));

    location.reload();
});

</script>






</body>

</html>
