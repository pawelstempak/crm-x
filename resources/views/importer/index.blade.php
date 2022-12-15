<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel App') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <div class="row">
      <div class="col">
        <h1>Imports</h1>
      </div>
      <div class="col p-3">
        <form method="post" enctype="multipart/form-data">
        <input name="import_file" type="file" /> 
        <button type="submit">Import</button>
        </form>        
      </div>
    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Type</th>
        <th scope="col">Run at</th>
        <th scope="col">Entries processed</th>
        <th scope="col">Entries created</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($log_list as $log)        
        <tr>
        <th scope="row">{{ $log->id }}</th>
        <td>{{ $log->type }}</td>
        <td>{{ $log->run_at }}</td>
        <td>{{ $log->entries_processed }}</td>
        <td>{{ $log->entries_created }}</td>
        </tr>
    @endforeach        
    </tbody>
    </table>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>