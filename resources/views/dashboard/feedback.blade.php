<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
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
                                <a href="#" class="sidebar-link">Schedule</a>
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
                    <a href="/feedback" class="sidebar-link">
                            <i class="fa-regular fa-file pe-2"></i>
                            Feedback
                        </a>
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
                                <!-- <a href="#" class="dropdown-item">Settings</a> -->
                                <a href="/sesi/logout" class="dropdown-item">Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                    <!-- Table -->
                    <!-- resources/views/dashboard/feedback.blade.php -->

                <div class="card border-0">
                    <div class="card-header">
                        <h5 class="card-title">
                            Add Feedback
                        </h5>
                        <h6 class="card-subtitle text-mute">
                            <!-- December, 10 -->
                        </h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <div class="form-group">
                                                        <div contenteditable="true" id="textarea" oninput="updateCursorPosition()" style="border: 1px solid #ced4da; padding: 8px; min-height: 100px;"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <br>
                                                        <div id="formatting-options">
                                                            <button type="button" class="btn btn-secondary" onclick="applyFormatting('bold')">Bold</button>
                                                            <button type="button" class="btn btn-secondary" onclick="applyFormatting('italic')">Italic</button>
                                                            <button type="button" class="btn btn-secondary" onclick="applyFormatting('underline')">Underline</button>
                                                        </div>
                                                    </div>
                                                    <form action="/submitFeedback" method="POST" enctype="multipart/form-data">
                                                        <br>
                                                        <input type="file" class="form-control" id="file-upload" name="feedbackFile">
                                                        <br>
                                                        <button style="margin-bottom: 20px;" type="button" class="btn btn-primary" onclick="submitFeedback()">Submit</button>
                                                    </form>
                                                </thead>
                                                
                                                <tbody id="feedback-list" class="mt-4">
                                                    <div class="card-header">
                                                        <h5 class="card-title">
                                                            Feedback list
                                                        </h5>
                                                        @foreach($feedbacks as $feedback)
                                                            <tr>
                                                                <td>
                                                                    <p>{{ $feedback->content }}</p>
                                                                    @if($feedback->file_path)
                                                                    <img src="{{ asset('storage/feedback_files/' . $feedback->file_path) }}" alt="Feedback File">
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>

                <script>
                    function updateCursorPosition() {
                        var textarea = document.getElementById('textarea');
                        window.currentCursorPosition = window.getSelection().getRangeAt(0);
                    }

                    function applyFormatting(format) {
                        document.execCommand(format, false, null);
                    }

                    async function submitFeedback() {
                        var feedbackContent = document.getElementById('textarea').innerText;
                        var feedbackFile = document.getElementById('file-upload').files[0];

                        try {
                            // Check if a file is selected
                            if (feedbackFile) {
                                const formData = new FormData();
                                formData.append('content', feedbackContent);
                                formData.append('feedbackFile', feedbackFile);

                                const response = await fetch('/submitFeedback', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    },
                                    body: formData,
                                });

                                const newFeedback = await response.json();

                                document.getElementById('feedback-list').innerHTML += `<p>${newFeedback.content}</p>`;

                                document.getElementById('textarea').innerHTML = '';

                                window.location.href = '/feedback';
                            } else {
                                // No file selected, use JSON
                                const response = await fetch('/submitFeedback', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    },
                                    body: JSON.stringify({ content: feedbackContent }),
                                });

                                const newFeedback = await response.json();

                                document.getElementById('feedback-list').innerHTML += `<p>${newFeedback.content}</p>`;

                                document.getElementById('textarea').innerHTML = '';

                                window.location.href = '/feedback';
                            }
                        } catch (error) {
                            console.error('Error submitting feedback:', error);
                        }
                    }

                </script>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        
    </script>
</body>
</html>
