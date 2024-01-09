    <?php

    $users = new  User();


    if($_SERVER["REQUEST_METHOD"] === 'POST')
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password=$_POST['password'];
        $photo = $_FILES['photo']['name'];
        $role = 0;
        $email_err= "";

        if($users->check_email($email))
        {
            $email_err="Email deja existant";
        }
        else
        {
                // upload pic
                $targetDir = "./assets/image/users/";
                // Get the uploaded file's name and temporary name
                $photo = basename($_FILES["photo"]["name"]);
                $tmpName = $_FILES["photo"]["tmp_name"];
                // Set the target path
                $targetPath = $targetDir . $photo;
                // Check if the file is an image
                $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                if (in_array($imageFileType, $allowedExtensions)) 
                {
                    // Move the file to the target directory
                    if (move_uploaded_file($tmpName, $targetPath)) 
                    {
                        // echo "The file " . $photo . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                }
                // end upload pic
            if ($users->register($email, $username, $role, $password, $photo)) 
            {
            header("location:index.php?page=login");
            }
            else
            {
                header("location:<?= PATH ?>views/register.php?error");
            }
            }

    }