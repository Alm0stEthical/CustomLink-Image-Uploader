<?php
// Configuration settings
$loginKey = "supersecureloginpasswordforuploadingpngs"; // Change it to something very secure for example: Nh!3RSTK&dFSm#Yq@6q$qSExki?R9
$targetDirectory = "upload/"; // Change it to your desired upload directory e.g. upload/
$websiteUrl = 'https://dfuze.pro/img/'; // Change it to your domain / sub-domain e.g. https://img.dfuze.pro/
$stringLength = 5; // Length of the random string to be used in the filename | Note: The string length should be at least 5 characters long for better security.
$maxUploadSize = 50000000; // Maximum upload size in bytes | Note: The maximum upload size should be at least 5MB for better security.

// Don't touch this section unless you know what you're doing :-)

// Generate a random string for the filename
function generateRandomString($length)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

// Check if the uploaded file is of an allowed MIME type
function isAllowedFileType($filePath)
{
    $allowedTypes = ['image/png', 'image/gif'];
    $fileType = mime_content_type($filePath);
    return in_array($fileType, $allowedTypes);
}

// Handling the POST request
if (isset($_POST['login'])) {
    if ($_POST['login'] === $loginKey) {
        if ($_FILES["sharex"]["size"] > $maxUploadSize) {
            die("File size exceeds the maximum allowed limit.");
        }

        $temporaryFilePath = $_FILES["sharex"]["tmp_name"];
        if (!isAllowedFileType($temporaryFilePath)) {
            die("Unsupported file type. Only PNG and GIF files are permitted.");
        }

        // Determine file extension based on MIME type
        $fileExtension = mime_content_type($temporaryFilePath) === 'image/png' ? 'png' : 'gif';
        // Create a directory named with today's date if it doesn't exist
        $today = date("d-m-Y");
        $uploadPath = $targetDirectory . $today;
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Construct the file path
        $newFilename = generateRandomString($stringLength) . '.' . $fileExtension;
        $finalPath = $uploadPath . '/' . $newFilename;

        // Special handling for PNG files - convert to GIF
        if ($fileExtension === 'png') {
            $image = imagecreatefrompng($temporaryFilePath);
            if ($image !== false) {
                $gifPath = $uploadPath . '/' . generateRandomString($stringLength) . '.gif';
                if (imagegif($image, $gifPath)) {
                    imagedestroy($image);
                    echo $websiteUrl . $gifPath;
                } else {
                    die("Error converting PNG to GIF.");
                }
            } else {
                die("Error loading PNG image.");
            }
        } else {
            // Move the uploaded file to the final path
            if (move_uploaded_file($temporaryFilePath, $finalPath)) {
                echo $websiteUrl . $finalPath;
            } else {
                die("Failed to upload file. Check directory permissions.");
            }
        }
    } else {
        die("Invalid login key.");
    }
} else {
    die("No data received.");
}