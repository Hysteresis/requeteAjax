<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax</title>
</head>

<body>
    <h1>AJAX REQUETES</h1>
    <label>Votre nom :
        <input type="text" id="ajaxTextbox" />
    </label>
    <span id="ajaxButton">Lancer une requête</span>

    <script>
    // document.getElementById("ajaxButton").onclick = function() {
    //     var userName = document.getElementById("ajaxTextbox").value;
    //     console.log(userName);
    //     makeRequest('http://ajax.test/test.php', userName);
    // };

    (function() {

        var httpRequest;

        document.getElementById("ajaxButton").onclick = function() {
            // recuperer la valeur de l'input
            var userName = document.getElementById("ajaxTextbox").value;
            console.log(userName);
            // on passe 2 parametres dans la fonction
            makeRequest('test.php', userName);
        };

        function makeRequest(url, userName) {
            // instancie l'objet XMLHttpRequest
            httpRequest = new XMLHttpRequest();
    
            if (!httpRequest) {
                alert('Abandon :( Impossible de créer une instance de XMLHTTP');
                return false;
            }
            // la requête est faite, puis l’exécution est passée à alertContents()
            httpRequest.onreadystatechange = alertContents;
            httpRequest.open('POST', url);

            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // on envoie le username
            httpRequest.send('userName=' + encodeURIComponent(userName));
        }
    
        function alertContents() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var response = JSON.parse(httpRequest.responseText);
                    alert(response.computedString);
                } else {
                    alert('Un problème est survenu avec la requête.');
                }
            }
        }
    })();

    </script>


</body>
</html>