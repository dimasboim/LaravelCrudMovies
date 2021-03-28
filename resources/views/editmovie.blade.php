<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">MOVIE.COM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">List Movie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/add">add Movies</a>
                    </li>


                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    @foreach($movies as $key => $data)
    <form style="padding-left: 10px; padding-right: 10px;" action="/movie/update"
     method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" value="{{$data->id}}" name="id">
        <div class="mb-3">
            <label for="txt_judul" class="form-label">Judul Film</label>
            <input type="text" value="{{$data->judul}}"
            class="form-control" id="txt_judul" name="judul" aria-describedby="txt_judul_help">
            <div id="txt_judul_help" class="form-text">Isikan Judul Film</div>
        </div>
        <div class="mb-3">
            <label for="txt_deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="txt_deskripsi" value="{{$data->deskripsi}}"  name="deskripsi" 
            aria-describedby="txt_deskripsi_help">
            <div id="txt_deskripsi_help" class="form-text">Isikan Deskripsi Film</div>
        </div>
        <div class="mb-3">
            <label for="txt_sutradara" class="form-label">sutradara Film</label>
            <input type="text" value="{{$data->sutradara}}"class="form-control" id="txt_sutradara" name="sutradara"
            aria-describedby="txt_sutradara_help">
            <div id="txt_sutradara_help" class="form-text">Isikan sutradara Film</div>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" value="{{$data->rating}}" class="form-control" id="rating" name="rating" min="1" max="5">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">file cover film</label>
            <input class="form-control" name="fotoCover" type="file" id="formFile">
          <br/>  Browse File untuk ganti foto, foto sebelumnya<br/>
          <img src="/images/{{$data->foto}}" width=200/>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @endforeach
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>