<?php

require('../session.php');
include('../connection.php');
require 'phpspread/vendor/autoload.php';
$connection = connection();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save'])){

    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName,PATHINFO_EXTENSION);
    
    $allowed_ext = ['xls','xlsx','csv'];
    if(in_array($file_ext,$allowed_ext)){
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";

        foreach ($data as $row){
            if($count > 0 ){
                $lrn = $row['0'];
                $lastname = $row['1'];
                $firstname = $row['2'];
                $middle_name = $row['3'];
                $email = $row['4'];
                $password = $row['5'];
                $strand = $row['6'];

                $studentQ = "INSERT INTO student (lrn,lastname,firstname,middle_name,email,password,strand) VALUES ('$lrn', '$lastname', '$firstname','$middle_name','$email','$password','$strand')";
                $result = mysqli_query($connection,$studentQ);
                $msg = true;
            }else{
                $count = "1";
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "SUCEESS";
            header('Location: students.php');
            exit(0);
        } else {
            $_SESSION['message'] = "FAIL";
            header('Location: students.php');
            exit(0);
        }
    }else{
        $_SESSION['message'] = "Invalid File";
        header('Location: students.php');
    }


}







?>