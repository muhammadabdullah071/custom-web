<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Final Exam - Assignment #3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .hero {
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 15px 15px;
        }
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        .question-badge {
            position: absolute;
            top: -15px;
            right: -15px;
            font-size: 1rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 3px solid white;
        }
    </style>
</head>
<body>

    <div class="hero shadow-sm">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Web Final Exam</h1>
            <h3 class="fw-light">Assignment #3</h3>
            <p class="lead mt-3 bg-white text-primary d-inline-block px-4 py-2 rounded-pill fw-bold">Muhammad Abdullah (9248934)</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row text-center mb-4">
            <div class="col">
                <p class="text-muted fs-5">Welcome to your master dashboard. All of your assignment questions have been unified below for easy access.</p>
            </div>
        </div>
        <div class="row g-4">
            
            <!-- Question 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm border-primary position-relative">
                    <span class="badge bg-primary question-badge shadow">Q1</span>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">Session Visits</h5>
                        <p class="card-text text-muted">A system that tracks and displays how many times a user has visited the Home, Contact, and Services pages using PHP Sessions.</p>
                        <a href="Question1_Session_Visits/index.php" class="btn btn-outline-primary mt-auto w-100">Open Project</a>
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm border-success position-relative">
                    <span class="badge bg-success question-badge shadow">Q2</span>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success">NUML Library</h5>
                        <p class="card-text text-muted">A full Library Management System with secure user authentication, precise form validation, and database CRUD operations.</p>
                        <a href="Question2_NUML_Library/login.php" class="btn btn-outline-success mt-auto w-100">Open Project</a>
                    </div>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm border-warning position-relative">
                    <span class="badge bg-warning text-dark question-badge shadow">Q4</span>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-warning text-dark">Product MVC</h5>
                        <p class="card-text text-muted">An elegant Model-View-Controller (MVC) architecture implementation designed to cleanly Create, Store, and List product details.</p>
                        <a href="Question4_Product_MVC/index.php" class="btn btn-outline-warning mt-auto w-100">Open Project</a>
                    </div>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm border-danger position-relative">
                    <span class="badge bg-danger question-badge shadow">Q5</span>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-danger">Font Settings</h5>
                        <p class="card-text text-muted">A session-based preference manager that seamlessly captures visual font settings and applies them globally across different pages.</p>
                        <a href="Question5_Font_Settings/index.php" class="btn btn-outline-danger mt-auto w-100">Open Project</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
