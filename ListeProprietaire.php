<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Liste des Propriétaires</title>
</head>

<body class=" m-2 bg-gray-50 text-gray-900 ">
    <h1 class="text-center p-4 text-3xl font-bold bg-gradient-to-b from-cyan-400 to-green-100 bg-clip-text text-transparent">
        Liste Des Propriétaires
    </h1>

    <?php
    @include('connexion.php');

    $sql = "SELECT CIN, Nom_proprietaire, Prenom_proprietaire, Date_de_naissance, Email, Telephone FROM `propriètaire`";
    $result = mysqli_query($conn, $sql);
    ?>

    <div class="mt-10 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <?php
            $i = 0;
            if (mysqli_num_rows($result) > 0) {
                echo "
                <thead class='text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 h-10'>
                    <tr>
                        <th class='text-center px-4 py-2'>#</th>
                        <th class='text-center px-4 py-2'>CIN</th>
                        <th class='text-center px-4 py-2'>Nom</th>
                        <th class='text-center px-4 py-2'>Prénom</th>
                        <th class='text-center px-4 py-2'>Date de naissance</th>
                        <th class='text-center px-4 py-2'>Email</th>
                        <th class='text-center px-4 py-2'>Téléphone</th>
                    </tr>
                </thead>
                <tbody>
                ";

                while ($row = mysqli_fetch_assoc($result)) {
                    $i++;
                    echo "
                    <tr class='border-b hover:bg-gray-50'>
                        <td class='text-center p-2'>$i</td>
                        <td class='text-center p-2'>{$row['CIN']}</td>
                        <td class='text-center p-2'>{$row['Nom_proprietaire']}</td>
                        <td class='text-center p-2'>{$row['Prenom_proprietaire']}</td>
                        <td class='text-center p-2'>{$row['Date_de_naissance']}</td>
                        <td class='text-center p-2'>{$row['Email']}</td>
                        <td class='text-center p-2'>{$row['Telephone']}</td>
                    </tr>
                    ";
                }

                echo "</tbody>";
            } else {
                echo "
                <div class='bg-red-100 p-4 mt-8 rounded-xl'>
                    <h1 class='text-center text-red-700 text-2xl'>La liste des propriétaires est vide 🫣</h1>
                </div>";
            }
            ?>
        </table>
    </div>

    <footer class="relative bottom-0 mt-8 text-center text-gray-500">
        Ajouter un propriétaire  
        <a href="AjoutProprietaire.php" class="text-blue-500 underline cursor-pointer">ici</a>
    </footer>
</body>
</html>
