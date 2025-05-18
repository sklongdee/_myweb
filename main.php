<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="img/1744789623310.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="img/eit_ita2025.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="img/NoGiftPolicy.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    <h1>กิจกรรม</h1>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">

    <?php
    include_once "conn.php";
    $sql = "SELECT * FROM activity";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    ?> 

        <div class="col">
            <div class="card h-100">
            <img src="img/<?=$row["activity_img"]?>" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="?page=activity_detail&activity_id=<?=$row["activity_id"]?>"
                    style="text-decoration: none; color:#000"> 
                    <p class="card-text"><?=$row["activity_title"]?></p>
                </a>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary"><?=$row["activity_date"]?></small>
            </div>
            </div>
        </div>

    <?php
    }
    } else {
    echo "0 results";
    }
    $conn->close();
    ?>

    </div>
</div>
<p></p>