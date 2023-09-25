<html>
<head>    
    <title>Test 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Program "Bage" "Concat"</h3>
            <p>Sebuah program perulangan dengan rentang jarak sesuai inputan nominal yang dimasukkan. Memiliki ketentuan sebagai berikut :</p>
            <ol>
                <li>
                    <p>Jika bilangan tersebut kelipatan 3 maka program akan mencetak "Bage"</p>
                </li>
                <li>
                    <p>Jika bilangan merupakan kelipatan bilangan 5 maka akan mencetak "Concat"</p>
                </li>
                <li>
                    <p>Jika bilangan merupakan kelipatan bilangan 3 dan 5 maka akan mencetak "Bage Concat"</p>
                </li>
                <li>
                    <p>Jika program sudah mencetak kata "Bage Concat" sebanyak 2 kali maka untuk bilangan kelipatan 3 akan mencetak "Concat" dan bilangan kelipatan 5 akan mencetak "Bage"</p>
                </li>
                <li>
                    <p>Program akan berhenti ketika kata "Bage Concat" telah tercetak sebanyak 5 kali.</p>
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="index.php" method="post" name="form1">
                <table width="25%" border="0">
                    <tr> 
                        <td><label for="bilangan">Input Nominal</label></td>
                        <td><input type="text" name="bilangan" id="bilangan"></td>
                    </tr>
                    <tr> 
                        <td></td>
                        <td><input type="submit" name="Submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">

            <?php
                if (isset($_POST['Submit'])) {
                    // Tangkap jumlah perulangan dari formulir
                    $jumlahPerulangan = $_POST["bilangan"];
                    echo "<div> Nilai yang anda inputkan adalah : <strong>". $jumlahPerulangan . "</strong></div>";
                    require_once("perulangan.php");
                    
                    $perulangan = new Perulangan();
                    $result = join(" ", $perulangan->cetakHasilPerulangan($jumlahPerulangan));
                    echo "<div> Hasil : <br> <strong>" . $result. "</strong></div>";
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>