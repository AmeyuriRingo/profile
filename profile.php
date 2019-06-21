<?php require_once "includes/config.php"; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <title>Profile</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="full bg-dark text-white">
      <header>
          <ul class="nav nav-pills justify-content-end">
              <li class="nav-item">
                  <a class="nav-link active" name="sign_out" href="/Web-solution/index.php">Sign Out</a>
              </li>
          </ul>
      </header>
    <main>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 align-self-center">
            <h1><?php echo $_GET['name']; ?></h1>
          </div>
          <div class="col-2">
            <i class="fas hover-ifect fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
          </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST">
                  <label for="Change">Change Data</label>
<!--                  <div class="form-group">-->
<!--                    <label for="Name">Name</label>-->
<!--                    <input type="text" class="form-control" id="inputName" placeholder="Name">-->
<!--                  </div>-->
                  <div class="form-group">
                    <label for="Name">Contacts</label>
                    <input type="text" name="contacts" class="form-control" id="exampleInputPassword1" placeholder="Contacts">
                  </div>
                  <div class="form-group">
                    <label for="Name">Education</label>
                    <input type="text" name="education" class="form-control" id="exampleInputPassword1" placeholder="Education">
                  </div>
                  <div class="form-group">
                    <label for="Name">Work Experience</label>
                    <input type="text" name="work_experience" class="form-control" id="exampleInputPassword1" placeholder="Experience">
                  </div>
                  <div class="form-group">
                    <label for="Name">Skills</label>
                    <input type="text" name="skills" class="form-control" id="exampleInputPassword1" placeholder="Skills">
                  </div>
                  <button name="save_changes" type="submit" class="btn btn-primary">Save changes</button>
                    <?php
                    if ( isset($_REQUEST['save_changes']) ) {

                            if ( empty($_REQUEST['contacts']) ) {}
                            else {

                                mysqli_query($connection, "UPDATE `profile` SET `contacts` = '". $_REQUEST['contacts'] ."'");
                            }
                            if ( empty($_REQUEST['education']) ) {}
                            else {

                                mysqli_query($connection, "UPDATE `profile` SET `education` = '". $_REQUEST['education'] ."'");
                            }
                            if ( empty($_REQUEST['work_experience']) ) {}
                            else {

                                mysqli_query($connection, "UPDATE `profile` SET `experience` = '". $_REQUEST['work_experience'] ."'");
                            }
                            if ( empty($_REQUEST['skills']) ) {}
                            else {

                                mysqli_query($connection, "UPDATE `profile` SET `skills` = '". $_REQUEST['skills'] ."'");
                            }
                    }
                    ?>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="row beck">
          <div class="col">
            <div class="d-flex flex-column bd-highlight">
              <div class="p-2 bd-highlight">
                <h2>Contacts</h2>
                  <?php
                  $id = mysqli_query($connection, "SELECT `id` FROM `profile` WHERE `id` = '". $_GET['id'] ."'");
                  $contacts = mysqli_query($connection, "SELECT `contacts` FROM `profile` WHERE `id` = '". $_GET['id'] ."'");
                  $con = mysqli_fetch_assoc($contacts);
                  if ( $con['contacts'] != NULL ) {

                      echo $con['contacts'];
                  } else {

                      echo 'Place here your contact information.';
                  }
                  ?>
              </div>
              <div class="p-2 bd-highlight">
                <h2>Education</h2>
                  <?php
                  $id = mysqli_query($connection, "SELECT `id` FROM `profile` WHERE `id` = '". $_GET['id'] ."'");
                  $education = mysqli_query($connection, "SELECT `education` FROM `profile` WHERE `id` = '". $_GET['id'] ."'");
                  $educ = mysqli_fetch_assoc($education);
                  if ( $educ['education'] != NULL ) {

                      echo $educ['education'];
                  } else {

                      echo 'Place here your education level.';
                  }
                  ?>
              </div>

            </div>
          </div>
          <div class="col">
            <div class="d-flex flex-column bd-highlight mb-3">
              <div class="p-2 bd-highlight">
                <h2>Work Experience</h2>
                  <?php
                  $id = mysqli_query($connection, "SELECT `id` FROM `profile` WHERE `id` = '". $_GET['id'] ."'");
                  $work_exp = mysqli_query($connection, "SELECT `experience` FROM `profile` WHERE `id` = '". $_GET['id'] ."'");
                  $exp = mysqli_fetch_assoc($work_exp);
                  if ( $exp['experience'] != NULL ) {

                      echo $exp['experience'];
                  } else {

                      echo 'Place here your work experience.';
                  }
                  ?>
              </div>
              <div class="p-2 bd-highlight">
                <h2>Skills</h2>
                  <?php
                  $id = mysqli_query($connection, "SELECT `id` FROM `profile` WHERE `id` = '". $_GET['id'] ."'");
                  $skills = mysqli_query($connection, "SELECT `skills` FROM `profile` WHERE `id` = '". $_GET['id'] ."'");
                  $skill = mysqli_fetch_assoc($skills);
                  if ( $skill['skills'] != NULL ) {

                      echo $skill['skills'];
                  } else {

                      echo 'Place here your work experience.';
                  }
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
</body>

</html>