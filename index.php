<?php
$link = mysqli_connect("localhost", "root", "", "spsdaurm_users");

if (array_key_exists("submit", $_POST)) {
    
    // $query_last_mileage

    $query = "INSERT INTO `fuel_data` (`date`, `distance`, `paid`, `rate`, `got`, `mileage`) 
    VALUES (
    '".mysqli_real_escape_string($link, $_POST['date'])."',
    '".mysqli_real_escape_string($link, $_POST['distance'])."',
    '".mysqli_real_escape_string($link, $_POST['paid'])."',
    '".mysqli_real_escape_string($link, $_POST['rate'])."',
    '".mysqli_real_escape_string($link, $_POST['got'])."',
    '".mysqli_real_escape_string($link, $mileage)."');";
    
    if (mysqli_query($link, $query)) {
        $entry_id = mysqli_insert_id($link); //get id of most recent inserted row
        header("Location: ?id=".$entry_id."&successEdit=1"); //redirect
    }
}

$query = "SELECT * FROM `fuel_data` ORDER BY `date` DESC";
$result = mysqli_query($link, $query);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Fuel data</title>
</head>

<body>
    <div class="container">
        <h1>Fuel data</h1>

        <form method="post">
            <!-- Date -->
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" aria-describedby="date"
                    value="<?=date("Y-m-d")?>">
            </div>

            <!-- Distance -->
            <div class="form-group">
                <label for="distance">Distance</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-signpost-2"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1.414V2h2v-.586a1 1 0 0 0-2 0z" />
                                <path fill-rule="evenodd"
                                    d="M13.5 3H2v2h11.5l.75-1-.75-1zM2 2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h11.5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.3 2.4a1 1 0 0 0-.8-.4H2zm.5 6H14v2H2.5l-.75-1 .75-1zM14 7a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2.5a1 1 0 0 1-.8-.4L.725 9.3a.5.5 0 0 1 0-.6L1.7 7.4a1 1 0 0 1 .8-.4H14z" />
                                <path d="M7 6h2v1H7V6zm0 5h2v5H7v-5z" />
                            </svg>
                        </div>
                    </div>
                    <input type="number" step="0.01" class="form-control" id="distance" name="distance"
                        placeholder="What's the current travelled distance?">
                </div>
            </div>

            <!-- Paid -->
            <div class="form-group">
                <label for="paid">Paid</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash-stack"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 3H1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1h-1z" />
                                <path fill-rule="evenodd"
                                    d="M15 5H1v8h14V5zM1 4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H1z" />
                                <path
                                    d="M13 5a2 2 0 0 0 2 2V5h-2zM3 5a2 2 0 0 1-2 2V5h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 13a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                            </svg>
                        </div>
                    </div>
                    <input type="number" class="form-control" id="paid" name="paid"
                        placeholder="How much did you pay for the fuel?">
                </div>
            </div>

            <!-- Rate -->
            <div class="form-group">
                <label for="rate">Rate</label>
                <input type="number" step="0.01" class="form-control" id="rate" name="rate"
                    placeholder="What's the current fuel rate?">
            </div>



            <!-- Got -->
            <div class="form-group">
                <label for="got">Got</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-droplet-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" />
                            </svg>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="got" name="got"
                        placeholder="How much fuel did you get?">
                </div>
            </div>


            <button class="btn btn-primary" name="submit" value="submit">Submit</button>
        </form>

        <h1>Fuel Data</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Distance</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Got</th>
                    <th scope="col">Mileage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                        <td scope="row">'.date("d-M-Y", strtotime($row['date'])).'</td>
                        <td>'.$row['distance'].' km</td>
                        <td>Rs. '.$row['paid'].'</td>
                        <td>Rs. '.$row['rate'].' /L</td>
                        <td>'.$row['got'].' L</td>
                        <td>'.$row['mileage'].' km/L</td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
    document.querySelector('#rate').addEventListener('keyup', calcGot, false);
    document.querySelector('#got').addEventListener('keyup', calcRate, false);


    function calcGot() {
        let paid = document.getElementById("paid").value;
        let rate = document.getElementById("rate").value;

        if (!isNaN(parseFloat(paid))) {
            if (!isNaN(parseFloat(rate))) {
                got = parseFloat(paid) / parseFloat(rate);
                document.getElementById("got").value = got.toFixed(2);

            }
        }
    }

    function calcRate() {
        let paid = document.getElementById("paid").value;
        let got = document.getElementById("got").value;

        if (!isNaN(parseFloat(paid))) {
            if (!isNaN(parseFloat(got))) {
                rate = parseFloat(paid) / parseFloat(got);
                document.getElementById("rate").value = rate.toFixed(2);
            }
        }
    }
    </script>
</body>

</html>