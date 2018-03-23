<?php
    $servername = "localhost";
    $username = "root";
    $passworddb = "";
    $dbname = "complexdb"; 
    
    // Create connection
    $conn = new mysqli($servername, $username, $passworddb, $dbname);
      
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $result = $conn->query("select name from Theatre_Complex");
    $result2 = $conn->query("select title from Movie");
    ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Admin - Add Showtime</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../custom_css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Tix4flix Admin</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link active" href="../pages/admin.html">
                  <span data-feather="home"></span>
                  Admin Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin.html">
                  <span data-feather="users"></span>
                  Manage Customers
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_add_movie.html">
                  <span data-feather="layers"></span>
                  Add a Movie
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_add_complex.html">
                  <span data-feather="layers"></span>
                  Add a Complex
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_add_theatre.html">
                  <span data-feather="layers"></span>
                  Add a Theatre
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_add_showtime.html">
                  <span data-feather="layers"></span>
                  Add a Showtime
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_analytics.html">
                  <span data-feather="bar-chart-2"></span>
                  Business Analytics
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_edit_complex.html">
                  <span data-feather="bar-chart-2"></span>
                  Edit Complex
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_edit_theatre.html">
                  <span data-feather="bar-chart-2"></span>
                  Edit Theatre
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_edit_showtimes.html">
                  <span data-feather="bar-chart-2"></span>
                  Edit Showing
                </a>
              </li>

            </ul> 
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Showtime</h1>
            
          </div>



          <form class="needs-validation" novalidate method="POST" action="../admin/admin_add_showtime.php">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="complex">Complex</label>
                <form class="d-flex justify-content-around" action="../php/find_showtime.php" method="POST">
                        <div class="input-group mb-3 pr-3">
                        <select class="custom-select" id="complexselect" name="complex_chosen">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                unset($id, $name);
                                $name = $row['name']; 
                                echo '<option value="'.$name.'">'.$name.'</option>';
                 
                            }
                            ?>
                        </select>
                        </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="screen_id">Screen ID</label>
                <form class="d-flex justify-content-around" action="../php/find_showtime.php" method="POST">
                        <div class="input-group mb-3 pr-3">
                            <input Name=screen_id type="text" class="form-control" id="screen_id" placeholder="" required>
                        </select>
                        </div>
              </div>
          </div>

          <div class="row">

            <div class="col-md-4 mb-3">
              <label for="main_actors">Movie Title</label>
              <form class="d-flex justify-content-around" action="../php/find_showtime.php" method="POST">
                        <div class="input-group mb-3 pr-3">
                        <select class="custom-select" id="movieselect" name="movie_chosen">
                            <?php
                            while ($row = $result2->fetch_assoc()) {
                                unset($id, $name);
                                $name = $row['title']; 
                                echo '<option value="'.$name.'">'.$name.'</option>';
                 
                            }
                            ?>
                        </select>
                        </div>
            `</div>
                
            <div class="col-md-4 mb-3">
              <label for="date">Date Showing</label>
              <input Name=date type="text" class="form-control" id="date" placeholder="YYYY/MM/DD" required>
            </div>
                
                
                
                
          </div>
          

          <div class="row">
          <div class="col-md-4 mb-3">
              <label for="start_time">Start Time</label>
              <input Name=start_time type="text" class="form-control" id="start_time" placeholder="" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="num_seats">Number of Seats</label>
              <input Name=num_seats type="text" class="form-control" id="sum_seats" placeholder="" required>
            </div>

            </div>
            
            <div class="col-md-8 mb-3">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add Showtime</button>
            </div>
          </div>
        </form>
        </div>
        </div>
          







        </main>

       <footer class="container">
      <div class="d-flex justify-content-center">
      <p>&copy; Tix4flix 2017-2018</p>
    </div>
    </footer>

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>