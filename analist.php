<?php
include('ui/header.php');
?>

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Bảng Báo Cáo</h1>

                    <!-- Row -->
                    <div class="row">

                        <!-- Biểu đồ tròn -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    Biểu đồ tròn
                                </div>
                                <div class="card-body">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Biểu đồ đường -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    Biểu đồ đường
                                </div>
                                <div class="card-body">
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->  

<?php
include('ui/footer.php');
?>




<!-- Script Bootstrap và Chart.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script biểu đồ tròn -->
<?php
   include('module/connect.php');
    // Truy vấn SQL
    $sql = "SELECT
                SUM(CASE WHEN COALESCE(return_date, '0000-00-00') = '0000-00-00' THEN 1 ELSE 0 END) AS unreturned_books,
                SUM(CASE WHEN COALESCE(return_date, '0000-00-00') <> '0000-00-00' THEN 1 ELSE 0 END) AS returned_books
            FROM
                loans
            WHERE
                MONTH(borrow_date) = MONTH(CURRENT_DATE())";

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnedBooks = $row['returned_books'];
            $unreturnedBooks = $row['unreturned_books'];
        }
    } else {
        $returnedBooks = 0;
        $unreturnedBooks = 0;
    }

    $mysqli->close();
    ?>

    <script>
        // Dữ liệu từ truy vấn SQL
        var returnedBooks = <?php echo $returnedBooks; ?>;
        var unreturnedBooks = <?php echo $unreturnedBooks; ?>;

        // Tạo biểu đồ tròn
        var pieChart = document.getElementById("pieChart").getContext('2d');
        new Chart(pieChart, {
            type: 'pie',
            data: {
                labels: ['Đã trả sách', 'Chưa trả sách'],
                datasets: [{
                    data: [returnedBooks, unreturnedBooks],
                    backgroundColor: ['#007bff', '#dc3545']
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

<!-- Script biểu đồ đường -->
<script>
    var lineChart = document.getElementById("lineChart").getContext('2d');
    new Chart(lineChart, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Data 1',
                data: [10, 20, 30, 25, 15, 35],
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: '#007bff',
                borderWidth: 2
            }, {
                label: 'Data 2',
                data: [20, 15, 25, 30, 10, 40],
                backgroundColor: 'rgba(220, 53, 69, 0.2)',
                borderColor: '#dc3545',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true
        }
    });
</script>