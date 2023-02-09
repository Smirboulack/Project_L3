<script src="css/score.css" type="text/css"> </script>
<table style="" id="score">
    <style>
        table {
            background-color: #fff;
            border-collapse: collapse;
            color: black;
            margin: 0 auto;
            width: 50%;
            /* pour définir la largeur du tableau */
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
    <tr>
        <td><?php if (isset($pseudo)) echo $pseudo; ?></td>
        <td><?php if (isset($pseudo)) echo '<img src="' . $lien['img'] . '"style="width:90px;height: 90px;" >' ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php if (isset($Score)) echo 'Votre score est de :   ' . $Score["score"]; ?></td>
    </tr>
</table>
<br>
<br>

<table style="" id="classement">
    <style>
        table {
            background-color: #fff;
            border-collapse: collapse;
            color: black;
            margin: 0 auto;
            width: 50%;
            /* pour définir la largeur du tableau */
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
    <thead>
    <tr>
    <th colspan="3">Classement</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php foreach ($Cl as $l) {
            echo '<tr><td>' . $l['pseudo_u'] . ' </td><td> <img src="./images/' . $l['img'] . '"style="width:90px;height: 90px;" ></td><td> ' . $l['score'];
            '</td></tr>';
        }
        ?>
    </tr>
    </tbody>
</table>