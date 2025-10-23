<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<title>Voiture</title>
</head>

<body class="m-12">

    <?php

    $immat = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $immat = $_POST['immat'];
    }

    ?>
    <h1
        class="text-center p-4 text-3xl font-bold  bg-gradient-to-b from-cyan-400 to-green-100 bg-clip-text text-transparent">
        Liste Des voitures</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mt-10 flex flex-col gap-2   ">
        <label for="">Type de immatriculation:</label>

        <select class="border p-2" name="immat" id="">
            <option value="TN" <?php if ($immat == 'TN')
                echo 'selected'; ?>>Tunisienne</option>
            <option value="RS" <?php if ($immat == 'RS')
                echo 'selected'; ?>>RS</option>
        </select>



        <button type="submit" class="bg-green-400 p-2 rounded-xl  font-bold text-white">Valider</button>
    </form>


    <h2 class="my-4 text-xl font-bold">La Liste des voitures avec immatriculation <?= $immat ?>: </h2>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">


        <?php

        @include('connexion.php');
        $sql = "select Nom_modele,couleur, immatriculation , carburant, km , prix ,Prenom_proprietaire , Nom_proprietaire 
            from voiture v,propriètaire p, modele m 
            where v.ID_modele=m.ID_modele and v.Id_proprietaire=p.CIN AND v.immatriculation LIKE '%$immat%'";

        $result = mysqli_query($conn, $sql);


        ?>



        <?php

        $i = 0;
        if (mysqli_num_rows($result) > 0) {
            echo "  <thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 h-10'>
            <tr>
                <th class='text-center'>ID</th>
                <th class='text-center'>Modele</th>
                <th class='text-center'>Couleur</th>
                <th class='text-center'>immatriculation</th>
                <th class='text-center'>Carurant</th>
                <th class='text-center'>Kilometrage</th>
                <th class='text-center'>Prix</th>
                <th class='text-center'>Proprietaire</th>
            </tr>
        </thead>";


            while ($row = mysqli_fetch_assoc($result)) {
                $i++;
                echo "

        <tr class='border-b-2 '>  
          <td class='p-2'>$i</td> 
 <td>" . $row["Nom_modele"] . "</td>
            <td >" . $row["couleur"] . "</td>
            <td>" . $row["immatriculation"] . "</td>
            <td>" . $row["carburant"] . "</td>
            <td>
                " . $row["km"] . "
            </td>
            <td>" . $row["prix"] . "</td>
            <td >" . $row["Nom_proprietaire"] . " " . $row["Prenom_proprietaire"] . " </td>
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
</body>

</html>