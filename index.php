<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="/css/style.css">
    <title>Monitoring</title>
</head>
<body>
    <?php include('getdata.php'); ?>
    <nav>
        <div class="navbar">
            <h1>Monitoring APD</h1>
        </div>
    </nav>
    <div class="content">
        <div class="container">
            <div class="rounded p-3 shadow total-box" style="color: black;">
                <p class="font-weight-bold">Total Pelanggaran</p>
                <!-- Mulai For Loop untuk Camera dari Div ini  -->
                <?php
                        $start_date = null; 
                        $end_date = null;
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $start_date = $_POST["start_date"];
                        $end_date = $_POST["end_date"];

                        // Optionally, you can redirect the user 
                        }
                        $data;
                        if($start_date != "" && $end_date != ""){
                            $data = fetchCamRange($start_date,$end_date);
                        }
                        else{
                            $data = fetchCamFromDatabase();// Menggunakan fungsi untuk mengambil data
                        }
                        echo "<div class='d-flex' style='gap: 8px;'>";
                        echo "<span>Camera 1:</span>";
                        echo "<span>".$data[0]['cam1']."</span>";
                        echo "</div>";
                        echo "<div class='d-flex' style='gap: 8px;'>";
                        echo "<span>Camera 2:</span>";
                        echo "<span>".$data[0]['cam2']."</span>";
                        echo "</div>";
                        echo "<div class='d-flex' style='gap: 8px;'>";
                        echo "<span>Camera 3:</span>";
                        echo "<span>".$data[0]['cam3']."</span>";
                        echo "</div>";
                        echo "<div class='d-flex' style='gap: 8px;'>";
                        echo "<span>Camera 4:</span>";
                        echo "<span>".$data[0]['cam4']."</span>";
                        echo "</div>";
                        ?>
            </div>
            <h2 class="mb-2">Tabel monitoring</h2>
        
            <div class="table-responsive table-box">
                <div class="p-2 date-box">
                    <form id="dateForm" class="date-form" method="POST" action="">
                        <div class="d-flex" style="gap: 16px">
                            <div class="date-input">
                                <label for="start_date" class="m-0">Start date:</label>
                                <input type="date" name="start_date" />
                            </div>
                            <div class="date-input">
                                <label for="end_date" class="m-0">End date:</label>
                                <input type="date" name="end_date" />
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="apply-btn shadow-none">Apply</button>
                        </div>
                    </form>
                </div>
                <table class="table table-hover custom-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col" style="text-align: center">Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mulai loop row dari sini -->
                        <?php
                        $start_date = null; 
                        $end_date = null;
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $start_date = $_POST["start_date"];
                        $end_date = $_POST["end_date"];

                        // Optionally, you can redirect the user 
                        }
                        $data;
                        if($start_date != "" && $end_date != ""){
                            $data = fetchDataRange($start_date,$end_date);
                            echo "&nbsp;Start date:&nbsp;" .$start_date."";
                            echo "<br>";
                            echo "&nbsp;End date:&nbsp;&nbsp;&nbsp;" .$end_date."";
                        }
                        else{
                            $data = fetchDataFromDatabase(); // Menggunakan fungsi untuk mengambil data
                        }
                       
                        foreach ($data as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['tanggal'] . "</td>";
                            echo "<td>" . $row['waktu'] . "</td>";
                            echo "<td>" . $row['lokasi'] . "</td>";
                            // echo "<td>" . $row['bukti'] . "</td>";
                            echo "<td style='display:flex; justify-content:center' ><img id='".$row['id']."' src='/foto/" . $row['bukti'] . "' alt='".$row['bukti']."' class='myImg' style='width:100%;max-width:200px' onclick='deployModal(".$row['id'].")' ></td>";
                            echo "</tr>";
                            echo "<div id='a".$row['id']."' class='modal'>";
                            echo "<span  id='d".$row['id']."'  class='close'>&times;</span>";
                            echo "<img class='modal-content' id='b".$row['id']."'>";
                            echo "<div id='c".$row['id']."' style='  margin: auto;
                            display: block;
                            width: 80%;
                            max-width: 700px;
                            text-align: center;
                            color: white;
                            padding: 10px 0;
                            height: 150px;'> " . $row['bukti'] . " </div>";
                            echo "</div>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Trigger the Modal -->


<!-- The Modal -->
<!-- <div id="myModal" class="modal">

    <span class="close">&times;</span>

    <img class="modal-content" id="img01">

    <div id="caption"></div>
</div>  -->

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
