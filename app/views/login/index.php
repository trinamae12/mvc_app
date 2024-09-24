<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

    <form id="loginForm" method="POST">
  <div class="mb-3">
    <label for="exampleInputUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="loginUsername" aria-describedby="usernameHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="loginPassword">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    $(document).ready(function(){
        $('#loginForm').submit(function(e) {
            e.preventDefault();

            var formData = {
                username: $('#loginUsername').val(),
                password: $('#loginPassword').val()
            }

            console.log(formData);

            $.ajax({
                url: '/mvc_app/public/login/authenticate',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    //toastr.success('Login Successful');
                    setTimeout(function() {
                            window.location.href = '/mvc_app/public/'; // Redirect to home page
                        }, 2000);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    //toastr.error('Something went wrong');
                } 
            });
        });
    });
</script>
</body>
</html>
