<?php
session_start();

$oilGrade = isset($_SESSION['oilGrade']) ? htmlspecialchars($_SESSION['oilGrade']) : '';
$engineType = isset($_SESSION['engineType']) ? htmlspecialchars($_SESSION['engineType']) : '';
$result = isset($_SESSION['result']) ? htmlspecialchars($_SESSION['result']) : '';

$mainTitle = 'Oil checker';
$resultTitle = 'Result';

$oilGradeTitle = 'Oil grade';
$oilGradePlaceholder = 'Enter grade, for example, 5W-30';

$engineTypeTitle = 'Make & Engine type';
$engineTypePlaceholder = 'Enter make, model and engine, for example, Acura CSX 1998cc 147KW 200HP K20Z3';

$resultPlaceholder = 'Response after submitting your request';
$height = '100px';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
    <title>OilChecker</title>
    <style>
        ::placeholder {
            color: gray;
            font-size: 10px;
        }
    </style>
</head>
<body>
<div class="container-fluid align-content-lg-center">
    <div class="row-g-1">
        <div class="col-4 bg-success p-2 text-white bg-opacity-75 mb-2 mt-2 rounded mx-auto">
            <h2 class="section-title mb-40 text-center"><?= $mainTitle; ?></h2>
            <form id="mainForm" method="POST" action="form.php">
                <div class="mb-3">
                    <label for="oilGrade" class="form-label"><?= $oilGradeTitle; ?></label>
                    <input type="text"
                           class="form-control"
                           id="oilGrade"
                           name="oilGrade"
                           placeholder="<?= $oilGradePlaceholder; ?>">
                </div>
                <div class="mb-3">
                    <label for="engineType" class="form-label"><?= $engineTypeTitle; ?></label>
                    <input type="text"
                           class="form-control"
                           id="engineType"
                           name="engineType"
                           placeholder="<?= $engineTypePlaceholder; ?>">
                </div>
                <button type="submit" id="submit" class="btn btn-secondary mb-3">Submit</button>
                <button type="reset" id="reset" class="btn btn-secondary mb-3"">Reset</button>
            </form>
        </div>
        <div class="col-4 bg-success p-2 text-white bg-opacity-75 mb-2 mt-2 rounded mx-auto">
            <h2 class="section-title mb-40 text-center"><?= $resultTitle; ?></h2>
            <div class="form-floating">
                <label for="result"></label>
                <textarea class="form-control"
                          id="result"
                          name="result"
                          style="height: <?= $height; ?>"
                          placeholder="<?= $resultPlaceholder; ?>"
                          readonly><?php echo $result; ?></textarea>
            </div>
        </div>
    </div>
</div>
<script>
    $('textarea').each(function () {
        this.setAttribute('style', `height:${(this.scrollHeight)}px; overflow-y:hidden;`);
    }).on('change', function () {
        this.style.height = '0px';
        this.style.height = `${(this.scrollHeight)}px`;
    });

    $('#reset').on('click', function () {
        let $result = $('#result');
        $result.val('');
        $result[0].setAttribute('style', 'height: <?= $height; ?>')
    });
</script>
</body>
</html>

<?php


