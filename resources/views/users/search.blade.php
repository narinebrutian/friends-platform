<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container col-lg-6">
    <div class="row">
        <div class="card mt-5">
            <div class="card-header">
                <div class="form-group col-lg-5 mb-3">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search users by name...">
                </div>
            </div>
            <div class="card-body">
                <div id="search-list">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name}}</td>
                                <td>
                                    <button id="addFriend" class="btn btn-outline-success"><span>&#43; &nbsp;</span>Add Friend</button>
                                    <button id="viewProfile" class="btn btn-outline-primary">View Profile</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/autoComplete.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js" integrity="sha512-P2Z/b+j031xZuS/nr8Re8dMwx6pNIexgJ7YqcFWKIqCdbjynk4kuX/GrqpQWEcI94PRCyfbUQrjRcWMi7btb0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
