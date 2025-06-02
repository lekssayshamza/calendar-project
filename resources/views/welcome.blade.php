<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Event Calendar</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" />

    <style>
        body {
            padding-top: 70px; /* Adjust if your navbar is taller */
        }

        .feature-box {
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-price {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0.5rem 0;
        }

        .card ul li {
            padding: 0.3rem 0;
            font-size: 0.95rem;
        }

        #pricing .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #pricing .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <!-- Brand with icon -->
            <a class="navbar-brand d-flex align-items-center" href="/">
            <i class="bi bi-calendar-event" style="font-size: 2rem; color: white; margin-right: 0.5rem;"></i>
            Event Calendar
            </a>

            <!-- Hamburger toggler -->
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav links aligned right -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#pricing">Pricing</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary ms-2" href="{{ route('register') }}">Register</a>
                </li>
                @else
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-link nav-link"
                        style="padding: 0; border: none; background: none;"
                    >
                        Logout
                    </button>
                    </form>
                </li>
                @endguest
            </ul>
            </div>
        </div>
    </nav>

    @if(session('status'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
        </div>
    @endif

    <main id="home" class="d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">
            Organize your life with ease <br> Your personal Event Calendar
            </h1>
            <p class="lead mb-4">
            Manage your events simply and efficiently. Stay on top of your schedule with our intuitive app.
            </p>
            <div>
            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3">Register</a>
            </div>
        </div>
    </main>



    <section id="features" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Features</h2>
            <div class="row g-4 justify-content-center">
            
            <div class="col-md-4 col-lg-3">
                <div class="feature-box p-4 bg-white rounded shadow-sm h-100">
                <h5 class="mb-3">Easy Event Scheduling</h5>
                <p>Quickly create and manage events with our intuitive interface.</p>
                </div>
            </div>
            
            <div class="col-md-4 col-lg-3">
                <div class="feature-box p-4 bg-white rounded shadow-sm h-100">
                <h5 class="mb-3">Notifications and Reminders</h5>
                <p>Never miss an event with timely alerts and reminders.</p>
                </div>
            </div>
            
            <div class="col-md-4 col-lg-3">
                <div class="feature-box p-4 bg-white rounded shadow-sm h-100">
                <h5 class="mb-3">Multiple Views</h5>
                <p>Switch easily between daily, weekly, and monthly calendar views.</p>
                </div>
            </div>
            
            <div class="col-md-4 col-lg-3">
                <div class="feature-box p-4 bg-white rounded shadow-sm h-100">
                <h5 class="mb-3">Responsive & Mobile-Friendly</h5>
                <p>Access your calendar anytime, anywhere — optimized for all devices.</p>
                </div>
            </div>
            
            </div>
        </div>
    </section>

    <section id="pricing" class="py-5 bg-white">
            <div class="container text-center">
                <h2 class="mb-4">Pricing</h2>
                <p class="mb-5 text-muted">Choose a plan that works best for you.</p>

                <div class="row justify-content-center">
                    <!-- Free Plan -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Free</h5>
                                <h6 class="card-price">$0<span class="text-muted">/month</span></h6>
                                <ul class="list-unstyled my-3">
                                    <li>✅  Basic scheduling</li>
                                    <li>✅  Email reminders</li>
                                    <li>❌  Google Calendar Sync</li>
                                </ul>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <!-- Premium Plan -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-lg border-primary">
                            <div class="card-body">
                                <h5 class="card-title">Premium</h5>
                                <h6 class="card-price">$9.99<span class="text-muted">/month</span></h6>
                                <ul class="list-unstyled my-3">
                                    <li>✅  Everything in Free</li>
                                    <li>✅  Google Calendar Sync</li>
                                    <li>✅  Priority support</li>
                                </ul>
                                <a href="{{ route('register') }}" class="btn btn-primary">Start Free Trial</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row align-items-center">

            <div class="col-md-6 mb-3 mb-md-0 text-center text-md-start">
                <ul class="list-inline mb-0">
                <li class="list-inline-item"><a href="#" class="text-light text-decoration-none">About</a></li>
                <li class="list-inline-item"><a href="#" class="text-light text-decoration-none">Contact</a></li>
                <li class="list-inline-item"><a href="#" class="text-light text-decoration-none">Privacy</a></li>
                <li class="list-inline-item"><a href="#" class="text-light text-decoration-none">Terms of Service</a></li>
                </ul>
            </div>

            <div class="col-md-6 text-center text-md-end mb-3 mb-md-0">
                <a href="#" class="text-light me-3"><i class="bi bi-facebook" style="font-size: 1.5rem;"></i></a>
                <a href="#" class="text-light me-3"><i class="bi bi-twitter" style="font-size: 1.5rem;"></i></a>
                <a href="#" class="text-light me-3"><i class="bi bi-instagram" style="font-size: 1.5rem;"></i></a>
                <a href="#" class="text-light"><i class="bi bi-linkedin" style="font-size: 1.5rem;"></i></a>
            </div>

            </div>

            <hr class="border-secondary">

            <div class="text-center small">
            &copy; {{ date('Y') }} Event Calendar. All rights reserved.
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
