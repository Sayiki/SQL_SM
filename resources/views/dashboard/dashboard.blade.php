<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/83e3234794.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">
                        <img src="assets/image/Logo_Panjang.png" alt="logo" style="width: 10vw;">
                    </a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Menu
                    </li>
                    <li class="sidebar-item">
                        <a href="/dashboard" class="sidebar-link">
                            <i class="fa-solid fa-list"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            My Lists
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/dashboard" class="sidebar-link">Schedule</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/calendar" class="sidebar-link">Calender</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/AddSchedule" class="sidebar-link">Add Schedule</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-file pe-2"></i>
                            Settings
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Feedback</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Change Language</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-items dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="assets/image/heru.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="/sesi/logout" class="dropdown-item">Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Welcome, Arsaq</h4>
                    </div>
                    @php
                        $noTasksMessage = ($tasks->count() === 0) ? 'Tidak ada jadwal' : 'Hanya ada satu jadwal';
                    @endphp
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                @if($tasks->count() > 0)
                                    <?php $earliestTask = $tasks->sortBy('start_time')->first(); ?>
                                    <div class="card-body p-0 d-flex flex-fill">
                                        <div class="row g-0 w-100">
                                            <div class="col-6">
                                                <div class="p-3 m-1">
                                                    <p class="mb-0">{{ \Carbon\Carbon::parse($earliestTask->start_time)->format('Y-m-d') }}</p>
                                                    <h4 class="text-danger">{{ $earliestTask->name }}</h4>
                                                    <p class="mb-0 fw-bold">{{ \Carbon\Carbon::parse($earliestTask->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($earliestTask->end_time)->format('H:i') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card-body p-0 d-flex flex-fill justify-content-center align-items-center">
                                        <div class="col-12 text-center">
                                            <p class="fw-bold">{{ $noTasksMessage }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                @if($tasks->count() > 1)
                                    <?php
                                        $secondEarliestTask = $tasks->sortBy('start_time')->skip(1)->first();
                                    ?>
                                    <div class="card-body p-0 d-flex flex-fill">
                                        <div class="row g-0 w-100">
                                            <div class="col-6">
                                                <div class="p-3 m-1">
                                                    <p class="mb-0">{{ \Carbon\Carbon::parse($secondEarliestTask->start_time)->format('Y-m-d') }}</p>
                                                    <h4>{{ $secondEarliestTask->name }}</h4>
                                                    <p class="mb-0 fw-bold">{{ \Carbon\Carbon::parse($secondEarliestTask->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($secondEarliestTask->end_time)->format('H:i') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card-body p-0 d-flex flex-fill justify-content-center align-items-center">
                                        <div class="col-12 text-center">
                                            <p class="fw-bold">{{ $noTasksMessage }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Today Schedule
                            </h5>
                            @if($tasks->count() > 0)
                                <?php $earliestTaskDate = date('F, d', strtotime($earliestTask->start_time)); ?>
                                <h6 class="card-subtitle text-muted">
                                    {{ $earliestTaskDate }}
                                </h6>
                            @else
                                <h6 class="card-subtitle text-muted">
                                    No tasks for today
                                </h6>
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>    
                                                            <th>Name</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th colspan="2" text-align="center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>   
                                                    @foreach($tasks->sortBy('start_time') as $t)
                                                        <tr>
                                                            <td>{{ $t->name }}</td>
                                                            <td>{{ $t->start_time }}</td>
                                                            <td>{{ $t->end_time }}</td>
                                                            <td><a href="/edit-{{ $t->id }}" class="btn btn-primary">edit</a></td>
                                                            <td>
                                                                <form action="/dashboard/{{ $t->id }}" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <input type="submit" class="btn btn-danger delete-btn" value="delete" id="delete{{ $t->id }}">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                        <tr>
                                                            @if(session('success'))
                                                                <div class="alert alert-success">{{session('success')}}</div>
                                                            @endif
                                                            <a href="/AddSchedule">
                                                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Task
                                                            </a> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const taskId = e.target.id.replace('delete', '');

                Swal.fire({
                    title: 'Yakin?',
                    text: 'Task yang terhapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Iye',
                    cancelButtonText: 'gjadi'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna konfirmasi untuk menghapus
                        document.getElementById('delete' + taskId).closest('form').submit();
                        Swal.fire(
                            'Dihapus!',
                            'Task berhasil dihapus.',
                            'success'
                        )
                    }
                });
            });
        });
    </script>
</body>
</html>
