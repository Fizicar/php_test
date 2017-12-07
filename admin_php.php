<?php
$id = $_SESSION['id'];
$getinfo = "SELECT * FROM `admin` WHERE id = '$id'";
$res = mysqli_query($conn, $getinfo);
$row = mysqli_fetch_assoc($res);
mysqli_query($conn, "UPDATE `admin` SET `zadnji_login`= NOW() WHERE 1");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="assets/css/styles.css" media="all" rel="stylesheet" type="text/css" />
    <title>Dashboard</title>
</head>
<body>
    <button id=logout>logout</button><hr>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="admin_section.php" method="POST"><br>
                    <input type="text" name="slika_1" placeholder="Slika 1"><br>
                    <input type="text" name="slika_2" placeholder="Slika 2"><br>
                    <input type="text" name="slika_3" placeholder="Slika 3"><br>
                    <input type="text" name="naslov" placeholder="Naslov"><br>
                    <input type="text" name="podnaslov" placeholder="Pod Naslov"><br>
                    <input type="text" name="text_1" placeholder="text_1"><br>
                    <input type="text" name="text_2" placeholder="text_2"><br>
                    <input type="text" name="text_3" placeholder="text_3"><br>
                    <input type="text" name="text_4" placeholder="text_4"><br>
                    <input type="text" name="text_5" placeholder="text_5"><br>

                    <br><br><br>
                    <input type="submit" value="Register">
                </form>    
            </div>
            <div class="col-md-4">
                <img src="http://via.placeholder.com/350x250" alt="">
                <div class="opis">
                    <img class="img-circle" src="http://via.placeholder.com/50x50" alt="">
                    <h3>Pavle Srdic</h3>
                    <span> ux designer</span>
                    <span> pozicija</span>
                </div>
                <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis maiores doloribus recusandae, eaque necessitatibus tempore vitae deserunt voluptatum aut eius placeat, iste possimus sunt odio molestiae suscipit. Sequi, eaque?
                <button type="button" class="btn btn-outline-primary">Sacuvaj Izmene</button>
                </p>
                
            </div>
            <div class="col-md-4">
                <img src="http://via.placeholder.com/350x250" alt="">
                <div class="opis">
                    <img class="img-circle" src="http://via.placeholder.com/50x50" alt="">
                    <h3>Pavle Srdic</h3>
                    <span> ux designer</span>
                    <span> pozicija</span>
                </div>
                <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis maiores doloribus recusandae, eaque necessitatibus tempore vitae deserunt voluptatum aut eius placeat, iste possimus sunt odio molestiae suscipit. Sequi, eaque?
                <button type="button" class="btn btn-outline-primary">Sacuvaj Izmene</button>
                </p>
                
            </div>
            <div class="col-md-4">
                <img src="http://via.placeholder.com/350x250" alt="">
                <div class="opis">
                    <img class="img-circle" src="http://via.placeholder.com/50x50" alt="">
                    <h3>Pavle Srdic</h3>
                    <span> ux designer</span>
                    <span> pozicija</span>
                </div>
                <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis maiores doloribus recusandae, eaque necessitatibus tempore vitae deserunt voluptatum aut eius placeat, iste possimus sunt odio molestiae suscipit. Sequi, eaque?
                <button type="button" class="btn btn-outline-primary">Sacuvaj Izmene</button>
                </p>
                
            </div>
            <div class="col-md-4">
                <img src="http://via.placeholder.com/350x250" alt="">
                <div class="opis">
                    <img class="img-circle" src="http://via.placeholder.com/50x50" alt="">
                    <h3>Pavle Srdic</h3>
                    <span> ux designer</span>
                    <span> pozicija</span>
                </div>
                <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis maiores doloribus recusandae, eaque necessitatibus tempore vitae deserunt voluptatum aut eius placeat, iste possimus sunt odio molestiae suscipit. Sequi, eaque?
                <button type="button" class="btn btn-outline-primary">Sacuvaj Izmene</button>
                </p>
                
            </div>
            <div class="col-md-4">
                <img src="http://via.placeholder.com/350x250" alt="">
                <div class="opis">
                    <img class="img-circle" src="http://via.placeholder.com/50x50" alt="">
                    <h3>Pavle Srdic</h3>
                    <span> ux designer</span>
                    <span> pozicija</span>
                </div>
                <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis maiores doloribus recusandae, eaque necessitatibus tempore vitae deserunt voluptatum aut eius placeat, iste possimus sunt odio molestiae suscipit. Sequi, eaque?
                <button type="button" class="btn btn-outline-primary">Sacuvaj Izmene</button>
                </p>
                
            </div>
        
        
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="assets/javascript/main.js"></script>
</body>
</html>