<nav class="navbar navbar-expand-lg navbar-light py-3 ">
                <div class="container rounded-4 px-5 bg-white">
                    <a class="navbar-brand" href="accueil.php"><span class="fw-bolder text-primary">Vos Playlist</span></a>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" method="POST">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my- my-sm-0" type="submit">Rechercher</button>
                    </form>
                        </ul>
                    </div>
                </div>
            </nav>

<div class="container">


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>       
         
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow-sm">
    <img src="<?php echo $response['tracks']['hits']['0']['track']['images']['background'];?> " alt="">
      <div class="card-body">
      <h1><?php echo($response['tracks']['hits']['0']['track']['title']);?></h1>
      <p><?php echo($response['tracks']['hits']['0']['track']['subtitle']);?></p>
        <div class="d-flex justify-content-between align-items-center">
        <audio controls src="assets/music.mp3">
    <a href="/media/cc0-audio/t-rex-roar.mp3"> Download audio </a>
  </audio>
        </div>
      </div>
    </div>
  </div>


</main>