<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Final Exam - Assignment #3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .main-container {
            padding: 2rem 0;
        }
        .header-card {
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        .header-card h1 {
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .header-card .badge-user {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
        }
        .project-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        .card-top-bar {
            height: 6px;
        }
        .project-card .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
        }
        .project-card .card-title {
            font-weight: 700;
            font-size: 1.2rem;
        }
        .project-card .card-text {
            font-size: 0.9rem;
            color: #6c757d;
            flex-grow: 1;
        }
        .project-card .btn {
            border-radius: 50px;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            transition: all 0.3s;
        }
        .project-card .btn-outline-primary {
            border-color: #667eea;
            color: #667eea;
        }
        .project-card .btn-outline-primary:hover {
            background: #667eea;
            color: white;
        }
        .project-card .btn-outline-success {
            border-color: #28a745;
            color: #28a745;
        }
        .project-card .btn-outline-success:hover {
            background: #28a745;
            color: white;
        }
        .project-card .btn-outline-warning {
            border-color: #ffc107;
            color: #856404;
        }
        .project-card .btn-outline-warning:hover {
            background: #ffc107;
            color: #212529;
        }
        .project-card .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }
        .project-card .btn-outline-danger:hover {
            background: #dc3545;
            color: white;
        }
        .badge-q {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 700;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .footer {
            color: rgba(255,255,255,0.7);
            text-align: center;
            padding: 1.5rem 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="container">
            <div class="header-card text-center">
                <h1 class="display-5 mb-2">Assignment #3</h1>
                <span class="badge-user mb-3">Muhammad Abdullah (9248934)</span>
                <p class="text-muted mt-2 mb-0">Select a project below to view its functionality.</p>
            </div>

            <div class="row g-4">
                <!-- Question 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="project-card">
                        <div class="card-top-bar bg-primary"></div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="badge-q bg-primary text-white me-2">1</div>
                                <h5 class="card-title text-primary mb-0">Session Visits</h5>
                            </div>
                            <p class="card-text">Tracks and displays how many times a user visits the Home, Contact, and Services pages using PHP Sessions.</p>
                            <a href="Question1_Session_Visits/index.php" class="btn btn-outline-primary mt-3 w-100">Open Project</a>
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="project-card">
                        <div class="card-top-bar bg-success"></div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="badge-q bg-success text-white me-2">2</div>
                                <h5 class="card-title text-success mb-0">NUML Library</h5>
                            </div>
                            <p class="card-text">Library Management System with secure authentication, form validation, and full CRUD operations using PDO and MySQL.</p>
                            <a href="Question2_NUML_Library/login.php" class="btn btn-outline-success mt-3 w-100">Open Project</a>
                        </div>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="project-card">
                        <div class="card-top-bar bg-warning"></div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="badge-q bg-warning text-dark me-2">4</div>
                                <h5 class="card-title text-warning mb-0">Product MVC</h5>
                            </div>
                            <p class="card-text">MVC architecture implementation to Create, Store, List, and View product details with clean separation of concerns.</p>
                            <a href="Question4_Product_MVC/index.php" class="btn btn-outline-warning mt-3 w-100">Open Project</a>
                        </div>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="col-md-6 col-lg-3">
                    <div class="project-card">
                        <div class="card-top-bar bg-danger"></div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="badge-q bg-danger text-white me-2">5</div>
                                <h5 class="card-title text-danger mb-0">Font Settings</h5>
                            </div>
                            <p class="card-text">Session-based preference manager that captures font size and color settings and applies them across different pages.</p>
                            <a href="Question5_Font_Settings/index.php" class="btn btn-outline-danger mt-3 w-100">Open Project</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="setup.php" class="btn btn-light px-4 py-2 rounded-pill fw-semibold shadow-sm">Run Database Setup</a>
            </div>
        </div>
        <div class="footer">
            <div class="container">Assignment #3</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
