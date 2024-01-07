<!DOCTYPE html>
<html>

<head>
    <title>Enkripsi dan Dekripsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 200px;">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Enkripsi</h2>
                        <form action="" method="get">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="plaintext" placeholder="Masukkan teks untuk dienkripsi">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Enkripsi</button>
                            </div>
                        </form>

                        <?php
                        if (isset($_GET["plaintext"])) {
                            $plaintext = $_GET["plaintext"];
                            $ciphertext = enkripsiData($plaintext);

                            echo "<h2 class='mt-4'>Hasil Enkripsi</h2>";
                            echo "Plaintext yang dienkripsi adalah ", $plaintext;
                            echo "<br>";
                            echo "Hasil enkripsi adalah ", $ciphertext;
                            echo "<br>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Dekripsi</h2>
                        <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="ciphertext" placeholder="Masukkan teks untuk didekripsi">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Dekripsi</button>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST["ciphertext"])) {
                            $ciphertext = $_POST["ciphertext"];
                            $plaintext = dekripsiData($ciphertext);

                            echo "<h2 class='mt-4'>Hasil Dekripsi</h2>";
                            echo "Ciphertext yang di-dekripsi adalah ", $ciphertext;
                            echo "<br>";
                            echo "Hasil dekripsi adalah ", $plaintext;
                            echo "<br>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-light text-center py-3 fixed-bottom">
        Created &copy; 2023 by AFIF KHALID FADHILLAH - V3922001 - TI D
    </footer>

    <?php
    function enkripsiData($plaintext)
    {
        $key = array(
            'a' => '~', 'i' => '$', 'u' => '^', 'e' => '#', 'o' => '+',
            'A' => '!', 'I' => '%', 'U' => '_', 'E' => '=', 'O' => '*',
            '1' => '<', '2' => '>', '3' => '(', '4' => ')', '5' => '-',
            '6' => '@', '7' => '.', '8' => '[', '9' => ']', '0' => '`' 
        );
        $ciphertext = str_replace(array_keys($key), $key, $plaintext);
        return $ciphertext;
    }

    function dekripsiData($ciphertext)
    {
        $key = array(
            '~' => 'a', '$' => 'i', '^' => 'u', '#' => 'e', '+' => 'o',
            '!' => 'A', '%' => 'I', '_' => 'U', '=' => 'E', '*' => 'O',
            '<' => '1', '>' => '2', '(' => '3', ')' => '4', '-' => '5',
            '@' => '6', '.' => '7', '[' => '8', ']' => '9', '`' => '0'
        );
        $plaintext = str_replace(array_keys($key), $key, $ciphertext);
        return $plaintext;
    }
    ?>

</body>

</html>
