<!DOCTYPE html>
<html>
@forelse($student as $data)

<head>
    <title>Form</title>
    <style>
        #formulaire {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #formulaire td
         {
            border: 1px solid #ddd;
            padding: 8px;
            line-height: 40px;
        }
        #formulaire tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .sign {
            padding-left: 32rem;
        }

        .img {
            padding-left: 30rem;
        }

        footer {
            padding-top: 8rem;
        }

        .footer {
            padding-left: 30rem;
        }
    </style>
</head>

<body>

    <h1 style="margin-left: 18rem;">Formulaire</h1><br><br>
    <table id="formulaire">
        <tr>
            <td><strong>Prénom : </strong>{{ $data->firstname}}</td>
            <td><strong>Nom : </strong>{{ $data->lastname}}</td>
        </tr>
        <tr>
            <td><strong>CIN : </strong>{{ $data->CIN}}</td>
            <td><strong>CNE : </strong>{{ $data->CNE}}</td>
        </tr>
        <tr>
            <td><strong>Date de naissance : </strong>{{ $data->birthday}}</td>
            <td><strong>Ville : </strong>{{ $data->city}}</td>
        </tr>
        <tr>
            <td><strong>E-mail : </strong>{{ $data->email}}</td>
            <td><strong>Téléphone : </strong>{{ $data->phone}}</td>
        </tr>
        <tr>
            <td><strong>Adresse : </strong>{{ $data->address}}</td>
            <td><strong>filiére : </strong>{{ $data->faculty}}</td>
        </tr>
        <tr>
            <td><strong>Encadrant : </strong>{{ $data->supervisor->name}}</td>
            <td><strong>Résumé : </strong>{{ $data->summary}}</td>
        </tr>
        <tr>
            <td><strong>Projet : </strong>{{ $data->project}}</td>
            <td><strong>Numero de suivie de demande : </strong>{{ $data->id}}</td>
        </tr>


    </table>
    <footer>
        <hr>
        <div class="footer">
            <p>{{ date('Y-m-d H:i:s') }}</p>
        </div>
    </footer>
</body>
@empty
no form
@endforelse

</html>
