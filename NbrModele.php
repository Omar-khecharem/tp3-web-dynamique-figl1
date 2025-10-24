<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Exercice cours</title>
</head>
<body class="m-12">
  

<?php

@include('connexion.php');
$sql='select  Nom_marque, count(Nom_marque) as c 
from  marque mq, modele md 
where mq.Id_marque=md.Id_marque group by  Nom_marque';

$result=mysqli_query($conn,$sql);



?>

<table class="w-full text-sm text-left rtl:text-right text-gray-900 font-bold dark:text-gray-400 shadow-xl ">
<thead class='text-xs  uppercase bg-green-500 dark:bg-gray-700 dark:text-gray-400 h-10 '>
<tr class="text-center">
   <td >
     Modele
   </td>

  
   <td class="border-l-2 ">
     Nb
   </td>
</tr>
</thead>

<?php
while ($row=mysqli_fetch_assoc($result)){
echo "<tr class='border-b-1'>

<td class='p-2'>
".$row['Nom_marque']."
</td>
<td class='border-l-2 text-center'>
".$row['c']."
</td>
</tr>";
}



?>

</table>
</body>
</html>