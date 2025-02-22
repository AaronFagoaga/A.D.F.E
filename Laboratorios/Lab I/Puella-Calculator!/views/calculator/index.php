<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Calculator';
$this->registerCssFile('@web/css/calculator.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<div class="calculator-container bg-dark text-white p-4 rounded">
    <h1 class="text-center">Puella Calculator!</h1>

    <div id="calc-form">
        <div class="mb-3">
            <label for="num1" class="form-label">Número 1</label>
            <input type="number" id="num1" class="form-control bg-secondary text-white" required>
        </div>

        <div class="mb-3">
            <label for="num2" class="form-label">Número 2</label>
            <input type="number" id="num2" class="form-control bg-secondary text-white" required>
        </div>

        <div class="mb-3">
            <label for="operation" class="form-label">Selccione la operación:</label>
            <select id="operation" class="form-control bg-secondary text-white">
                <option value="add">Sumar</option>
                <option value="subtract">Restar</option>
                <option value="multiply">Multiplicar</option>
                <option value="divide">Dividir</option>
            </select>
        </div>

        <button id="calculate-btn" class="btn btn-primary w-100">Calcular</button>

        <div class="result mt-3">
            <h3>Resultado: <span id="result">0</span></h3>
        </div>
    </div>
</div>

<?php
$calculateUrl = Url::to(['calculator/calculate']);
$script = <<<JS
    $('#calculate-btn').click(function() {
        var num1 = $('#num1').val();
        var num2 = $('#num2').val();
        var operation = $('#operation').val();

        $.ajax({
            url: '$calculateUrl',
            type: 'POST',
            data: { num1: num1, num2: num2, operation: operation },
            success: function(response) {
                $('#result').text(response.result);
            }
        });
    });
JS;
$this->registerJs($script);
?>
