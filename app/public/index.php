<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курс валюти USD</title>
    <!-- Підключаємо Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h4>Курс валюти USD</h4>
                        <?php
                        // Зчитуємо значення курсу з файлу
                        $usdRate = file_get_contents('usd_rate.txt');
                        if ($usdRate) {
                            echo "<p>Згідно НБУ: $usdRate грн.</p>";
                        } else {
                            echo "<p>Курс не оновлено або не вдалося його отримати.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>