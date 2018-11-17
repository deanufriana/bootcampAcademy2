<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jawaban Bootcamp </title>
</head>

<body class="container mt-4">
    <?php 
//////////// Soal Nomer 1 //////////////////

$jsonData = array(
    'itemId' => '12341822',
    'itemName' => 'FGX Flannel Shirt',
    'price' => '195000',
    'availableColorAndSize' => [
        ['color' => 'blue-black',
        'size' => ['M', 'L', 'XL']
        ],  
        ['color' => 'black-white',
        'size' => 'L'
        ],
    ],
    'freeShiping' => false 
);

echo "<label> Soal Nomer 1 </label><br>".json_encode($jsonData);


///////////// Soal Nomer 2 ///////////////////

function validasiPassword($password)
{
    if ($password) {

        $kondisi = preg_match("/^(?=.*[a-z])(?=.*[_.$])(?=.*[A-Z]).{8}$/", $password);
        echo "<br> 
        ";
        if ($kondisi) {
            echo "<div class='alert alert-primary' role='alert'> Password Benar </div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'> Password Salah </div>";
        }
        echo "";
    }
}

echo "<label class='mt-3'> Soal Nomer 2 </label>";
?>
    <form action="" method="POST" class="mb-1">
        <input type="text" name="password" placeholder="Input Password">
        <button type="submit"> Kirim </button>
    </form>
    <?php

validasiPassword($_POST['password']);

///////////// Soal Nomer 3 ///////////////////

function segitiga($tinggi)
{
for ($a=$tinggi;$a>=0;$a--) {
    for ($b=0;$b<$tinggi-$a;$b++) {
        echo "&nbsp;&nbsp;";
    }
    for ($b=0;$b<=2*$a-1;$b++) {
        if($a==0 || $a==$tinggi) {
            echo "*";
        } elseif ($b==0 || $b==2*$a-2) {
            echo "*";
        } else {
            echo "&nbsp;&nbsp;";
        }
    }
    echo "<br>";
    }
}
echo "<label class='mt-2'> Soal Nomer 3 </label><br>";
?>
    <form action="" method="POST" class="mb-2">
        <input type="number" name="segitiga" placeholder="Input Tinggi" required>
        <button type="submit"> Kirim </button>
    </form>
    <?php
    if (isset($_POST['segitiga'])) {
        segitiga($_POST['segitiga']);
    }

///////////// Soal Nomer 4 ///////////////////
function betweenDays($awal, $akhir, $step = '+1 day', $format = 'Y-m-d' ) {

	$dates = array();
	$current = strtotime( $awal );
	$akhir = strtotime( $akhir );

	while( $current <= $akhir ) {

		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}

	return $dates;
}

?>
<label> Soal Nomer 4 </label><br>
    <form action="" method="POST" class="mb-1">
        <input type="date" name="awal" placeholder="Input Tinggi" required>
        <input type="date" name="akhir" placeholder="Input Tinggi" required>
        <button type="submit"> Kirim </button>
    </form>
    <?php
$arr = betweenDays($_POST['awal'], $_POST['akhir']);
echo "<div class='alert alert-success' role='alert'>
".implode(" ",$arr)."</div>";

///////////// Soal Nomer 5 ///////////////////



echo "<label> Soal Nomer 5 </label><br>";
?>
    <form action="" method="POST" class="mb-3">
        <input type="text" name="kalimat" placeholder="Ganti Huruf" required>
        <input type="text" name="cari" placeholder="Cari Huruf" required>
        <input type="text" name="ganti" placeholder="Ganti Huruf" required>
        <button type="submit"> Kirim </button>
    </form>
    <?php

function ganti($kalimat,$cari,$ganti)
{
    while($indexArray=checkSubStringIndexes($cari,$kalimat))
    {
        $stringArray=  getChars($kalimat);
        $replaced=false;
        $newString="";
        foreach($stringArray as $key => $value)
        {
            if(!$replaced && in_array($key,$indexArray))
            {
                $newString=$newString.$ganti;
                $replaced=true;
            }
            elseif(!in_array($key,$indexArray))
            {
                $newString=$newString.$value;
            }
        }
        $kalimat=$newString;
    }
    return $kalimat;
}
function getLength($kalimat)
{
    $counter=0;
    while(true)
    {
        if(isset($kalimat[$counter]))
        {
            $counter++;
        }
        else 
        {
            break;
        }
    }
    return $counter;
}
function getChars($kalimat)
{
    $result=array();
    $counter=0;
    while(true)
    {
        if(isset($kalimat[$counter]))
        {
            $result[]=$kalimat[$counter];
            $counter++;
        }
        else 
        {
            break;
        }
    }
    return $result;
}
function checkSubStringIndexes($cari,$kalimat)
{
    $counter=0;
    $indexArray=array();
    $newCounter=0;
    $length=  getLength($kalimat);
    $carilength=  getLength($cari);
    $mainCharacters= getChars($kalimat);
    $cariCharacters= getChars($cari);
    for($x=0;$x<$length;$x++)
    {
        if($mainCharacters[$x]==$cariCharacters[0])
        {
            for($y=0;$y<$carilength;$y++)
            {
                if(isset($mainCharacters[$x+$y]) && $mainCharacters[$x+$y]==$cariCharacters[$y])
                {
                    $indexArray[]=$x+$y;
                    $newCounter++;
                }
            }
            if($newCounter==$carilength)
            {
                return $indexArray;
            }
        }
    }
}

if(isset($_POST['kalimat'])){
    ?>
    <div class="alert alert-success" role="alert">
    <?php
    echo ganti($_POST['kalimat'],$_POST['cari'],$_POST['ganti'])."<br><br>    </div> ";
} 

///////////// Soal Nomer 6 ///////////////////

// Mengatur Konfigurasi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

// Mengkoneksikan Database
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    
    echo "<div class='alert alert-danger' role='alert'>
    ";
    echo "Mohon Cek Kode di Soal Nomer 6 Mengatur Konfigurasi<br>";
    echo "Kode Error : ".$conn->connect_error."<br> </div>";

}

// Membuat Database
$buatdatabase = "CREATE DATABASE product";
if($conn->query($buatdatabase)) {
    $conn = new mysqli($servername, $username, $password, $dbname);
} else {
    $conn = new mysqli($servername, $username, $password, $dbname);
}

// Membuat Tabel Product_Categories
$data['product_categories'] = (
    "CREATE TABLE IF NOT EXISTS product_categories 
    (id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    name varchar(30) NOT NULL,  
    created_date DATE)");

// Membuat Tabel Products
$data['products'] = (
    "CREATE TABLE IF NOT EXISTS products 
    (id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    name varchar(30) NOT NULL,
    category_id INT(6),  
    created_date DATE)");

// Memasukan Data Ke Table product_categori
$data['data1'] = "INSERT INTO product_categories (id, name, created_date) VALUES ('1', 'Peralatan Mandi', '2014-11-22 12:45:34')";
$data['data2'] = "INSERT INTO product_categories (id, name, created_date) VALUES ('2', 'Minuman Kemasan', '2014-11-22 12:46:34')";
$data['data3'] = "INSERT INTO product_categories (id, name, created_date) VALUES  ('3', 'Produk Susu', '2014-11-22 12:47:34')";

// Memasukan Data Ke Table produk
$data['data4'] = "INSERT INTO products (id, name, category_id, created_date) VALUES ('1', 'Sabun Wangi', '1', '2014-11-22 12:45:34')";
$data['data5'] = "INSERT INTO products (id, name, category_id, created_date) VALUES ('2', 'Minuman Cola', '2', '2014-11-22 12:45:36')";
$data['data6'] = "INSERT INTO products (id, name, category_id, created_date) VALUES ('3', 'Prenagen Gold', '3', '2014-11-22 12:46:34')";
$data['data7'] = "INSERT INTO products (id, name, category_id, created_date) VALUES ('4', 'Aquaa', '2', '2014-11-22 12:47:34')";
$data['data8'] = "INSERT INTO products (id, name, category_id, created_date) VALUES ('5', 'The Botol', '2', '2014-11-22 12:48:34')";
$data['data9'] = "INSERT INTO products (id, name, category_id, created_date) VALUES ('6', 'Sampo', '1', '2014-11-22 12:48:40')";

// Memasukan Data Ke mySqli
foreach ($data as $d => $n) {
    $conn->query($n);
}

// Memilih & Menggabungkan Tabel product_categories dan products.
$tabel = "SELECT category_id as id, product_categories.name, GROUP_CONCAT(products.name) as products FROM product_categories RIGHT JOIN products ON product_categories.id = products.category_id GROUP BY category_id";

///////////// Soal Nomer 7 ///////////////////
?>
    <label> Soal Nomer 7 </label><br>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>products</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conn->query($tabel) as $tab) { ?>
            <tr>
                <td>
                    <?= $tab['id'] ?>
                </td>
                <td>
                    <?= $tab['name'] ?>
                </td>
                <td>
                    <?= $tab['products'] ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>