<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <?php
    if (isset($_POST["OK"])) {
        $con = mysqli_connect("", "root", "", "bewerbungsvorbereiter");
        $firm = $_POST["firm"];
        $date = $_POST["date"];
        $length = $_POST["length"];
        $person = $_POST["person"];
        $place = $_POST["place"];
        $clothes = $_POST["clothes"];
        $strengths = $_POST["strengths"];
        $weaknesses = $_POST["weaknesses"];
        $questions = $_POST["questions"];
        $jobdescriptions = $_POST["jobdescriptions"];

        $sql = "INSERT INTO firm VALUES (0, '$firm', '$date', '$length',
         '$person', '$place', '$clothes', '$strengths', '$weaknesses', 
         '$questions', '$jobdescriptions')";
        mysqli_query($con, $sql);

        $num = mysqli_affected_rows($con);
        if ($num > 0) {
            echo "<p><font color='#00aa00'>";
            echo "Ein Datensatz hinzugekommen";
            echo "</font></p>";
        } else {
            echo "<p><font color='#ff0000'>";
            echo "Es ist ein Fehler aufgetreten, ";
            echo "es ist kein Datensatz hinzugekommen";
            echo "</font></p>";
        }

        mysqli_close($con);
    }
    ?>
</head>

<body>

    <div class="container mainframe">
        <div class="row NewObject item">
            <div class="col-sm irt">
                <h1>Neues Bewerbungsgespräch</h1>

                <form action="index.php" method="post">
                    <table>
                        <tr>
                            <th> Firm </th>
                            <th>
                                <p><input name="firm" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Date </th>
                            <th>
                                <p><input name="date" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Length </th>
                            <th>
                                <p><input name="length" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Person </th>
                            <th>
                                <p><input name="person" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Place </th>
                            <th>
                                <p><input name="place" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Clothes </th>
                            <th>
                                <p><input name="clothes" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Strengths </th>
                            <th>
                                <p><input name="strengths" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Weaknesses </th>
                            <th>
                                <p><input name="weaknesses" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Questions </th>
                            <th>
                                <p><input name="questions" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th> Job descriptions </th>
                            <th>
                                <p><input name="jobdescriptions" id="input"></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><input type="submit" name="OK" id="btn"></p>
                            </th>
                            <th>
                                <p><input type="reset" name=" Reset " id="btn"></p>
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="row OtherObjects item">
            <div class="col-sm irt">
                <?php
                $con = mysqli_connect("", "root", "", "bewerbungsvorbereiter");
                $res = mysqli_query($con, "SELECT * FROM firm");
                $num = mysqli_num_rows($res);
                if ($num > 0) echo "";
                else echo "No Entries";

                while ($dsatz = mysqli_fetch_assoc($res)) {
                    echo "<div class='output'>";
                    echo "<h1>" . $dsatz["firm"] . "</h1><br>";
                    echo "<p>" . " Date/Time : " . $dsatz["datetime"] . "</p>";
                    echo "<p>" . " Length : " . $dsatz["length"] . "</p>";
                    echo "<p>" . " Person : " . $dsatz["Person"] . "</p>";
                    echo "<p>" . " Place : " . $dsatz["place"] . "</p>";
                    echo "<p>" . " Clothes : " . $dsatz["clothes"] . "</p>";
                    echo "<p>" . " Strengths : " . $dsatz["strengths"] . "</p>";
                    echo "<p>" . " Weaknesses : " . $dsatz["weaknesses"] . "</p>";
                    echo "<p>" . " Questions : " . $dsatz["questions"] . "</p>";
                    echo "<p>" . " Job Descriptions : " . $dsatz["jobdescription"] . "</p>";
                    echo "</div>";
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
    </div>

</body>

</html>