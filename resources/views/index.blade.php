<!DOCTYPE html>
<html>

<head>
  <title>Datatables in Laravel Tutorial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
</head>

<body>

  <div class="container pt-5">
    <div class="row">
      <div class="col">
        <button class="btn btn-primary" id="addBtn">
          <i class="bi bi-plus"></i>
          Add Song
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-4">
        <h2>Song Lists</h2>
      </div>
    </div>
    <div class="row">
      <div class="col table-responsive">
        <table class="table table-bordered table-hover songs" style="width: 100%;">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>Title</th>
              <th>Artist</th>
              <th>Lyrics</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="modal fade" id="warningMdl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="mesTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mesTitle"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="mesCont">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="songMdl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="mesTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sngTitle">Add Song</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body container">
          <form id="songFrm" class="row needs-validation" novalidate>
            @csrf
            <div class="col-12 col-md-6 col-lg-6">
              <label class="form-label" for="title">Title:</label>
              <input type="text" class="form-control" id="title" name="title" maxlength="50" required />
            </div>
            <div class="col-12 col-md-6 col-lg-6">
              <label class="form-label" for="title">Artist:</label>
              <input type="text" class="form-control" id="artist" name="artist" maxlength="100" required />
            </div>
            <div class="col-12 mt-3">
              <label class="form-label" for="lyrics">Lyrics:</label>
              <textarea class="form-control" name="lyrics" id="lyrics" rows="10" required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="saveBtn">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>

</html>