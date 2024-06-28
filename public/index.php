<?php
session_start();

$oilGrade = isset($_SESSION['oilGrade']) ? htmlspecialchars($_SESSION['oilGrade']) : '';
$engineType = isset($_SESSION['engineType']) ? htmlspecialchars($_SESSION['engineType']) : '';
$result = isset($_SESSION['result']) ? htmlspecialchars($_SESSION['result']) : '';

$mainTitle = 'Oil checker';
$resultTitle = 'Result';

$oilGradeTitle = 'Oil grade';
$oilGradeDescription = 'Enter grade, for example, 5W-30';

$engineTypeTitle = 'Make & Engine type';
$engineTypeDescription = 'Enter make, model and engine, for example, Acura CSX 1998cc 147KW 200HP K20Z3';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>OilChecker</title>
</head>
<body>
<div class="container-fluid">
    <div class="row-g-1">
        <div class="col-4 bg-success p-2 text-white bg-opacity-75 mb-2 mt-2 rounded">
            <h2 class="section-title mb-40 text-center"><?= $mainTitle; ?></h2>
            <form id="mainForm" method="POST" action="form.php">
                <div class="mb-3">
                    <label for="oilGrade" class="form-label"><?= $oilGradeTitle; ?></label>
                    <input type="text" class="form-control" id="oilGrade" name="oilGrade">
                    <div id="oilGradeDescription" class="form-text"><?= $oilGradeDescription; ?></div>
                    <?php if(isset($errors['oilGrade'])):?>
                        <p style="color: red"><?= $errors['oilGrade'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="engineType" class="form-label"><?= $engineTypeTitle; ?></label>
                    <input type="text" class="form-control" id="engineType" name="engineType">
                    <div id="engineTypeDescription" class="form-text"><?= $engineTypeDescription; ?></div>
                </div>
                <button type="submit" class="btn btn-secondary mb-3">Submit</button>
            </form>
        </div>
        <div class="col-4 bg-success p-2 text-white bg-opacity-75 mb-2 mt-2 rounded">
            <h2 class="section-title mb-40 text-center"><?= $resultTitle; ?></h2>
            <div class="form-floating">
                <label for="result"></label>
                <textarea class="form-control" id="result" name="result" style="height: 100px" readonly><?php echo $result; ?></textarea>
            </div>
        </div>
    </div>
</div>
</body>
</html>


