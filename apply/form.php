<?php
$message = '';
    if(isset($_POST['esendData']))
    {
        require 'utils/System.php';
        if(System::isValid([$_POST['position'],$_POST['name'],$_POST['mail'],$_POST['age'],$_POST['discordtag'],$_POST['gametag']]))
        {
            $system = new System();
            $system->position = $_POST['position'];
            $system->name = $_POST['name'];
            $system->email = $_POST['mail'];
            $system->age = $_POST['age'];
            $system->discordTag = $_POST['discordtag'];
            $system->gameTag = $_POST['gametag'];
            
            $system->setExperience($_POST['question1']);
            $system->setComparison($_POST['question2']);
            $system->setProblemSolution($_POST['question3']);
            $system->setExtras($_POST['question4']);
            $system->send();
            $message = 'Your request has been sent. This may take more than 24 hours to get an answer';
        } else {
            $message = 'There was an error sending, check that everything is written correctly';
        }
    }

?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <title>Staff Application</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    </head>
    <body>
        <form action="form.php" method="post" class="form-apply">
            <h2 class="form__title">Staff Application</h2>
                <?php
                if(strlen($message) > 0)
                {
                ?>
                 <div class="alert alert-success" role="alert">
                     <?php echo $message;?>
                 </div>
                <?php
                }
                ?>
            <div class="content">
                    <select class="input_48" required name="position">
                            <option value="trainee">Trainee</option>
                            <option value="discordmod">Discord Mod</option>
                            <option value="developer">Developer</option>
                            <option value="builder">Builder</option>
                          </select>

                <input type="text" name="name" placeholder="Full name" class="input_48" required>
                <input type="text" name="mail" placeholder="Email" class="input_48" required>
                <input type="number" name="age" placeholder="Age" class="input_48" required>
                <input type="text" name="discordtag" placeholder="Discord Username" class="input_48" required>
                <input type="text" name="gametag" placeholder="Minecraft Username" class="input_48" required>

                <textarea rows="4" cols="30" name="question1" placeholder="Tell us in detail your experience in the selected field" class="input_200" required></textarea>
                <textarea rows="4" cols="30" name="question2" placeholder="Show why we should choose you before others. Do not limit yourself" class="input_200" required></textarea>
                <textarea rows="4" cols="30" name="question3" placeholder="What makes your application different from others" class="input_200" required></textarea>
                <textarea rows="4" cols="30" name="question4" placeholder="Anything else to say? If you can, leave descriptions of your old works or links that demonstrate your good work" class="input_200" required></textarea>
                <input type="submit" name="esendData" value="Send" class="btn-send">
            </div>
        </form>
    </body>
</html>
