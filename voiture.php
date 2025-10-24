<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<title>Voiture</title>
</head>

<body class="m-12 selection:bg-orange-50/70 ">

    <?php

    @include('connexion.php');

    $marque = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $marque = $_POST['marque'];
    }
    $sql = 'select Nom_marque from marque ';
    $resultat = mysqli_query($conn, $sql);

    ?>
    <h1 class="text-center p-4 text-3xl font-bold  bg-gradient-to-b from-cyan-400 to-green-100 bg-clip-text text-transparent">
        Liste Des Proprietaire </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mt-10 flex flex-col gap-2   ">
        <label for="">Nom de marque:</label>

        <select class="border p-2" name="marque">
            <?php

            while ($row = mysqli_fetch_assoc($resultat)) {

               
                    if ($marque == $row['Nom_marque']) {
     
                        echo "<option   selected >" . $row['Nom_marque']  . "</option>";
                    } else {
                        echo "<option  >" . $row['Nom_marque'] . "</option>";
                    }


                


            }


            ?>


        </select>



        <button type="submit" class="bg-green-400 p-2 rounded-xl  font-bold text-white shadow-xl shadow-green-100">Valider</button>
    </form>


    <h2 class="my-4 text-xl font-bold">La Liste des proprietaire de <?php echo $marque ?>: </h2>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">


        <?php


        $sql = "select Id_proprietaire,Date_de_naissance,email,Nom_marque ,telephone ,Prenom_proprietaire , Nom_proprietaire 
            from voiture v,propriètaire p, modele m , marque mk
            where v.ID_modele=m.ID_modele and v.Id_proprietaire=p.CIN and m.Id_marque=mk.Id_marque and Nom_marque='" . $marque . "' ";

        $result = mysqli_query($conn, $sql);

 
        ?>



        <?php

        $i = 0;
        if (mysqli_num_rows($result) > 0) {
            echo "  <thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 h-10'>
            <tr>
                <th class='text-center'>ID</th>
                <th class='text-center'>CIN</th>
                <th class='text-center'>PROPRIETAIRE</th>
                <th class='text-center'>DATE DE NAISSANCE</th>
                <th class='text-center'>E-MAIL</th>
                <th class='text-center'>TELEPHONE</th>
            
            </tr>
        </thead>";


            while ($row = mysqli_fetch_assoc($result)) {
                $i++;
                echo "

        <tr class='border-b-2 '>  
          <td class='p-2'>$i</td> 
 <td>" . $row["Id_proprietaire"] . "</td>
            <td >" . $row["Nom_proprietaire"] . " " . $row["Prenom_proprietaire"] . " </td>
            <td >" . $row["Date_de_naissance"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["telephone"] . "</td>
          
 
</tr>

            ";
            }


        } else {
            echo "
            <div class='bg-red-100 p-4 mt-18 rounded-xl'>
            <h1 class='text-center text-red-700 text-2xl'>La liste de voiture est vide 🫣</h1>
            </div>
            ";
        }
        ;


        ?>


    </table>
      <footer class="retalive bottom-0 mt-5 text-center text-gray-500">
        Voir les voitures disonible 
        <a href="http://localhost/tp3/index.php" class="text-red-500 underline cursor-pointer">ici</a>
    </footer>
</body>

</html>