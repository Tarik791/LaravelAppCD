
@include('home.header')



<div class="content">
        <form action="{{ url('location') }}" method="post">
        @csrf
        <div class="mapform">
          <div class="row">
            <div class="col-5">
              <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" readonly>
            </div>
            <div class="col-5">
              <input type="text" class="form-control" placeholder="lng" name="lng" id="lng" readonly>
            </div>
          </div>

        </div>
          <input type="submit" class="btn btn-primary">
        </form>
      </div>

      <center>
      <div id="map" style="height: 400px; width: 800px;" class="my-3"></div>

      <div>
            <h3>
                Found your location using marker! 
                <br>
                You can take marker and move with him!
                <br>
                When you found your location click submit, Thank you!
            </h3>
      </div>
      </center>
@include('home.footer')
