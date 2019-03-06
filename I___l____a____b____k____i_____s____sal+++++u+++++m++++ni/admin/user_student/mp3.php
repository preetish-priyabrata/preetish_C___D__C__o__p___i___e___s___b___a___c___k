if(isset($_POST['submit'])) {

    $fileName = $_FILES['userfile']['name'];
    $tmpName = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];

if ($fileType != 'audio/mpeg' && $fileType != 'audio/mpeg3' && $fileType != 'audio/mp3' && $fileType != 'audio/x-mpeg' && $fileType != 'audio/x-mp3' && $fileType != 'audio/x-mpeg3' && $fileType != 'audio/x-mpg' && $fileType != 'audio/x-mpegaudio' && $fileType != 'audio/x-mpeg-3') {
        echo('<script>alert("Error! You file is not an mp3 file. Thank You.")</script>');
    } else if ($fileSize > '10485760') {
        echo('<script>alert("File should not be more than 10mb")</script>');
    } else if ($rep == 'Say something about your post...') {
    $rep == '';
    } else {
    // get the file extension first
    $ext = substr(strrchr($fileName, "."), 1); 

    // make the random file name
    $randName = md5(rand() * time());

    // and now we have the unique file name for the upload file
    $filePath = $uploadDir . $randName . '.' . $ext;

    $result = move_uploaded_file($tmpName, $filePath);
    if (!$result) {
        echo "Error uploading file";
    exit;
    }

    if(!get_magic_quotes_gpc()) {

    $fileName = addslashes($fileName);
    $filePath = addslashes($filePath);

    }

    $sql = "INSERT INTO media SET
            path = '$filePath',
            size = '$fileSize',
            ftype = '$fileType',
            fname = '$fileName'";

if (mysql_query($sql)) {
    echo('');
    } else {
        echo('<p style="color: #ff0000;">Error adding audio: ' . mysql_error() . '</p><br />');
}