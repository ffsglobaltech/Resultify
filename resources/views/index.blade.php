<!-- resources/views/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Resultify</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons (Font Awesome) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .hero {
            background: #007bff;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }
        .feature-icon {
            font-size: 2em;
            color: #007bff;
        }
        .footer {
            background: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1 class="display-4">Welcome to Resultify</h1>
        <p class="lead">Effortlessly manage school results, attendance, and more.</p>
        <a href="#features" class="btn btn-light btn-lg mt-3">Learn More</a>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Platform Features</h2>
        <div class="row text-center">
            <!-- Feature 1: Result Management -->
            <div class="col-md-4">
                <div class="feature-icon mb-3">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h4>Result Management</h4>
                <p>Seamlessly manage student results and generate reports with ease.</p>
            </div>
            <!-- Feature 2: Attendance Tracking -->
            <div class="col-md-4">
                <div class="feature-icon mb-3">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h4>Attendance Tracking</h4>
                <p>Track student attendance to monitor engagement and progress.</p>
            </div>
            <!-- Feature 3: User Roles & Permissions -->
            <div class="col-md-4">
                <div class="feature-icon mb-3">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h4>Roles & Permissions</h4>
                <p>Assign roles such as admin, teacher, and parent for secure access.</p>
            </div>
        </div>
    </div>
</section>

<!-- Subscription Plans Section -->
<section id="plans" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Subscription Plans</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Basic Plan</h5>
                        <p class="card-text">$10 / term</p>
                        <p>For small schools with up to 50 students.</p>
                        <a href="#" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Standard Plan</h5>
                        <p class="card-text">$30 / term</p>
                        <p>For schools with up to 200 students.</p>
                        <a href="#" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Premium Plan</h5>
                        <p class="card-text">$50 / term</p>
                        <p>Unlimited students and full access to features.</p>
                        <a href="#" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">What Our Users Say</h2>
        <div class="row">
            <div class="col-md-6">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">"Resultify has transformed our result management process!"</p>
                    <footer class="blockquote-footer">Principal at Greenfield School</footer>
                </blockquote>
            </div>
            <div class="col-md-6">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">"Managing attendance has never been easier."</p>
                    <footer class="blockquote-footer">Teacher at Riverside Academy</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section id="cta" class="text-center py-5 bg-primary text-white">
    <div class="container">
        <h2 class="mb-4">Ready to Get Started?</h2>
        <p class="lead mb-4">Sign up now to transform your school's result and attendance management.</p>
        <a href="/register" class="btn btn-light btn-lg">Join Now</a>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modern Bootstrap Footer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            /* Custom Footer Styles */
            footer {
                background-color: #2d3436;
                color: #dfe6e9;
                padding: 50px 0;
                font-size: 14px;
            }
    
            footer h5 {
                color: #ffffff;
                margin-bottom: 20px;
                font-size: 18px;
            }
    
            footer a {
                color: #dfe6e9;
                text-decoration: none;
                transition: color 0.3s;
            }
    
            footer a:hover {
                color: #00b894;
            }
    
            .social-icons a {
                font-size: 20px;
                margin-right: 15px;
                color: #dfe6e9;
                transition: color 0.3s;
            }
    
            .social-icons a:hover {
                color: #00b894;
            }
    
            .footer-bottom {
                border-top: 1px solid #444;
                padding-top: 20px;
                font-size: 12px;
                text-align: center;
            }
    
            /* Responsive Design */
            @media (max-width: 768px) {
                footer {
                    padding: 30px 0;
                }
    
                .social-icons a {
                    margin-right: 10px;
                }
            }
        </style>
    </head>
    
    <body>
    
        <!-- Footer Section -->
        <footer>
            <div class="container">
                <div class="row">
                    <!-- Quick Links Section -->
                    <div class="col-md-3">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
    
                    <!-- Social Media Icons Section -->
                    <div class="col-md-3">
                        <h5>Follow Us</h5>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
    
                    <!-- Contact Info Section -->
                    <div class="col-md-3">
                        <h5>Contact Info</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-map-marker-alt"></i> Address: 123 Street, City</li>
                            <li><i class="fas fa-phone-alt"></i> Phone: +123 456 7890</li>
                            <li><i class="fas fa-envelope"></i> Email: contact@company.com</li>
                        </ul>
                    </div>
    
                    <!-- Newsletter Section -->
                    <div class="col-md-3">
                        <h5>Newsletter</h5>
                        <form>
                            <input type="email" class="form-control" placeholder="Your email" required>
                            <button type="submit" class="btn btn-primary mt-2">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
    
            <!-- Footer Bottom Section -->
            <div class="footer-bottom">
                <p>&copy; 2024 Your Company. All Rights Reserved. | Designed by You</p>
            </div>
        </footer>
    
        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    </body>
    
    </html>
    
</footer>

<!-- Bootstrap and FontAwesome Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
