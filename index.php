<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Calculation Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2 class="fw-light mt-3 mb-3 text-center">REGISTRATION</h2>

                <form action="" method="post">                   
                    <div class="mb-3">  
                        <label for="studentName" class="form-label small">Student Name</label>
                        <input type="text" name="studentName" id="studentName" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="yearLevel" class="form-label small">Year Level</label>
                        <select class="form-select" name="yearLevel" id="yearLevel" aria-label="Default select example">
                            <option value="1">Year 1</option>
                            <option value="2">Year 2</option>
                            <option value="3">Year 3</option>
                            <option value="4">Year 4</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="totalUnits" class="form-label small">Total Units</label>
                        <input type="number" class="form-control" id="totalUnits" name="totalUnits" step="any" max="23" min="1" required>
                    </div>
                    
                    <div class="container mt-2 mb-3 text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="chooseLab" id="inlineRadio1" value="1" required>
                            <label class="form-check-label" for="inlineRadio1">With Lab</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="chooseLab" id="inlineRadio2" value="0" required>
                            <label class="form-check-label" for="inlineRadio2">Without Lab</label>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" name="btn_submit" class="btn btn-dark">Submit</button>
                        <p class=text-center mt-2>Aaaaa</p>
                    </div>
                    
                </form>
                
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_submit"])) {
                    include "school.php";

                    $studentName = $_POST["studentName"];
                    $yearLevel = $_POST["yearLevel"];
                    $totalUnits = $_POST["totalUnits"];
                    $chooseLab = $_POST["chooseLab"];

                    $student = new Tuition();
                    $student->setValues($studentName, $yearLevel, $totalUnits, $chooseLab, 0);

                    $totalPrice = $student->calculateTuition();

                    echo "Student Name: " . htmlspecialchars($student->studentName) . "<br>";
                    echo "Year Level: " . htmlspecialchars($student->yearLevel) . "<br>";
                    echo "Total Units: " . htmlspecialchars($student->totalUnits) . "<br>";
                    echo "Total Price: " . htmlspecialchars($totalPrice) . "<br><br>";
                }
                ?>
            </div>            
        </div>                    
    </main>   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
