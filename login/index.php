<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Health Care Portal</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --text-color: #333;
            --bg-color: #f4f4f4;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background: var(--bg-color);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .content {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }

        .welcome-banner {
            /* background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white; */
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-banner h2 {
            margin: 0;
            font-size: 2em;
        }

        .health-info, .recent-articles {
            margin-top: 30px;
        }

        h4 {
            color: var(--primary-color);
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        .bottt {
            margin-bottom: 15px;
            padding-left: 20px;
            position: relative;
        }

        .bottt::before {
            content: '•';
            color: var(--secondary-color);
            position: absolute;
            left: 0;
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--secondary-color);
        }

        .logout {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout:hover {
            background-color: #c0392b;
        }

        .error.success {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .recent-articles li {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .recent-articles li:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            .content {
                padding: 20px;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div id="head_content"></div>
    <div id="body_content"></div>
    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <div class="welcome-banner" ">
    <h2>Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</h2>
</div>

            
            <div>
                <h4>Look Some More About Health</h4>
                <ul>
                    <li class="bottt"><a href="/health/blogs/views/Blogs.html">Blogs</a></li>
                    <li class="bottt"><a href="/health/testimonals/views/testimonals.html">Testimonals</a></li>
                    <li class="bottt"><a href="/health/Homepage/views/homepage.html">Home</a></li>
                    <li class="bottt"><a href="/health/FAQs/views/FAQs.html">FAQs</a></li>
                    <li class="bottt"><a href="/health/AboutUs/views/about.html">About us</a></li>
                    <li class="bottt"><a href="/health/Services/views/services.html">Services</a></li>
                </ul>
                <h4>Health Tips</h4>
                <ul>
                    <li class="bottt">Stay hydrated by drinking at least 8 glasses of water a day.</li>
                    <li class="bottt">Exercise regularly to maintain a healthy body and mind.</li>
                    <li class="bottt">Eat a balanced diet rich in fruits and vegetables.</li>
                    <li class="bottt">Get regular health check-ups to monitor your health status.</li>
                </ul>
            </div>
            <div class="recent-articles">
                <h4>Recent Health Articles</h4>
                <ul>
                    <li class="bottt"><a href="/health/blogs/blogs&links/2.html">The Surprising Link Between Speech Speed and Dementia Risk</a></li>
                    <li class="bottt"><a href="/health/blogs/blogs&links/6.html">Natural Home Remedies to Have Sound Sleep</a></li>
                    <li class="bottt"><a href="/health/blogs/blogs&links/7.html">What are the best activities for senior citizens to stay healthy</a></li>
                    <li class="bottt"><a href="/health/blogs/blogs&links/9.html">How often must a senior citizen get a general checkup</a></li>
                </ul>
            </div>
        <?php endif ?>
        <button style="background: red; color: white; font-size: 20px; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px;">
    <a href="index.php?logout='1'" style="color: white; text-decoration: none;">Logout</a>
</button>
 
</div>
    <div id="footer_content"></div>
</body>
</html>
<script>
    // Load the header into the #head_content div
    $('#head_content').load('/health/common/views/header.html');
    $('#body_content').load('/health/common/views/body.html');

    // Load the footer into the #footer_content div
    $('#footer_content').load('/health/common/views/footer.html');
</script>
