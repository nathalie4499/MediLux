<?php
$connect = mysqli_connect("localhost", "root","", "testing");
$result = '';
$sql = "Select * FROM mldemo WHERE patient LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)
{
    include 'patient.php';
    $result .= '<h4 align="center">Search Result</h4>';
    $result .= '<div class=class="result" id="result">
        <table class="table table-striped table-dark table-bordered table-sm table-hover">
            <tr>
       
            <th scope="col">SSN</th>
            <th scope="col">Given Name</th>
            <th scope="col">Birth Name</th>
            <th scope="col">Marital Name</th>
            <th scope="col">Locality</th>
            <th scope="col">Telephone</th>
            <th scope="col">Mobile</th>
            </tr>';
    while($row = mysqli_fetch_array($result))
    {
        $result .='
          <tr>
       
            <th scope="col">'.$row["SSN"].'</th>
            <th scope="col">'.$row[GivenName].'</th>
            <th scope="col">'.$row[BirthName].'</th>
            <th scope="col">'.$row[MaritalName].'</th>
            <th scope="col">'.$row[Locality].'</th>
            <th scope="col">'.$row[Telephone].'</th>
            <th scope="col">'.$row[Mobile].'</th>
           
            </tr>
        ';

    }
    echo $result;
}
else
{
    echo 'Data not found';
}
